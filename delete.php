<?php
include('connection.php');
$id=$_GET['nid'];
$query=mysql_query("delete from news where id='$id'");
header('Location:news.php');

?>