<?php
session_start();
require_once("config.php");

$isbn = $_GET['isbn'];
$iduser = $_SESSION['id'];

$sql = "DELETE FROM userfavorites WHERE user_id=$iduser AND isbn=$isbn";
$result = $db->query($sql);

$db->close();

header("Location: favorites.php");
exit;
?>
