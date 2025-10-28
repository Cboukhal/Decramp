<?php
    session_start();
    
    // Définir le fuseau horaire
    date_default_timezone_set('Europe/Paris');
    
    if(!empty($_POST["envoie"]))
    {
        include_once "./includes/fonctions.php";
        include_once "./includes/connexionbdd.php";

        // ===== VÉRIFICATION reCAPTCHA =====
        // Clé secrète de TEST Google (accepte toutes les validations)
        // En production, remplacez par votre vraie clé secrète
        $recaptcha_secret = "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe";
        $recaptcha_response = $_POST['g-recaptcha-response'] ?? '';
        
        // Vérifier si le reCAPTCHA est rempli
        if (empty($recaptcha_response)) {
            $_SESSION['flash_error'] = "Veuillez cocher la case reCAPTCHA.";
            header("Location: ./contact.php");
            exit;
        }
        
        // Vérifier le reCAPTCHA côté serveur
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_data = [
            'secret' => $recaptcha_secret,
            'response' => $recaptcha_response,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ];
        
        $recaptcha_options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-Type: application/x-www-form-urlencoded',
                'content' => http_build_query($recaptcha_data),
                'timeout' => 10
            ]
        ];
        
        $recaptcha_context = stream_context_create($recaptcha_options);
        $recaptcha_result = @file_get_contents($recaptcha_url, false, $recaptcha_context);
        
        if ($recaptcha_result === false) {
            // Erreur de connexion à Google
            error_log("Erreur connexion reCAPTCHA");
            $_SESSION['flash_error'] = "Erreur de validation reCAPTCHA. Veuillez réessayer.";
            header("Location: ./contact.php");
            exit;
        }
        
        $recaptcha_json = json_decode($recaptcha_result);
        
        // Debug : logger la réponse de Google (à retirer en production)
        error_log("reCAPTCHA response: " . print_r($recaptcha_json, true));
        
        if (!$recaptcha_json || !isset($recaptcha_json->success) || !$recaptcha_json->success) {
            $error_codes = isset($recaptcha_json->{'error-codes'}) ? implode(', ', $recaptcha_json->{'error-codes'}) : 'inconnu';
            error_log("reCAPTCHA failed - Error codes: " . $error_codes);
            $_SESSION['flash_error'] = "Validation reCAPTCHA échouée. Veuillez réessayer.";
            header("Location: ./contact.php");
            exit;
        }

        // Sécurisation des champs
        $nom     = secu($_POST["nom"]);
        $mail    = secu($_POST["email"]);
        $sujet   = secu($_POST["sujet"]);
        $message = secu($_POST["message"]);

        // Date formatée
        $date = date('d/m/Y H:i:s');

        // Récupérer l'email admin
        $adminEmail = 'boukhalfa.camil@hotmail.fr';
        try
        {
            $stmt = $connexion->prepare("SELECT mail FROM admins WHERE role = 'admin' LIMIT 1");
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($result && !empty($result['mail'])) {
                $adminEmail = $result['mail'];
            }
        }
        catch (PDOException $e)
        {
            error_log("Erreur récupération admin email : " . $e->getMessage());
        }

        // ===== Préparer les mails =====
        $objet = "Thierry Decramp Artisan électricien - $sujet";
        $contenu = "
            <h2>Nouveau message reçu</h2>
            <p>Merci de nous avoir laissé un message, Mr/Mme $nom.</p>
            <p>Nous vous recontacterons rapidement.</p>
            <p><b>Sujet :</b> " . htmlspecialchars($sujet) . "</p>
            <p><b>Message :</b><br>" . nl2br(htmlspecialchars($message)) . "</p>
            <p><b>Reçu le :</b> $date</p>
            <p>Thierry Decramp - Artisan électricien</p>
        ";
        
        $objet_admin = "Nouveau message depuis le site - " . $sujet;
        $contenu_admin = "
            <h2>Nouvelle demande</h2>
            <p><b>Nom :</b> " . htmlspecialchars($nom) . "</p>
            <p><b>Email :</b> " . htmlspecialchars($mail) . "</p>
            <p><b>Sujet :</b> " . htmlspecialchars($sujet) . "</p>
            <p><b>Message :</b><br>" . nl2br(htmlspecialchars($message)) . "</p>
            <p><small>Reçu le : $date</small></p>
        ";

        // ===== DÉSACTIVER LE DEBUG AVANT L'ENVOI =====
        // Capturer la sortie pour éviter les headers déjà envoyés
        ob_start();
        
        $sent_user  = envoyerMail($objet, $mail, $contenu);
        $sent_admin = envoyerMail($objet_admin, $adminEmail, $contenu_admin);
        
        // Récupérer le debug et le logger au lieu de l'afficher
        $debug_output = ob_get_clean();
        if (!empty($debug_output)) {
            error_log("Debug PHPMailer: " . $debug_output);
        }

        // ===== Sauvegarde en BDD =====
        try
        {
            $user_id = isset($_SESSION["connexion"]) && $_SESSION["connexion"] === true ? $_SESSION["id"] : null;
            $sql = "INSERT INTO messages (user_id, nom, email, sujet, message, date_envoi) 
                    VALUES (:user_id, :nom, :email, :sujet, :message, NOW())";
            $stmt = $connexion->prepare($sql);
            $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
            $stmt->bindValue(":nom", $nom);
            $stmt->bindValue(":email", $mail);
            $stmt->bindValue(":sujet", $sujet);
            $stmt->bindValue(":message", $message);
            $stmt->execute();
        }
        catch(PDOException $e)
        {
            error_log("Erreur insertion message : " . $e->getMessage());
        }

        // === Messages de feedback ===
        if ($sent_user && $sent_admin) {
            $_SESSION['flash_success'] = "Message envoyé avec succès ! Un email de confirmation vous a été envoyé.";
        } elseif ($sent_admin && !$sent_user) {
            $_SESSION['flash_success'] = "Message envoyé à l'administrateur.";
            $_SESSION['flash_error']   = "L'email de confirmation n'a pas pu être envoyé à votre adresse.";
        } elseif (!$sent_admin && $sent_user) {
            $_SESSION['flash_success'] = "Email de confirmation envoyé.";
            $_SESSION['flash_error']   = "La notification à l'administrateur a échoué.";
        } else {
            $_SESSION['flash_error'] = "Erreur lors de l'envoi des emails. Votre message a été enregistré.";
        }

        // ===== Redirection =====
        header("Location: ./contact.php");
        exit;
    }
    
    // Récupérer les messages flash
    $flash_success = $_SESSION['flash_success'] ?? '';
    $flash_error = $_SESSION['flash_error'] ?? '';
    unset($_SESSION['flash_success'], $_SESSION['flash_error']);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="./asset/css/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/favicon" href="./asset/image/OIP.webp">
    <title>Contact</title>
