<?php
session_start();
include('connection.php');

$user=$_SESSION['userId'];
$thrdid=$_GET['tid'];
$comment=addslashes($_GET['comment']);
$query=mysql_query("insert into comments(tid,comment,creator)values('$thrdid','$comment','$user')");
if(!$query) echo mysql_error();
//echo $thrdid;
//echo $comment;
//echo $user;
header('location:articles.php')
?>