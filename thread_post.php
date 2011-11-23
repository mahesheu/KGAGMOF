<?php
session_start();
$user=$_SESSION['userId'];
echo $_POST['threadId'];

include('connection.php');
if(isset($_POST['submit']))
{
$title=addslashes($_POST['title']);
$des=addslashes($_POST['desc']);
$namQ=mysql_query("insert into threads(creator,title,description) values ('$user','$title','$des')");
if(!$namQ) echo mysql_error();
header('Location:articles.php');
}
?>