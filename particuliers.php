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
    <title>Particuliers</title>
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
    <h1>Particuliers</h1>
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
  <!-- ===================== INTRO ===================== -->
  <section class="intro">
    <h3>Votre sécurité, notre priorité</h3>
    <p>
      Nous vous conseillons et assurons la sécurité de vos installations électriques domestiques, avec des solutions adaptées à votre habitat.
    </p>
  </section>

      <!-- ===================== GALERIE ===================== -->
  <section class="gallery">
    <div class="item"><img src="./asset/image/particuliers/20140307_171332.jpg" alt=""></div>
    <div class="item"><img src="./asset/image/particuliers/20140314_161634.jpg" alt=""></div>
    <div class="item"><img src="./asset/image/particuliers/20170713_161151.jpg" alt=""></div>
    <div class="item"><img src="./asset/image/particuliers/20191209_130940.jpg" alt=""></div>
    <div class="item"><img src="./asset/image/particuliers/20220323_182957.jpg" alt=""></div>
    <div class="item"><img src="./asset/image/particuliers/20220711_100204.jpg" alt=""></div>
    <div class="item"><img src="./asset/image/particuliers/IMG-20240710-WA0000.jpg" alt=""></div>
    <div class="item"><img src="./asset/image/particuliers/P_20180417_121552.jpg" alt=""></div>
  </section>

  <!-- ===================== PRESENTATION ===================== -->
  <section class="presentation">
    <h3>Notre engagement</h3>
    <blockquote>
      "Des interventions fiables, sécurisées et conformes aux normes en vigueur."
    </blockquote>
  </section>

  <!-- ===================== PRESTATIONS ===================== -->
  <section class="prestations" id="prestations">
    <h3>Nos prestations pour particuliers</h3>

    <div class="prestation">
      <h4>1. Réhabilitation & mise en conformité</h4>
      <ul>
        <li>Conseils et solutions conformes aux normes</li>
        <li>Garanties NF et PROMOTELEC</li>
      </ul>
    </div>

    <div class="prestation">
      <h4>2. Rénovation tableaux & circuits</h4>
      <ul>
        <li>Tableaux électriques</li>
        <li>Circuits encastrés, semi-encastrés, apparents</li>
      </ul>
    </div>

    <div class="prestation">
      <h4>3. Chauffage & ventilation</h4>
      <ul>
        <li>Études et solutions de chauffage électrique</li>
        <li>VMC performante et adaptée aux besoins</li>
      </ul>
    </div>

    <div class="prestation">
      <h4>4. Éclairage & domotique</h4>
      <ul>
        <li>Gestion automatisée de l’éclairage</li>
        <li>Solutions domotiques simples et efficaces</li>
      </ul>
    </div>

    <div class="prestation">
      <h4>5. Dépannages courants</h4>
      <ul>
        <li>Recherche de panne</li>
        <li>Court-circuit partiel ou total</li>
        <li>Isolation défaut d’isolement</li>
        <li>Réparation & rénovation</li>
        <li>Conseil personnalisé</li>
      </ul>
    </div>

    <div class="prestation">
      <h4>6. Alarme & contrôle d’accès</h4>
      <ul>
        <li>Étude adaptée à votre logement</li>
        <li>Installation et mise en service</li>
      </ul>
    </div>
  </section>
    </main>
    <?php
        include "./includes/footer.php";
    ?>  
    <script src="./asset/Js/jquery-3.7.1.min.js"></script>
    <script src="./asset/Js/script.js"></script>
</body>
</html>