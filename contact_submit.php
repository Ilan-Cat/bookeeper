<?php
require_once("config.php");

$name = $_POST["name"];
$email = $_POST["email"];
$subject = $_POST["subject"];
$content = $_POST["content"];

// Prepare the SQL statement
$sql = "INSERT INTO contactform (name, email, subject, content, date) VALUES ('$name', '$email', '$subject', '$content', NOW())";

// Execute the SQL statement
if ($db->query($sql) === TRUE) {
    echo '<script>alert("Message envoyé !");</script>';

    // Redirect to previous page
    header("Location: " . $_SERVER["HTTP_REFERER"]);
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
// Close the database connection
$db->close();
?>

