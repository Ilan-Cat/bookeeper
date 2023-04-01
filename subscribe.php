<?php
require_once("config.php");

$email = $_POST["email"];

// Prepare the SQL statement
$sql = "INSERT INTO newsletter (email) VALUES ('$email')";

// Execute the SQL statement
if ($db->query($sql) === TRUE) {
    echo '<script>alert("Vous êtes bien inscrit pour la newsletter !");</script>';

    // Redirect to previous page
    header("Location: " . $_SERVER["HTTP_REFERER"]);
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
// Close the database connection
$db->close();
?>

