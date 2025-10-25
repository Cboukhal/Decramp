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
    <title>Liens</title>
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
    <h1>Liens</h1>
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

  <!-- 🔹 INTRODUCTION -->
  <section class="presentation">
    <h3>Introduction</h3>
    <blockquote>"Découvrez nos partenaires, réalisations et retours clients"</blockquote>
  </section>

  <!-- 🔹 SECTION LIENS -->
  <section class="prestations">
    <h3>Section Liens</h3>

    <div class="prestation">
      <h4>Daffy Électricité</h4>
      <p>Entreprise de dépannages et d’installations en électricité et contrôle d’accès, antennes, réseaux, spécialisée dans les copropriétés.</p>
      <a href="#" class="btn">Lien</a>
    </div>

    <div class="prestation">
      <h4>Qualifelec</h4>
      <p>Bien choisir une entreprise d’électricité, un électricien. Vous cherchez un prestataire pour une installation électrique ou une rénovation ?</p>
      <a href="#" class="btn">Lien</a>
    </div>

    <div class="prestation">
      <h4>Promotelec</h4>
      <p>Association créée en 1962 pour promouvoir la sécurité et la qualité des installations électriques dans le bâtiment. Elle regroupe tous les acteurs du secteur.</p>
      <a href="#" class="btn">Lien</a>
    </div>

    <div class="prestation">
      <h4>FFD Domotique</h4>
      <p>Fédération à but non lucratif dédiée à la domotique. Elle s’adresse à tous les acteurs : électricité, énergie, sécurité, télécoms, automatisme, etc.</p>
      <a href="#" class="btn">Lien</a>
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