<?php
if(session_id() == '' || !isset($_SESSION)){session_start();}
require_once("config.php");

// Récupération des données du formulaire de connexion
$email = $_POST["email"];
$plain_password = $_POST["password"];

// Recherche de l'utilisateur dans la base de données
$stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

// Vérification de l'existance de l'utilisateur
if ($result->num_rows == 1) {
  // Récupération des données de l'utilisateur
  $row = $result->fetch_assoc();
  $hashed_password = $row["password"];
  $salt = $row["salt"];

  // Vérification du mot de passe
  if (hash('sha256', $salt . $plain_password) == $hashed_password) {
    $_SESSION['username'] = $row["name"];
    $_SESSION['id'] = $row["id"];
    header("location:index.php");
    // Ajouter les actions à effectuer en cas de connexion réussie
  } else {
    echo "Mot de passe incorrect.";
    echo '<h1>Mot de passe invalide ! </h1>';
    header("Refresh: 3; url=index.php");
  }
} else {
  echo '<h1>Compte non trouvé! </h1>';
  header("Refresh: 3; url=index.php");
}

$stmt->close();
$db->close();

?>