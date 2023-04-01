<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION["username"])) {

    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/f099274e52.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="style_login.css">
</head>

<body id="login">

    <section id="header">
        <a href="index.php"><img src="img/logo.png" class="logo" alt="logo du site" /></a>

        <div>
            <ul id="navbar">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="catalogue.php">Catalogue</a></li>
                <li><a href="about.php">A propos</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li id="lg-bag">
                    <a><i class="fa-solid fa-heart"></i></a>
                </li>
                <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
            </ul>
        </div>
        <div id="mobile">
            <a href="favorites.html"><i class="fa-solid fa-heart"></i></a>
        </div>
    </section>
    <div class="inner-cursor"></div>
    <div class="outer-cursor"></div>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form method="post" action="register.php">
                <h1 class="login_h1">S'inscrire</h1>
                <input type="text" id="name" name="name" placeholder="Nom" />
                <input type="email" id="email" name="email" placeholder="Email" />
                <input type="password" id="password" name="password" placeholder="Password" />
                <button type="submit">S'inscrire</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form method="post" action="verify.php">
                <h1 class="login_h1">Se connecter</h1>
                <input type="email" id="email" name="email" placeholder="Email" />
                <input type="password" id="password" name="password" placeholder="Password" />
                <button type="submit">Se connecter</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="login_h1">Content de vous revoir !</h1>
                    <p class="login_p">Pour rester connecté avec nous, veuillez vous connecter avec vos informations personnelles</p>
                    <button class="ghost" id="signIn">Se connecter</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="login_h1">Bonjour !</h1>
                    <p class="login_p">Inscrivez-vous pour commencer votre aventure littéraire</p>
                    <button class="ghost" id="signUp">S'inscrire</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script_login.js"></script>

</body>

</html>