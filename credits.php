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
        <h2>Crédits</h2>

    </section>
    <!-- </header> -->

    <!-- TITLE: <main> -->

    <main>
        <section id="mentions">

            <!-- ->> : FLATICON -->
            <h2>Flaticon :</h2>
            <p>
                <a href="https://www.flaticon.com/fr/icones-gratuites/femme" title="femme icônes" target="_blank">Femme icônes créées
                    par Freepik - Flaticon</a>
                <br>
                <a href="https://www.flaticon.com/fr/icones-gratuites/cheveux-longs" title="cheveux longs icônes">Cheveux longs icônes créées par Freepik - Flaticon</a>
                <br>
                <a href="https://www.flaticon.com/fr/icones-gratuites/gens" title="gens icônes" target="_blank">Gens icônes créées par
                    Freepik - Flaticon</a>

                <br><br>

                <a href="https://www.flaticon.com/free-icons/facebook" title="facebook icons" target="_blank">Facebook icons created by
                    Pixel perfect - Flaticon</a>
                <br>
                <a href="https://www.flaticon.com/free-icons/twitter" title="twitter icons" target="_blank">Twitter icons created by
                    Pixel perfect - Flaticon</a>
                <br>
                <a href="https://www.flaticon.com/free-icons/github" title="github icons" target="_blank">Github icons created by Pixel
                    perfect - Flaticon</a>
                <br>
                <a href="https://www.flaticon.com/free-icons/pinterest" title="pinterest icons" target="_blank">Pinterest icons created
                    by Pixel perfect - Flaticon</a>
                <br>
                <a href="https://www.flaticon.com/free-icons/crunchyroll" title="crunchyroll icons" target="_blank">Crunchyroll icons
                    created by Pixel perfect - Flaticon</a>
            </p>

            <!-- ->> : FREEPIK -->
            <h2>Freepik :</h2>
            <p>
                <a href="https://www.freepik.com/free-psd/mockup-two-books-dark-gray-background_19578057.htm#query=white%20book%20mockup&position=3&from_view=keyword" target="_blank">Image
                    by Vectonauta</a> on Freepik
            </p>

            <!-- ->> : STORYSET -->
            <h2>Storyset :</h2>
            <p>
                <a href="https://storyset.com/user" target="_blank">User illustrations by Storyset</a>
                <br>
                <a href="https://storyset.com/online" target="_blank">Online illustrations by Storyset</a>
                <br>
                <a href="https://storyset.com/online" target="_blank">Online illustrations by Storyset</a>
                <br>
                <a href="https://storyset.com/people" target="_blank">People illustrations by Storyset</a>
                <br>
                <a href="https://storyset.com/business" target="_blank">Business illustrations by Storyset</a>
                <br>
                <a href="https://storyset.com/people" target="_blank">People illustrations by Storyset</a>
            </p>

            <!-- ->> : CANVAS -->
            <h2>Canvas :</h2>
            <p>

            </p>
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