<?php if(session_id() == '' || !isset($_SESSION)){session_start();} 
if (isset($_GET['success'])) {
  if ($_GET['success'] == 1) {
    $message = "Le livre a été ajouté à vos favoris !";
  } else {
    $message = "Le livre est déjà dans vos favoris !";
  }
  echo '<script>alert("' . $message . '")</script>';
}
?>

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
        <li><a class="active" href="index.php">Accueil</a></li>
        <li><a href="catalogue.php">Catalogue</a></li>
        <li><a href="about.php">A propos</a></li>
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

  <section id="hero">
    <div id="hero2">
      <h4>La librairie en ligne</h4>
      <h2>Pour</h2>
      <h1>Vos livres</h1>
      <p>Nouveautés 2023 disponibles !</p>
      <a class="button" href="catalogue.php"><span class="buttonspan">Découvrir</span></a>
    </div>
  </section>

  <!-- TITLE: <main> -->

  <main>
    <section id="feature" class="section-p1">
      <div class="fe-box">
        <img src="img/features/f1.png" alt="" />
        <h6>Facile d'utilisation</h6>
      </div>
      <div class="fe-box">
        <img src="img/features/f2.png" alt="" />
        <h6>Infos en temps réel</h6>
      </div>
      <div class="fe-box">
        <img src="img/features/f3.png" alt="" />
        <h6>Nouveautés 2023</h6>
      </div>
      <div class="fe-box">
        <img src="img/features/f4.png" alt="" />
        <h6>Vos coups de coeurs</h6>
      </div>
      <div class="fe-box">
        <img src="img/features/f5.png" alt="" />
        <h6>Forte RSE</h6>
      </div>
      <div class="fe-box">
        <img src="img/features/f6.png" alt="" />
        <h6>Équipe à l'écoute</h6>
      </div>
    </section>

    <section id="product1" class="section-p1">
      <h2>La sélection du moment</h2>
      <div class="pro-container">

        <?php
        include("lib/book.php");
        $books = Book::getAllBooks();
        $bestsellers = array_filter($books, function ($book) {
          return $book->getBestseller() == 1;
        });

        foreach ($bestsellers as $book) {
          echo '<div class="pro" onclick="window.location.href=\'sproduct.php?isbn=' . $book->getIsbn() . '\'">';
          echo '<img src="' . $book->getCover() . '" alt="" />';
          echo '<div class="des">';
          echo '<span>' . $book->getAuthor() . '</span>';
          echo '<h5>' . $book->getTitle() . '</h5>';
          echo "</div>";
          if (isset($_SESSION['id'])) { // Check if user is logged in
            echo '<a href="add_favorite.php?isbn=' . $book->getIsbn() . '&page=index.php"><i class="fa-regular fa-heart cart"></i></a>';
          } else {
            echo '<a href="login.php"><i class="fa-regular fa-heart cart"></i></a>';

          }
          echo "</div>";
        }

        ?>
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
      <img src="img/movie.gif" width="110" height="220" alt="GIF" />
    </div>
    <div class="copyright">
      <p>© Ilan Catelan 2022 - Tous droits réservés</p>
    </div>
  </footer>

  <script src="script.js"></script>
</body>

</html>