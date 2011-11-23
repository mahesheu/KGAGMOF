<?php
include('connection.php');
$cid=$_GET['cid'];
mysql_query("delete from comments where id='$cid'");
header('location:articles.php');

?>