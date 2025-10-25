<?php
// admin_commentaires.php
session_start();
require_once "./includes/connexionbdd.php"; // $connexion PDO
require_once "./includes/fonctions.php";    // si besoin

$action = $_GET['action'] ?? '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$token = $_GET['token'] ?? '';

if (!$id || !$token || !in_array($action, ['approuver','supprimer'])) {
    echo "Paramètres invalides.";
    exit;
}

try {
    // Récupérer la ligne
    $stmt = $connexion->prepare("SELECT approve_token, delete_token, token_expires, approved FROM commentaire WHERE id = :id LIMIT 1");
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        echo "Commentaire introuvable.";
        exit;
    }

    // Vérifier expiration
    if (!empty($row['token_expires']) && (new DateTime()) > new DateTime($row['token_expires'])) {
        echo "Le lien a expiré (token périmé).";
        exit;
    }

    if ($action === 'approuver') {
        if (!hash_equals($row['approve_token'] ?? '', $token)) {
            echo "Token d'approbation invalide.";
            exit;
        }
        // Mettre approved à 1 et supprimer tokens
        $u = $connexion->prepare("UPDATE commentaire SET approved = 1, approve_token = NULL, delete_token = NULL, token_expires = NULL WHERE id = :id");
        $u->execute([':id' => $id]);
        echo "Le commentaire #$id a été approuvé. Merci.";
        exit;
    } else { // supprimer
        if (!hash_equals($row['delete_token'] ?? '', $token)) {
            echo "Token de suppression invalide.";
            exit;
        }
        // Supprimer la ligne
        $d = $connexion->prepare("DELETE FROM commentaire WHERE id = :id");
        $d->execute([':id' => $id]);
        echo "Le commentaire #$id a été supprimé.";
        exit;
    }
} catch (PDOException $e) {
    error_log("Erreur admin_commentaires: " . $e->getMessage());
    echo "Erreur serveur.";
    exit;
}
