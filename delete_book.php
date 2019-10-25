<?php 
$id = $_GET['bid'];
require_once "connection.php";
mysqli_query($db,"delete from books where bid=$id");
header('location:books.php');
?>
 