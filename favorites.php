<?php
session_start();
if (session_id() == '' || !isset($_SESSION)) {
  header("location:login.php");
}

include_once("lib/book.php");
$books=Book::getAllBooks();
$favorites=Book::getAllFavorites($_SESSION["id"],$books);
?>

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
    <h2>Favoris</h2>


  </section>

  <!-- TITLE: <main> -->

  <main>
    <section id="cart" class="section-p1">
      <table width="100%">
        <thead>
          <tr>
            <td>Supprimer</td>
            <td>Couverture</td>
            <td>Titre</td>
          </tr>
        </thead>

        <tbody>
          <?php

          if (count($favorites) > 0) {
            foreach ($favorites as $book) {
              echo '<tr>';
              echo '<td><a class="croix" data-isbn="' . $book->getIsbn() . '"><i class="fa-solid fa-square-xmark"></i></a></td>';
              echo '<td><img src="' . $book->getCover() . '" alt="" /></td>';
              echo '<td>' . $book->getTitle() . '</td>';
              echo '</tr>';
            }
          } else {
            echo "Vous n'avez pas de livre préféré";
          }
          ?>
          <script>
            const deleteButtons = document.querySelectorAll('.croix');
            deleteButtons.forEach(button => {
              button.addEventListener('click', function (e) {
                e.preventDefault();
                const isbn = button.getAttribute('data-isbn');
                if (confirm('Voulez-vous vraiment supprimer ce livre de vos favoris ?')) {
                  window.location.href = 'delete_favorite.php?isbn=' + isbn;
                }
              });
            });
          </script>

        </tbody>
      </table>
    </section>

    <?php include("newsletter.html") ?>
  </main>

  <!-- TITLE: <footer> -->

  <footer class="section-p1">
    <div class="col">
      <!-- <img class="logo" src="img/logo.png" alt="" /> -->
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