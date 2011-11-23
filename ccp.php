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
</style>
<?php
if(isset($_POST['submit']))
{

include('photoClass.php');
$p=new photoClass;
$id='imgl';
$p->photo(125,125,$id);
}
?>
<form action="" method="post" enctype="multipart/form-data">
<table style="margin-top:200px;margin-left:100px"><tr><td colspan="3" align="center"><h2>CHANGE AYUR DIGEST PHOTO HERE</h2></div></td></tr><tr><td>
choose photo:</td><td><input type="file" name="file"></td><td><input type="submit" value="change" name="submit"></td></tr>
</table>
</form>
</div><!-- end content -->

<?php
include('sidecontent.php');
?>



</body>
</html>
