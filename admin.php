<?php 
session_start();
include('connection.php');
$result=mysql_query("select * from login where status=0");
//while($raw=mysql_fetch_array($result))
{

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<link rel="stylesheet" href="jquery.jcarousel.css" type="text/css" media="all" />
<title>KGAGMOF</title>

	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.jcarousel.pack.js"></script>
	<script type="text/javascript" src="js/func.js"></script>

<!-- Begin DropDown -->
      
<script type="text/javascript">
$(function(){
   $("ul.dropdown li").hover(function(){
        $(this).addClass("hover");
        $('ul:first',this).css('visibility', 'visible');
    
    }, function(){
   $(this).removeClass("hover");
   $('ul:first',this).css('visibility', 'hidden');
});
$("ul.dropdown li ul li:has(ul)").find("a:first").append(" &raquo; ");
});
</script>

</head>

<body>

<div id="header">

<div id="logo"></div>

<div id="social">
  <a href="#"><img src="images/facebook.png" width="40" height="40" alt="facebook" /></a>
  <a href="#"><img src="images/twitter.png" width="40" height="40" alt="twitter" /></a>
  <a href="#"><img src="images/linkedin.png"  width="40" height="40" alt="linkedin" /></a>
  <a href="#"><img src="images/rss.png"  width="40" height="40" alt="email" /></a>
</div>

</div>
<?php
include('menu.php');
?>
<div id="content"><!-- content -->
<style>
#content p
{
text-indent:25px;
text-align:justify;

}
#content li
{
margin:10px;

}
i
{
font-size:26px;

}
</style>

<form action="" method="post">
<i>Welcome administrator</i>;
<div style="margin-top:100px"></div>
<hr/>

<div align="center">
NEW REQUESTS
<hr/>
<table>
<?php
while($raw=mysql_fetch_array($result))
{
$id=$raw['id'];
$details = mysql_query("select * from profile where id='$id'");
$datas = mysql_fetch_array($details);
$name = $datas['name'];
$working = $datas['workingat'];
echo "<tr><td>Hello Sir,I am ".$name."working at".$working."please approve me</td><td>";
echo "<input type='submit' name='accept".$id."' value='accept'></td><td>
<input type='submit' name='decline".$id."' value='decline'></td><td></tr>";

		$nid=$raw['id'];

 $accept='accept'.$raw['id'];
$delete='decline'.$raw['id'];
if($_POST[$accept])
	{
	$query=mysql_query("UPDATE login SET status='1' where id='$nid'");
	
	header("Location:admin.php");
	}
	if($_POST[$delete])
	{
		$nquery=mysql_query("DELETE from login where id='$nid'");
		mysql_query("DELETE from profile where id='$nid'");
		header("Location:admin.php");
	}
}
 ?>
 </ta
 <hr>
 <div align="center"><b>ACTIVE USERS</b></div>
 <hr><div align="center">
 <table width="800px"><tr><th>name</th><th>working at </th><th></th></tr>
 <?php
 
 $n=mysql_query("select * from login where status='1'");
 while($r=mysql_fetch_array($n))
	{
	$t=$r['id'];
	$qy=mysql_query("select * from profile where id='$t'");
	$f=mysql_fetch_array($qy);
	
		echo '<tr><td align="center">'.$f["name"].'</td><td align="center">'.$f["workingat"].'</td><td><input type="submit" name="block'.$t.'" value="block"></td></tr>';
	$block='block'.$t;
	if($_POST[$block])
	{
	mysql_query("UPDATE login SET status='2' where id='$t'");
	header('location:admin.php');
	}
	}
 
 ?>
 </table>
 <hr>
 <div align="center">BLOCKED USERS</div>
 <hr>
 <table width="800px"><tr><th>name</th><th>working at </th><th></th></tr>
 <?php 
 $a=mysql_query("select * from login where status='2'");
 while($b=mysql_fetch_array($a))
 {
 $c=$b['id'];
 $d=mysql_query("select * from profile where id='$c'");
 $e=mysql_fetch_array($d);
 echo "<tr><td align='center'>".$e['name']."</td><td align='center'>".$e['workingat']."</td><td><input type='submit' name='unblock".$c."' value='unblock'></td></tr>";
 $unblock='unblock'.$c;
 if($_POST[$unblock])
	{
	mysql_query("UPDATE login SET status='1' where id='$c'");
	header('location:admin.php');
	}
 
 }
 
 ?>
 </table>
 </div>
 </form>
 </div>
</div><!-- end content -->
<?php
include('sidecontent.php');
?>
</body>
</html>
