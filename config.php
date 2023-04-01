<?php
$host = "localhost";
$user = "root";
$password = "root";
$dbname = "jupiterdb";

// Connect to the database
$db = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>