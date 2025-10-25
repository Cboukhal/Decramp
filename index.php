<?php
    session_start();
?>
<!------------------------------------------------------------------------------>
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
    <title>Accueil</title>
</head>
<body>
    <?php
        include "./includes/header.php";
    ?>
    <main>
      <!-- ACCUEIL -->
    <section class="hero">
        <div id="slider">
            <img src="./asset/image/ampoule.jpg" alt="ampoule">
            <img src="./asset/image/ampoule2.jpg" alt="ampoule2">
            <img src="./asset/image/ampoule3.jpg" alt="ampoule3">
        </div>

        <div class="hero-overlay">
            <h1>Accueil</h1>
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

  <!--PARTICULIERS -->
    <section>
        <h2>Particuliers</h2>
        <div class="section-content">
            <p>Mise en conformité installation, tableaux électriques, chauffage électrique, dépannages, domotique, alarme et contrôle d’accès...</p>
            <div class="gallery">
            <div class="item">
                <img src="./asset/image/exemple1.webp" alt="Exemple 1">
            </div>
            <div class="item">
                <img src="./asset/image/exemple2.jpg" alt="Exemple 2">
            </div>
            <div class="item">
                <img src="./asset/image/ampoule2.jpg" alt="Exemple 3">
            </div>
            </div>
            <br>
            <a href="particuliers.php" class="btn">En savoir plus</a>
        </div>
    </section>

  <!--PROFESSIONNELS -->
    <section>
        <h2>Professionnels</h2>
        <div class="section-content">
            <p>Réalisation de travaux suivant les rapports de conformité, câblages électriques et informatiques, maintenance machines outils, câblages pour automatismes, alimentations électriques, installations électriques dans les usines, appareils d’éclairage, ...</p>
            <div class="gallery">
            <div class="item">
                <img src="./asset/image/exemple1.webp" alt="Exemple 1">
                <p>Exemple 1</p>
            </div>
            <div class="item">
                <img src="./asset/image/exemple2.jpg">
                <p>Exemple 2</p>
            </div>
            <div class="item">
                <img src="./asset/image/ampoule2.jpg" alt="Exemple 3">
                <p>Exemple 3</p>
            </div>
            </div>
            <br>
            <a href="professionnels.php" class="btn">En savoir plus</a>
        </div>
    </section>

  <!--ÉVALUATION -->
    <section>
        <h2>Évaluer nos services</h2>
        <div class="section-content">
        <p>"Besoin d’un électricien ? Obtenez votre devis" <br> Cliquez sur le bouton :</p>
        <a href="commentaire.php" class="btn">Évaluer</a>
        </div>
    </section>

  <!--CONTACT -->
    <section>
        <h2>Contact</h2>
        <div class="contact">
        <div class="contact-wrapper">
            
            <!--Carte -->
            <!-- <div class="contact-map">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.999656174543!2d2.292292615674324!3d48.85837307928744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fdfdfdfdfdf%3A0xfdfdfdfdfdfdfdf!2sAdresse!5e0!3m2!1sfr!2sfr!4v0000000000000"
                width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div> -->

            <!--Formulaire -->
<<<<<<< HEAD
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
=======
            <div class="contact-form">
            <p><strong>Adresse :</strong> 67 rue du Charme</p>
            <p><strong>Téléphone :</strong> 01 XX XX XX XX</p>
            <form action="#" method="post">
                <input type="text" name="nom" placeholder="Nom" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="sujet" placeholder="Sujet">
                <textarea name="message" placeholder="Message" required></textarea>
                <!-- Widget reCAPTCHA v2 -->
                <div class="g-recaptcha" data-sitekey="6LeIxAcTAAAAAJcZVRqyHh71UMIEGNQ_MXjiZKhI"></div>
                <button type="submit" class="btn">Envoyer</button>
            </form>
>>>>>>> 53da9ef443ce151f752b5c154ab37ea74debb5df
            </div>
    </section>
    </main>
    <?php
        include "./includes/footer.php";
    ?>  
    <script src="./asset/Js/jquery-3.7.1.min.js"></script>
    <script src="./asset/Js/script.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>