<?php
session_start();
require_once("config.php");

$isbn = $_GET['isbn'];
$iduser = $_SESSION['id'];
if($iduser == null){
    header("Location:/login.php");
    exit;
}
// Prepare the SQL statement to check if the book is already present in userfavorites
$check_stmt = $db->prepare("SELECT COUNT(*) FROM userfavorites WHERE user_id = ? AND isbn = ?");
$check_stmt->bind_param("is", $iduser, $isbn);
$check_stmt->execute();
$check_stmt->bind_result($count);
$check_stmt->fetch();
$check_stmt->close();

// If the book is not already present, insert it into userfavorites
if ($count == 0) {
    // Prepare the SQL statement to insert the book into userfavorites
    $insert_stmt = $db->prepare("INSERT INTO userfavorites (user_id, isbn) VALUES (?, ?)");
    $insert_stmt->bind_param("is", $iduser, $isbn);

    // Execute the statement
    $insert_stmt->execute();

    // Close the statement and the database connection
    $insert_stmt->close();
    $db->close();
    if ($_GET['page']=="sproduct.php"){
        header("Location:".$_GET['page']."?isbn=".$isbn."&success=1");
    }
    else{
        header("Location:".$_GET['page']."?success=1");
    }
    exit;
} else {
    if ($_GET['page']=="sproduct.php"){
        header("Location:".$_GET['page']."?isbn=".$isbn."&success=0");
    }
    else{
        header("Location:".$_GET['page']."?success=0");
    }
    exit;
}
?>
