<?php
session_start();
if(isset($_SESSION['userId']))
{
$a=$_SESSION['userId'];
}
else
{
$a='0';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" 
      type="image/png" 
      href="images/rel.jpg">
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
</style>
<?php
include('connection.php');
if(isset($_POST['submit']))
{
$link1=$_POST['link'];
$title1=$_POST['title'];
$ins=mysql_query("insert into galary values('','$link1','$title1')");
}
if($a=="admin")
{ 
echo '<form action="" method="post">
<table height="100px"><tr><td>Add link</td><td><input type="text" name="link"></td></tr>
<tr><td>Title to display</td><td><input type="text" name="title" size="40"></td></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="add" name="submit"></td></tr>
</table>
</form>';
}
?>

<table width="50%">
<?php
$query=mysql_query("select * from galary ORDER BY id desc");
while($fetch=mysql_fetch_array($query))
{
$did=$fetch['id'];
$link=$fetch['link'];
echo '<tr style="padding:10px;"><td  style="padding:20px;">'.$fetch["title"].'</td><td><a href="'.$link.'" target="_blank">View</a></td><td><form action="delgal.php"><input type="hidden" name="did" value="'.$did.'"><input type="submit" value="delete" name="delete"></form></td></tr>';

}

?>
</table>
</div><!-- end content -->
<?php
include('sidecontent.php');
?>
</body>
</html>
