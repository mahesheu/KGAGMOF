<?php
include('connection.php');
$id=$_GET['did'];
$query=mysql_query("delete from downloads where id='$id'");
header('Location:downloads.php');

?>