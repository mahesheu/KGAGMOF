<?php
include('connection.php');
$id=$_GET['did'];
$query=mysql_query("delete from galary where id='$id'");
header('Location:gallary.php');

?>