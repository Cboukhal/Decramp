<?php
    session_start();
<<<<<<< HEAD
    date_default_timezone_set('Europe/Paris');
    
    // Traitement du formulaire
    if(!empty($_POST["envoyer_commentaire"]))
    {
        include_once "./includes/fonctions.php";
        include_once "./includes/connexionbdd.php";
        
        // Récupérer et sécuriser les données
        $nom = !empty($_POST["nom"]) ? htmlspecialchars(trim($_POST["nom"])) : 'Anonyme';
        $email = htmlspecialchars(trim($_POST["email"]));
        $note = intval($_POST["note"]);
        $commentaire = htmlspecialchars(trim($_POST["commentaire"]));
        
        // Validation
        if($note < 1 || $note > 5) {
            $_SESSION['flash_error'] = "La note doit être entre 1 et 5 étoiles.";
        }
        elseif(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['flash_error'] = "Veuillez fournir une adresse email valide.";
        }
        elseif(empty($commentaire)) {
            $_SESSION['flash_error'] = "Le commentaire ne peut pas être vide.";
        }
        else {
            // try
            // {
            //     // Insérer le commentaire dans la BDD (en attente de validation)
            //     $sql = "INSERT INTO commentaire (pseudo, email, note, commentaire, approved, date_creation) 
            //             VALUES (:pseudo, :email, :note, :commentaire, 0, NOW())";
            //     $stmt = $connexion->prepare($sql);
            //     $stmt->bindValue(":pseudo", $nom);
            //     $stmt->bindValue(":email", $email);
            //     $stmt->bindValue(":note", $note, PDO::PARAM_INT);
            //     $stmt->bindValue(":commentaire", $commentaire);
            //     $stmt->execute();
                
            //     $commentaire_id = $connexion->lastInsertId();
                
            //     // Récupérer l'email admin
            //     $adminEmail = 'adresse-de-secours@example.com';
            //     try {
            //         $stmt_admin = $connexion->prepare("SELECT mail FROM admins WHERE role = 'admin' LIMIT 1");
            //         $stmt_admin->execute();
            //         $result = $stmt_admin->fetch(PDO::FETCH_ASSOC);
                    
            //         if ($result && !empty($result['mail'])) {
            //             $adminEmail = $result['mail'];
            //         }
            //     }
            //     catch (PDOException $e) {
            //         error_log("Erreur récupération admin email : " . $e->getMessage());
            //     }
                
            //     // Préparer l'email pour l'admin
            //     $etoiles = str_repeat('★', $note) . str_repeat('☆', 5 - $note);
            //     $date = date('d/m/Y à H:i');
                
            //     $objet_admin = "Nouveau commentaire sur le site - Note: $note/5";
            //     $contenu_admin = "
            //         <h2>📝 Nouveau commentaire reçu</h2>
            //         <p><strong>Note :</strong> <span style='font-size:20px; color:gold;'>$etoiles</span> ($note/5)</p>
            //         <p><strong>Auteur :</strong> " . htmlspecialchars($nom) . "</p>
            //         <p><strong>Email :</strong> " . htmlspecialchars($email) . "</p>
            //         <p><strong>Date :</strong> $date</p>
            //         <hr>
            //         <p><strong>Commentaire :</strong></p>
            //         <blockquote style='background:#f8f9fa; padding:15px; border-left:4px solid #007bff; margin:15px 0;'>
            //             " . nl2br(htmlspecialchars($commentaire)) . "
            //         </blockquote>
            //         <hr>
            //         <p><strong>Actions :</strong></p>
            //         <p>
            //             <a href='http://" . $_SERVER['HTTP_HOST'] . "/admin_commentaires.php?action=approuver&id=$commentaire_id' 
            //                style='display:inline-block; padding:10px 20px; background:#28a745; color:white; text-decoration:none; border-radius:5px; margin:5px;'>
            //                 ✓ Approuver ce commentaire
            //             </a>
            //             <a href='http://" . $_SERVER['HTTP_HOST'] . "/admin_commentaires.php?action=supprimer&id=$commentaire_id' 
            //                style='display:inline-block; padding:10px 20px; background:#dc3545; color:white; text-decoration:none; border-radius:5px; margin:5px;'>
            //                 ✗ Supprimer ce commentaire
            //             </a>
            //         </p>
            //         <p style='color:#666; font-size:12px; margin-top:20px;'>
            //             Ou connectez-vous à votre espace admin pour gérer tous les commentaires.
            //         </p>
            //     ";
                
            //     // Envoyer l'email à l'admin
            //     ob_start();
            //     $sent_admin = envoyerMail($objet_admin, $adminEmail, $contenu_admin);
            //     $debug_output = ob_get_clean();
            //     if (!empty($debug_output)) {
            //         error_log("Debug PHPMailer: " . $debug_output);
            //     }
                
            //     // Préparer l'email de confirmation pour l'utilisateur
            //     $objet_user = "Merci pour votre commentaire - Thierry Decramp";
            //     $contenu_user = "
            //         <h2>Merci " . htmlspecialchars($nom) . " !</h2>
            //         <p>Nous avons bien reçu votre commentaire avec une note de <strong>$note/5 étoiles</strong>.</p>
            //         <p>Votre avis est précieux pour nous et sera publié prochainement après validation.</p>
            //         <blockquote style='background:#f8f9fa; padding:15px; border-left:4px solid #007bff; margin:15px 0;'>
            //             " . nl2br(htmlspecialchars($commentaire)) . "
            //         </blockquote>
            //         <p>Cordialement,<br>
            //         <strong>Thierry Decramp - SECIC</strong><br>
            //         Artisan électricien</p>
            //     ";
                
            //     ob_start();
            //     $sent_user = envoyerMail($objet_user, $email, $contenu_user);
            //     $debug_output = ob_get_clean();
            //     if (!empty($debug_output)) {
            //         error_log("Debug PHPMailer: " . $debug_output);
            //     }
                
            //     // Messages de feedback
            //     if ($sent_admin && $sent_user) {
            //         $_SESSION['flash_success'] = "Merci pour votre commentaire ! Un email de confirmation vous a été envoyé.";
            //     } elseif ($sent_admin) {
            //         $_SESSION['flash_success'] = "Merci pour votre commentaire ! Il sera publié prochainement.";
            //     } else {
            //         $_SESSION['flash_success'] = "Merci pour votre commentaire ! Il sera publié prochainement.";
            //         error_log("Échec envoi email admin pour commentaire #$commentaire_id");
            //     }
            // }
            // catch(PDOException $e) {
            //     error_log("Erreur insertion commentaire : " . $e->getMessage());
            //     $_SESSION['flash_error'] = "Une erreur est survenue. Veuillez réessayer.";
            // }
            try {
    // Générer des tokens sécurisés
    function random_token($len = 48) {
        return bin2hex(random_bytes($len/2)); // 48 -> 24 bytes -> 48 hex chars
    }
    $approve_token = random_token(48);
    $delete_token  = random_token(48);
    $expires_dt = (new DateTime('+7 days'))->format('Y-m-d H:i:s');

    // Insérer le commentaire en attente d'approbation
    $sql = "INSERT INTO commentaire (pseudo, email, note, commentaire, approved, approve_token, delete_token, token_expires, date_creation)
            VALUES (:pseudo, :email, :note, :commentaire, 0, :approve_token, :delete_token, :token_expires, NOW())";
    $stmt = $connexion->prepare($sql);
    $stmt->bindValue(":pseudo", $nom);
    $stmt->bindValue(":email", $email);
    $stmt->bindValue(":note", $note, PDO::PARAM_INT);
    $stmt->bindValue(":commentaire", $commentaire);
    $stmt->bindValue(":approve_token", $approve_token);
    $stmt->bindValue(":delete_token", $delete_token);
    $stmt->bindValue(":token_expires", $expires_dt);
    $stmt->execute();

    $commentaire_id = $connexion->lastInsertId();

    // Récupérer l'email admin (1er admin) - fallback si pb
    $adminEmail = 'adresse-de-secours@example.com';
    try {
        $stmt_admin = $connexion->prepare("SELECT mail FROM admins WHERE role = 'admin' ORDER BY id ASC LIMIT 1");
        $stmt_admin->execute();
        $result = $stmt_admin->fetch(PDO::FETCH_ASSOC);
        if ($result && !empty($result['mail'])) {
            $adminEmail = $result['mail'];
        }
    } catch (PDOException $e) {
        error_log("Erreur récupération admin email : " . $e->getMessage());
    }

    // Préparer liens d'action (utilise HTTP_HOST)
    $host = $_SERVER['HTTP_HOST'];
    $approve_link = "https://$host/admin_commentaires.php?action=approuver&token=" . urlencode($approve_token) . "&id=" . intval($commentaire_id);
    $delete_link  = "https://$host/admin_commentaires.php?action=supprimer&token=" . urlencode($delete_token) . "&id=" . intval($commentaire_id);

    // Préparer email admin
    $etoiles = str_repeat('★', $note) . str_repeat('☆', 5 - $note);
    $date = date('d/m/Y à H:i');

    $objet_admin = "Nouveau commentaire en attente (#$commentaire_id) - Note: $note/5";
    $contenu_admin = "
        <h2>📝 Nouveau commentaire en attente</h2>
        <p><strong>Note :</strong> <span style='font-size:20px; color:gold;'>$etoiles</span> ($note/5)</p>
        <p><strong>Auteur :</strong> " . htmlspecialchars($nom) . "</p>
        <p><strong>Email :</strong> " . htmlspecialchars($email) . "</p>
        <p><strong>Date :</strong> $date</p>
        <hr>
        <p><strong>Commentaire :</strong></p>
        <blockquote style='background:#f8f9fa; padding:15px; border-left:4px solid #007bff; margin:15px 0;'>
            " . nl2br(htmlspecialchars($commentaire)) . "
        </blockquote>
        <hr>
        <p><strong>Actions rapides :</strong></p>
        <p>
            <a href='$approve_link'
               style='display:inline-block; padding:10px 20px; background:#28a745; color:white; text-decoration:none; border-radius:5px; margin:5px;'>
               ✓ Approuver
            </a>
            <a href='$delete_link'
               style='display:inline-block; padding:10px 20px; background:#dc3545; color:white; text-decoration:none; border-radius:5px; margin:5px;'>
               ✗ Supprimer
            </a>
        </p>
        <p style='color:#666; font-size:12px; margin-top:20px;'>Ces liens expirent le $expires_dt.</p>
    ";

    // Envoyer l'email admin (utilise ta fonction envoyerMail)
    ob_start();
    $sent_admin = envoyerMail($objet_admin, $adminEmail, $contenu_admin);
    $debug_output = ob_get_clean();
    if (!empty($debug_output)) error_log("Debug PHPMailer: " . $debug_output);

    // Email de confirmation au visiteur (optionnel)
    $objet_user = "Merci pour votre avis - Thierry Decramp";
    $contenu_user = "
        <h2>Merci " . htmlspecialchars($nom) . " !</h2>
        <p>Nous avons bien reçu votre commentaire. Il sera publié après validation par l'administrateur.</p>
        <blockquote style='background:#f8f9fa; padding:15px; border-left:4px solid #007bff; margin:15px 0;'>
            " . nl2br(htmlspecialchars($commentaire)) . "
        </blockquote>
        <p>Cordialement,<br><strong>Thierry Decramp</strong></p>
    ";
    ob_start();
    $sent_user = envoyerMail($objet_user, $email, $contenu_user);
    $debug_output = ob_get_clean();
    if (!empty($debug_output)) error_log("Debug PHPMailer: " . $debug_output);

    // Feedback utilisateur (flash)
    if ($sent_admin) {
        $_SESSION['flash_success'] = "Merci ! Votre commentaire a été enregistré et l'administrateur en a été informé.";
    } else {
        $_SESSION['flash_success'] = "Merci ! Votre commentaire a été enregistré. L'administrateur sera informé manuellement si l'email a échoué.";
        error_log("Échec envoi email admin pour commentaire #$commentaire_id");
    }

} catch(PDOException $e) {
    error_log("Erreur insertion commentaire : " . $e->getMessage());
    $_SESSION['flash_error'] = "Une erreur est survenue. Veuillez réessayer.";
}
        }
        
        header("Location: ./commentaire.php");
        exit;
    }
    
    // Récupérer les messages flash
    $flash_success = $_SESSION['flash_success'] ?? '';
    $flash_error = $_SESSION['flash_error'] ?? '';
    unset($_SESSION['flash_success'], $_SESSION['flash_error']);
    
    // Récupérer les 3 derniers commentaires approuvés
    include_once "./includes/connexionbdd.php";
    try {
        $sql = "SELECT pseudo, note, commentaire, DATE_FORMAT(date_creation, '%d/%m/%Y') as date_fr 
                FROM commentaire 
                WHERE approved = 1 
                ORDER BY date_creation DESC 
                LIMIT 3";
        $stmt = $connexion->prepare($sql);
        $stmt->execute();
        $commentaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(PDOException $e) {
        error_log("Erreur récupération commentaires : " . $e->getMessage());
        $commentaires = [];
    }
=======
>>>>>>> 53da9ef443ce151f752b5c154ab37ea74debb5df
?>
<!------------------------------------------------------------------------------>
<!DOCTYPE html>
<html lang="fr">
<head>
<<<<<<< HEAD
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Laissez votre avis sur nos services">
    <meta name="keywords" content="avis, commentaires, notes, témoignages">
    <meta name="author" content="Thierry Decramp">
=======
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
>>>>>>> 53da9ef443ce151f752b5c154ab37ea74debb5df
    <link rel="stylesheet" href="./asset/css/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/favicon" href="./asset/image/OIP.webp">
<<<<<<< HEAD
    <title>Commentaires - Thierry Decramp</title>
    <style>
        .alert {
            padding: 15px;
            margin: 20px auto;
            border-radius: 5px;
            max-width: 800px;
            text-align: center;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .temoignage-card {
            background: #f8f9fa;
            padding: 20px;
            margin: 15px 0;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .temoignage-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .temoignage-stars {
            font-size: 20px;
            color: gold;
        }
        .temoignage-date {
            color: #666;
            font-size: 14px;
        }
        .temoignage-author {
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .temoignage-content {
            color: #555;
            line-height: 1.6;
        }
        .no-comments {
            text-align: center;
            padding: 40px;
            color: #666;
            font-style: italic;
        }
    </style>
</head>
<body>
    <?php include "./includes/header.php"; ?>
    
    <main>
        <!-- ACCUEIL -->
        <section class="hero">
            <div id="slider">
                <img src="./asset/image/ampoule.jpg" alt="ampoule">
                <img src="./asset/image/ampoule2.jpg" alt="ampoule2">
                <img src="./asset/image/ampoule3.jpg" alt="ampoule3">
            </div>

            <div class="hero-overlay">
                <h1>Commentaires</h1>
                <p>Thierry Decramp - SECIC - Artisan électricien</p>
                <p>Électricien depuis plus de 15 ans, spécialisé dans les nouvelles technologies et respectueux des normes.</p>
                <a href="contact.php" class="btn">Contact</a>
            </div>

            <div class="hero-dots">
                <span class="dot active" data-index="0"></span>
                <span class="dot" data-index="1"></span>
                <span class="dot" data-index="2"></span>
            </div>
        </section>

        <!-- Introduction -->
        <section class="presentation">
            <blockquote>"Que pensez-vous de nos services ?"</blockquote>
        </section>

        <!-- Messages flash -->
        <?php if (!empty($flash_success)): ?>
            <div class="alert alert-success"><?= $flash_success ?></div>
        <?php endif; ?>
        
        <?php if (!empty($flash_error)): ?>
            <div class="alert alert-error"><?= $flash_error ?></div>
        <?php endif; ?>

        <!-- SECTION FORMULAIRE -->
        <section class="contact">
            <h2>Laissez votre avis</h2>
            <div class="contact-wrapper">
                <div class="contact-form">
                    <form id="commentForm" action="./commentaire.php" method="post">
                        <label for="nom">Nom (optionnel) :</label>
                        <input type="text" id="nom" name="nom" placeholder="Votre nom (ou restez anonyme)">
                        
                        <label for="email">Email <span style="color:red;">*</span> :</label>
                        <input type="email" id="email" name="email" required placeholder="votre@email.com">
                        
                        <label for="note">Note <span style="color:red;">*</span> :</label>
                        <div class="stars-container">
                            <div class="stars" id="starRating">
                                <span class="star" data-rating="1">★</span>
                                <span class="star" data-rating="2">★</span>
                                <span class="star" data-rating="3">★</span>
                                <span class="star" data-rating="4">★</span>
                                <span class="star" data-rating="5">★</span>
                            </div>
                            <span class="rating-text" id="ratingText">Choisissez une note</span>
                        </div>
                        <input type="hidden" id="note-value" name="note" value="0" required>
                        <span class="error-message" id="errorMessage">Veuillez sélectionner une note</span>
                        
                        <label for="commentaire">Commentaire <span style="color:red;">*</span> :</label>
                        <textarea id="commentaire" name="commentaire" required placeholder="Partagez votre expérience..." rows="5"></textarea>
                        
                        <button type="submit" name="envoyer_commentaire" value="1" class="btn">Envoyer mon avis</button>
                    </form>
                </div>
            </div>
        </section>

        <!-- SECTION TÉMOIGNAGES -->
        <section class="prestations">
            <h2>Derniers témoignages</h2>
            
            <?php if(empty($commentaires)): ?>
                <div class="no-comments">
                    <p>Aucun témoignage pour le moment. Soyez le premier à laisser votre avis !</p>
                </div>
            <?php else: ?>
                <?php foreach($commentaires as $com): ?>
                    <div class="prestation">
                        <p>
                            <span style="font-size:20px; color:gold;">
                                <?php 
                                for($i = 1; $i <= 5; $i++) {
                                    echo $i <= $com['note'] ? '★' : '☆';
                                }
                                ?>
                            </span>
                            <br>
                            <strong><?= htmlspecialchars($com['date_fr']) ?></strong><br>
                            "<?= nl2br(htmlspecialchars($com['commentaire'])) ?>" – <?= htmlspecialchars($com['pseudo']) ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>
    </main>
    
    <?php include "./includes/footer.php"; ?>
    
=======
    <title>Commentaire</title>
</head>
<body>
    <?php
        include "./includes/header.php";
    ?>
    <main>
    <!--ACCUEIL -->
<section class="hero">
  <div id="slider">
    <img src="./asset/image/ampoule.jpg" alt="ampoule">
    <img src="./asset/image/ampoule2.jpg" alt="ampoule2">
    <img src="./asset/image/ampoule3.jpg" alt="ampoule3">
  </div>

  <div class="hero-overlay">
    <h1>Commentaire</h1>
    <p>Thierry Decramp - SECIC - Artisan électricien</p>
    <p>Électricien depuis plus de 15 ans, spécialisé dans les nouvelles technologies et respectueux des normes.</p>
    <a href="contact.php" class="btn">Contact</a>
  </div>

  <!-- Les points de navigation -->
  <div class="hero-dots">
    <span class="dot active" data-index="0"></span>
    <span class="dot" data-index="1"></span>
    <span class="dot" data-index="2"></span>
  </div>
</section>

 <!--Introduction -->
    <section class="presentation">
      <blockquote>"Que pensez-vous de nos services ?"</blockquote>
    </section>

  <!-- SECTION NOTE -->
  <section class="contact">
    <h2>Section Commentaire</h2>
      <div class="contact-wrapper">
        <div class="contact-form">
           <form id="commentForm" action="#" method="post">
                    <label for="nom">Nom (optionnel) :</label>
                    <input type="text" id="nom" name="nom" placeholder="Votre nom">
                    
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" required placeholder="votre@email.com">
                    
                    <label for="note">Note :</label>
                    <div class="stars-container">
                        <div class="stars" id="starRating">
                            <span class="star" data-rating="1">★</span>
                            <span class="star" data-rating="2">★</span>
                            <span class="star" data-rating="3">★</span>
                            <span class="star" data-rating="4">★</span>
                            <span class="star" data-rating="5">★</span>
                        </div>
                        <span class="rating-text" id="ratingText">Choisissez une note</span>
                    </div>
                    <input type="hidden" id="note-value" name="note" value="0">
                    <span class="error-message" id="errorMessage">Veuillez sélectionner une note</span>
                    
                    <label for="commentaire">Commentaire :</label>
                    <textarea id="commentaire" name="commentaire" required placeholder="Partagez votre expérience..."></textarea>
                    
                    <button type="submit" class="btn">Envoyer</button>
                </form>
        </div>
      </div>
  </section>

  <!-- SECTION TÉMOIGNAGES -->
  <section 
  class="prestations"
  >
    <h2>Section Témoignages</h2>

    <!-- Témoignage 1 -->
    <div class="prestation">
      <p><span style="font-size:20px; color:gold;">★★★★★</span> 
      <br>
      <strong>10 mai 2024</strong><br>
      “Très professionnel et rapide” – Client A</p>
      <img src="./asset/image/exemple1.webp" alt="Exemple 1" style="width:180px; margin-top:10px; border-radius:5px;">
    </div>

    <!-- Témoignage 2 -->
    <div class="prestation">
      <p><span style="font-size:20px; color:gold;">★★★★★</span> 
        <br>
      <strong>25 avril 2024</strong><br>
      “Travail soigné, devis clair” – Client B</p>
      <img src="./asset/image/exemple1.webp" alt="Exemple 2" style="width:180px; margin-top:10px; border-radius:5px;">
    </div>

    <!-- Témoignage 3 -->
    <div class="prestation">
      <p><span style="font-size:20px; color:gold;">★★★★★</span> 
        <br>
      <strong>12 juin 2024</strong><br>
      “Bonne communication, dépannage efficace” – Client C</p>
      <img src="./asset/image/exemple1.webp" alt="Exemple 3" style="width:180px; margin-top:10px; border-radius:5px;">
    </div>
  </section>
    </main>
    <?php
        include "./includes/footer.php";
    ?>  
>>>>>>> 53da9ef443ce151f752b5c154ab37ea74debb5df
    <script src="./asset/Js/jquery-3.7.1.min.js"></script>
    <script src="./asset/Js/script.js"></script>
</body>
</html>