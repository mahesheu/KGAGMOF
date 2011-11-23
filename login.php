<?php 
session_start();
include('connection.php');
$username=$_POST['username'];
$password=$_POST['password'];
$result=mysql_query("select * from login where username='$username' && password='$password'");
$row=mysql_fetch_array($result);
if($row)
{
if($row['previlage']=='a')
{
$_SESSION['userId']='admin';
header('location:admin.php');
}
else
{
$status=$row['status'];
if($status==0)
{
header("location:index.php?ecode=0");
}
else if($status==2)
{
header("location:index.php?ecode=1");
}
else
{
$_SESSION['userId']=$row[0];
header("location:index.php");
}
}




}//ifrow
else
header("location:index.php?ecode=2");


?>