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
    <title>Contact</title>
</head>
<body>
    <?php
        include "./includes/header.php";
    ?>
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

  <!-- Les points de navigation -->
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
    <div class="contact">
      <div class="contact-wrapper">
        
        <!--Carte -->
        <!-- <div class="contact-map">
          <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.999656174543!2d2.292292615674324!3d48.85837307928744!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66fdfdfdfdfdf%3A0xfdfdfdfdfdfdfdf!2sAdresse!5e0!3m2!1sfr!2sfr!4v0000000000000"
            width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div> -->

        <!--Formulaire -->
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
        </div>

      </div>
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