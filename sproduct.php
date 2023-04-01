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
<!DOCTYPE html>

<?php
$isbn = "";
$isbn = $_GET["isbn"];
include("lib/book.php");
$books = Book::getAllBooks();

$selected_book = null;
foreach ($books as $book) {
  if ($book->getIsbn() === $isbn) {
    $selected_book = $book;
    break;
  }
}
?>

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
    <a href="index.php"><img src="img/logo.png" class="logo" alt="" /></a>

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

  <!-- TITLE: <main> -->

  <main>
    <section id="prodetails" class="section-p1">
      <div class="single-pro-image">

        <img src=<?php echo $selected_book->getCover() ?> width="100%" id="MainImg" alt="" />
      </div>

      <div class="single-pro-details">
        <h2>
          <?php echo $selected_book->getTitle() ?>
        </h2>
        <h3>
          <?php echo $selected_book->getAuthor() ?>
        </h3>
        <button class="normal" onclick="addToFavorites('<?php echo $isbn; ?>')">Ajouter aux favoris</button>
        <script>
          function addToFavorites(isbn) {
            window.location.href = "add_favorite.php?isbn=" + isbn + "&page=sproduct.php";
          }
        </script>
        <h4>Informations</h4>
        <span>
          Année de publication :
          <?php echo $selected_book->getYear() ?> <br>
          ISBN :
          <?php echo $selected_book->getIsbn() ?> <br>
          Editeur :
          <?php echo $selected_book->getPublisher() ?> <br>
          Description :
          <?php echo $selected_book->getDescription() ?> <br>
        </span>
      </div>
    </section>

    <?php include("newsletter.html") ?>

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

    <script>
      var MainImg = document.getElementById("MainImg");
      var smallimg = document.getElementsByClassName("small-img");

      smallimg[0].onclick = function() {
        MainImg.src = smallimg[0].src;
      };
      smallimg[1].onclick = function() {
        MainImg.src = smallimg[1].src;
      };
      smallimg[2].onclick = function() {
        MainImg.src = smallimg[2].src;
      };
      smallimg[3].onclick = function() {
        MainImg.src = smallimg[3].src;
      };
    </script>

    <script src="script.js"></script>
</body>

</html>