<?php if(session_id() == '' || !isset($_SESSION)){session_start();} ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Book Keeper</title>
  <script src="https://kit.fontawesome.com/f099274e52.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="style.css" />
</head>

<body>

  <div class="inner-cursor"></div>
  <div class="outer-cursor"></div>

  <!-- TITLE: <header> -->

  <section id="header">
    <a href="index.php"><img src="img/logo.png" class="logo" alt="logo du site" /></a>

    <div>
      <ul id="navbar">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="catalogue.php">Catalogue</a></li>
        <li><a class="active" href="about.php">A propos</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li id="lg-bag">
          <a href="favorites.php"><i class="fa-solid fa-heart"></i></a>
        </li>
        <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
      </ul>
    </div>
    <div id="mobile">
      <a href="favorites.php"><i class="fa-solid fa-heart"></i></a>
      <i id="bar" class="fa-solid fa-bars"></i>
    </div>
  </section>

  <section id="page-header" class="about-header">
    <h2>A propos de nous</h2>
  </section>

  <section id="about-head" class="section-p1">
    <img src="img/about/a6.png" alt="illustration équipe" />
    <div>
      <h2>Qui sommes nous ?</h2>
      <p>
        Chez Book Keeper, nous sommes passionnés par les livres et leur pouvoir de nous transporter dans de nouveaux mondes, de nous éduquer et de nous inspirer. Nous croyons que chaque livre est unique et que chaque lecteur a des préférences différentes. C'est pourquoi nous avons créé une plateforme en ligne qui permet à chacun de répertorier et de partager ses livres préférés avec la communauté.
        <br>
        <br>
        Notre mission est de faire en sorte que chaque lecteur puisse continuer à apprécier ses livres préférés pour les années à venir. Nous croyons également que les livres peuvent être une source de connexion entre les personnes et nous espérons créer une communauté dynamique et engagée de lecteurs passionnés.
        <br>
        <br>
        Nous sommes une entreprise jeune et dynamique, mais nous avons de grandes ambitions pour l'avenir. Nous continuerons à travailler dur pour améliorer notre plateforme et pour fournir une expérience utilisateur exceptionnelle à tous ceux qui cherchent à partager leur passion pour la lecture.
      </p>
    </div>
  </section>

  <!-- TITLE: <main> -->

  <main>
    <section id="feature" class="section-p1">
      <div class="fe-box">
        <img src="img/features/f1.png" alt="illustration facile d'utilisation" />
        <h6>Facile d'utilisation</h6>
      </div>
      <div class="fe-box">
        <img src="img/features/f2.png" alt="illustration infos en temps réel" />
        <h6>Infos en temps réel</h6>
      </div>
      <div class="fe-box">
        <img src="img/features/f3.png" alt="illustration nouveautés 2023" />
        <h6>Nouveautés 2023</h6>
      </div>
      <div class="fe-box">
        <img src="img/features/f4.png" alt="illustration vos coup de coeur" />
        <h6>Vos coups de coeurs</h6>
      </div>
      <div class="fe-box">
        <img src="img/features/f5.png" alt="illustration forte RSE" />
        <h6>Forte RSE</h6>
      </div>
      <div class="fe-box">
        <img src="img/features/f6.png" alt="illustration équipe à l'écoute" />
        <h6>Équipe à l'écoute</h6>
      </div>
    </section>

    <?php include("newsletter.html") ?>
  </main>

  <!-- TITLE: <footer> -->

  <footer class="section-p1">
    <div class="col">
      <h4>Contact</h4>
      <p><strong>Addresse: </strong> Pl. du Panthéon, 75005 Paris</p>
      <p><strong>Téléphone:</strong> +33 1.10.12.27.11</p>
      <p><strong>Heures:</strong> Lundi - Samedi : 10h / 18h</p>
      <div class="follow">
        <h4>Suivez-nous</h4>
        <div class="icon">
          <a href="#"><img src="img/follow_logo/facebook.png" alt="facebook"></a>
          <a href="#"><img src="img/follow_logo/twitter.png" alt="twitter"></a>
          <a href="#"><img src="img/follow_logo/github.png" alt="github"></a>
          <a href="#"><img src="img/follow_logo/pinterest.png" alt="pinterest"></a>
          <a href="#"><img src="img/follow_logo/crunchyroll.png" alt="crunchyroll"></a>
        </div>
      </div>
    </div>

    <div class="col">
      <h4>A propos</h4>
      <a href="about.php">A propos</a>
      <a href="mentions.php">Mentions légales et politique de confidentialité</a>
      <a href="credits.php">Crédits</a>
      <a href="contact.php">Contactez-nous</a>
    </div>

    <div class="col">
      <h4>Mon compte</h4>
      <?php
      if (isset($_SESSION['username'])) {
        echo '<a href="favorites.php">Mes favoris</a>';
        echo '<a href="logout.php">Log Out</a>';
      } else {
        echo '<a href="login.php">Se connecter/Créer un compte</a>';
      }
      ?>
    </div>

    <div class="col install">
      <img src="img/movie.gif" width="110" height="220" alt="GIF Bookeper" />
    </div>
    <div class="copyright">
      <p>© Ilan Catelan 2022 - Tous droits réservés</p>
    </div>
  </footer>

  <script src="script.js"></script>
</body>

</html>