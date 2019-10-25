<?php 
$uname = $_GET['sname'];
require_once "connection.php";
mysqli_query($db,"delete from student where username= '$uname' ");
header('location:student.php');
?>
 