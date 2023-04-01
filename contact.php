<?php if (session_id() == '' || !isset($_SESSION)) {
  session_start();
} ?>
<!DOCTYPE html>
<html lang="en">

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
        <li><a href="about.php">A propos</a></li>
        <li><a class="active" href="contact.php">Contact</a></li>
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
    <h2>Restons en contact !</h2>
  </section>

  <!-- TITLE: <main> -->

  <main>
    <section id="contact-details" class="section-p1">
      <div class="details">
        <span>RESTONS EN CONTACT</span>
        <h2>Rendez-nous visite ou contactez nous</h2>
        <h3>Siège social</h3>
        <div>
          <li>
            <i class="fa-solid fa-map-pin"></i>
            <p>Pl. du Panthéon, 75005 Paris</p>
          </li>
          <li>
            <i class="fa-regular fa-envelope"></i>
            <p>contact@bookeeper.com</p>
          </li>
          <li>
            <i class="fa-solid fa-phone"></i>
            <p>+33 1.10.12.27.11</p>
          </li>
          <li>
            <i class="fa-regular fa-clock"></i>
            <p>Lundi - Samedi : 10h / 18h</p>
          </li>
        </div>
      </div>

      <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9498.221354235322!2d2.3397773171540415!3d48.846412425823836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671e7d297c973%3A0xe5eb004f23a758!2zUGFudGjDqW9u!5e0!3m2!1sfr!2sfr!4v1669828976585!5m2!1sfr!2sfr" width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </section>

    <section id="form-details">
      <form method="post" action="contact_submit.php">
        <span>LAISSEZ NOUS UN MESSAGE</span>
        <h2>Votre avis nous intéresse</h2>
        <input type="text" name="name" id="name" placeholder="Nom" required maxlength="20" />
        <input type="email" name="email" id="email" placeholder="E-mail" required maxlength="50" />
        <input type="text" name="subject" id="subject" placeholder="Sujet" required maxlength="50" />
        <textarea name="content" id="content" cols="30" rows="5" placeholder="Votre Message" maxlength="1000" required></textarea>
        <button class="normal" type="Submit">Envoyer</button>
      </form>

      <div class="people">
        <div>
          <img src="img/people/1.png" alt="" />
          <p>
            <span>Stéphanie Obeqva</span> Bibliothécaire en chef <br />
            Télephone: +33 6 79 24 34 51 <br />
            Email: contact@Obeqva.com
          </p>
        </div>
        <div>
          <img src="img/people/2.png" alt="" />
          <p>
            <span>Zaynab Hfaiedh</span> Bibliothécaire <br />
            Télephone: +33 7 23 67 58 94 <br />
            Email: contact@Hfaiedh.com
          </p>
        </div>
        <div>
          <img src="img/people/3.png" alt="" />
          <p>
            <span>Noah Santos</span> Bibliothécaire <br />
            Télephone: +33 6 16 87 92 30 <br />
            Email: contact@Santos.com
          </p>
        </div>
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
        <img src="img/movie.gif" width="110" height="220" alt="GIF Bookeeper" />
      </div>
      <div class="copyright">
        <p>© Ilan Catelan 2022 - Tous droits réservés</p>
      </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>