<?php
include('connection.php');
$pid=$_GET['pid'];
mysql_query("delete from threads where tid='$pid'");
mysql_query("delete from comments where tid='$pid'");
header('location:articles.php');


?>