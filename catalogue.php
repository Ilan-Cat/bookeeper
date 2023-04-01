<?php
if (isset($_GET['success'])) {
  if ($_GET['success'] == 1) {
    $message = "Le livre a été ajouté à vos favoris !";
  } else {
    $message = "Le livre est déjà dans vos favoris !";
  }
  echo '<script>alert("' . $message . '")</script>';
}
if (session_id() == '' || !isset($_SESSION)) {
  session_start();

} ?>
<!-- <script>alert("here")</script> -->
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
        <li><a class="active" href="catalogue.php">Catalogue</a></li>
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

  <section id="page-header">
    <h2>Catalogue</h2>

  </section>

  <!-- TITLE: <main> -->

  <main>

    <section id="product1" class="section-p1">
      <div class="pro-container">
        <?php
        include("lib/book.php");
        if (isset($_GET["page"])) {
          $page = $_GET["page"];
        } else {
          $page = 1;
        }
        ;
        $results_per_page = 16;
        $start_from = ($page - 1) * $results_per_page;
        $allbooks = Book::getAllBooks();
        $books = array_slice($allbooks, $start_from, $results_per_page);
        foreach ($books as $book) {
          echo '<div class="pro" onclick="window.location.href=\'sproduct.php?isbn=' . $book->getIsbn() . '\'">';
          echo '<img src="' . $book->getCover() . '" alt="" />';
          echo '<div class="des">';
          echo '<span>' . $book->getAuthor() . '</span>';
          echo '<h5>' . $book->getTitle() . '</h5>';
          echo "</div>";
          echo '<a href="/sproduct.php?isbn='.$book->getIsbn().'"><i class="fa-regular fa-heart cart"></i></a>';
          echo "</div>";
        }
        
        ?>

      </div>
    </section>

    <section id="pagination" class="section-p1">
      <?php
      $total_pages = ceil(count($allbooks) / $results_per_page);
      for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='catalogue.php?page=" . $i . "'>" . $i . "</a>";
      }
      if ($page < $total_pages) {
        $next_page = $page + 1;
        echo "<a href='catalogue.php?page=" . $next_page . "'><i class='fa-solid fa-arrow-right'></i></a>";
      }
      ?>
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