<?php
// Connexion à la base de données
require_once("config.php");

// Vérification si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Récupération des données du formulaire d'inscription
  $name = $_POST["name"];
  $email = $_POST["email"];
  $plain_password = $_POST["password"];

  // Vérification des données du formulaire
  if (!empty($name) && !empty($email) && !empty($plain_password)) {
    // Vérification si l'adresse email est déjà utilisée
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      echo "Cette adresse email est déjà utilisée. Veuillez en choisir une autre.";
    } else {
      // Génération du sel pour le mot de passe
      $salt = bin2hex(random_bytes(16));

      // Hachage du mot de passe avec le sel
      $hashed_password = hash('sha256', $salt . $plain_password);

      // Insertion des données de l'utilisateur dans la table users
      $stmt = $db->prepare("INSERT INTO users (name, email, password, salt) VALUES (?, ?, ?, ?)");
      $stmt->bind_param("ssss", $name, $email, $hashed_password, $salt);

      if ($stmt->execute()) {
        echo "Inscription réussie.";
        // Ajouter les actions à effectuer en cas d'inscription réussie
      } else {
        echo "Une erreur s'est produite lors de l'inscription.";
      }

      $stmt->close();
    }
  } else {
    echo "Veuillez remplir tous les champs du formulaire.";
  }
}

$db->close();
?>
