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
    <title>Professionnels</title>
</head>
<body>
    <?php
        include "./includes/header.php";
    ?>
    <main>
    <section class="hero">
  <div id="slider">
    <img src="./asset/image/ampoule.jpg" alt="ampoule">
    <img src="./asset/image/ampoule2.jpg" alt="ampoule2">
    <img src="./asset/image/ampoule3.jpg" alt="ampoule3">
  </div>

  <div class="hero-overlay">
    <h1>Professionnels</h1>
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
    <h3>Solutions électriques pour les professionnels</h3>
    <p>
      Nous intervenons auprès des entreprises et industriels pour garantir la fiabilité, la performance et la conformité de leurs installations électriques.
    </p>
  </section>

  <!-- ===== SECTION INTRODUCTION ===== -->
  <section class="presentation">
    <h3>Introduction</h3>
    <blockquote>“Nous accompagnons entreprises, usines, et collectivités avec des solutions conformes et adaptées.”</blockquote>
  </section>

  <!-- ===== SECTION PRESTATIONS ===== -->
  <section class="prestations">
    <h3>Prestations professionnelles</h3>

    <div class="prestation">
      <h4>1. Conformité & normes</h4>
      <ul>
        <li>Réalisation de travaux suivant les rapports APAVE, VERITAS, NORISKO, etc., avec solutions adaptées.</li>
      </ul>
    </div>

    <div class="prestation">
      <h4>2. Câblages électriques & informatiques</h4>
      <ul>
        <li>Pose de prises informatiques</li>
        <li>Raccordement prises à Baie de câblage</li>
        <li>Recette informatique</li>
        <li>Raccordement onduleur</li>
      </ul>
    </div>

    <div class="prestation">
      <h4>3. Maintenance machines-outils</h4>
      <ul>
        <li>Électromécanique sur machines industrielles</li>
      </ul>
    </div>

    <div class="prestation">
      <h4>4. Automatismes</h4>
      <ul>
        <li>Câblages suivant cahiers des charges</li>
      </ul>
    </div>

    <div class="prestation">
      <h4>5. Alimentation & installation machines</h4>
      <ul>
        <li>Réalisation et branchement des alimentations</li>
      </ul>
    </div>

    <div class="prestation">
      <h4>6. Installations industrielles</h4>
      <ul>
        <li>Pose de chemin de câbles, goulottes, moulures</li>
        <li>Prises, interrupteurs, boutons poussoirs, va-et-vient</li>
      </ul>
    </div>

    <div class="prestation">
      <h4>7. Éclairage industriel</h4>
      <ul>
        <li>Pose avec nacelle, maintenance sur demande</li>
      </ul>
    </div>

    <div class="prestation">
      <h4>8. Éclairage de secours</h4>
      <ul>
        <li>Études, pose et entretien</li>
      </ul>
    </div>

    <div class="prestation">
      <h4>9. Tableaux & armoires électriques</h4>
      <ul>
        <li>Armoires de commande, coffrets techniques</li>
        <li>Coffrets électriques, tableau divisionnaires</li>
        <li>TGBT</li>
        <li>Plans & schémas électriques</li>
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