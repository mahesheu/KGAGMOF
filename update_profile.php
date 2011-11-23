<?php 
session_start();
include('photoClass.php');
$p=new photoClass;
$uid=$_SESSION['userId'];
$p->photo(50,50,$uid);
include('connection.php');
$name=$_POST['name'];
$qualification=$_POST['qualification'];
$workingat=$_POST['workingat'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$email=$_POST['email'];
$pic=$_POST['file'];
$phonemobile=$_POST['phonemobile'];
$phoneresidence=$_POST['phoneresidence'];
$x=mysql_query("UPDATE profile SET name='$name',qualification='$qualification', workingat='$workingat',gender='$gender',address='$address',email='$email',phonemobile='$phonemobile',phoneresidence='$phoneresidence' where id='$uid'");
if(!$x) echo mysql_error();
header('location:editprofile.php');
?>