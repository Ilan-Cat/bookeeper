<?php
if ($_GET['page']=="sproduct.php"){
    $page=$_GET['page']."?isbn=".$isbn;
}
else {
    $page=$_GET['page'];
}
echo $page."b";