</head>
<body>
    <?php include "./includes/header.php"; ?>
    <main>
        <!-- 🏠 ACCUEIL -->
        <section class="hero">
            <div id="slider">
                <img src="./asset/image/ampoule.jpg" alt="ampoule">
                <img src="./asset/image/ampoule2.jpg" alt="ampoule2">
                <img src="./asset/image/ampoule3.jpg" alt="ampoule3">
            </div>

            <div class="hero-overlay">
                <h1>Contact</h1>
                <p>Thierry Decramp - SECIC - Artisan électricien</p>
                <p>Électricien depuis plus de 15 ans, spécialisé dans les nouvelles technologies et respectueux des normes.</p>
            </div>

            <div class="hero-dots">
                <span class="dot active" data-index="0"></span>
                <span class="dot" data-index="1"></span>
                <span class="dot" data-index="2"></span>
            </div>
        </section>

        <!-- ⏰ SECTION HORAIRES -->
        <section class="presentation">
            <h3>Section Horaires</h3>
            <blockquote>Lundi - Vendredi 8h/18h, Urgences 24/7</blockquote>
        </section>

        <!-- 📍 SECTION CONTACT -->
        <section>
            <h2>Contact</h2>
            
            <!-- Messages flash -->
            <?php if (!empty($flash_success)): ?>
                <div class="alert alert-success"><?= htmlspecialchars($flash_success) ?></div>
            <?php endif; ?>
            
            <?php if (!empty($flash_error)): ?>
                <div class="alert alert-error"><?= htmlspecialchars($flash_error) ?></div>
            <?php endif; ?>

            <div class="contact">
                <div class="contact-wrapper">
                    <!--Formulaire -->
                    <div class="contact-form">
                        <p><strong>Adresse :</strong> 67 rue du Charme</p>
                        <p><strong>Téléphone :</strong> 01 XX XX XX XX</p>
                        <form action="./contact.php" method="post">
                            <input type="text" name="nom" placeholder="Nom" required>
                            <input type="email" name="email" placeholder="Email" required>
                            <input type="text" name="sujet" placeholder="Sujet" required>
                            <textarea name="message" placeholder="Message" required></textarea>
                            <!-- Widget reCAPTCHA v2 -->
                            <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                            <button type="submit" name="envoie" value="1" class="btn">Envoyer</button>
                        </form>
                    </div>
              </div>
            </div>
        </section>
    </main>
    <?php include "./includes/footer.php"; ?>  
    <script src="./asset/Js/jquery-3.7.1.min.js"></script>
    <script src="./asset/Js/script.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>