<?php
session_start();
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
 $news=$_POST['news'];
 $desc=$_POST['desc'];
 $title1=$_POST['title1'];
 $title2=$_POST['title2'];
 $link=$_POST['link'];
 $file2=$_FILES["file"]["name"];
 echo '<h1>asdasdads'.$file.'</h1>';
$ins=mysql_query("insert into news values('','$news','$desc','$link','$title1','$file2','$title2')");
//upload script
if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  echo "Type: " . $_FILES["file"]["type"] . "<br />";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }
  
   if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
      }
  //upload end




}
$a=$_SESSION['userId'];
if($a=='admin')
{
?>
<form action="" method="post"  enctype="multipart/form-data">
<table><tr><td>Add Heading</td><td colspan="2"><input type="text" name="news" size="80"></td></tr>
<tr><td>Description:</td><td colspan="2"><textarea name="desc" rows="10" cols="60" id="desc"></textarea></td></tr>
<tr><td>link:</td><td><input type="text" name="link" id="link"></td><td>Title for url<input type="text" name="title1"></td></tr>
<tr><td>upload:</td><td><input type="file" name="file" id="file"></td><td>Title for uploads<input type="text" name="title2"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="add" name="submit"></td></tr>
</table>
</form>
<?php
}
?>
<div align="center" style="margin-top:20px"><h2>NEWS</h2></div>
<hr/>
<div style="">
<table border="1" style="margin:10px;" width="600px" >
<?php
$query=mysql_query("select * from news ORDER BY id desc");
while($fetch=mysql_fetch_array($query))
{
$n=$fetch['desc'];
$nid=$fetch['id'];
$link=$fetch['url'];
$title1=$fetch['title1'];
$link2='upload/'.$fetch["uploads"];
echo '<tr ><td style="padding:10px"><div id="'.$nid.'" style="width:600px;font-weight:bold;font-size:16px;overflow-x:hidden;overflow-y=scroll;">'.$fetch["news"].'</div></td></tr><tr>
<td style="padding:10px"><div style="width:600px;line-spacing:10px;font-size:14px;overflow-x:hidden;overflow-y=scroll;">'.$n.'</div><br/><a href="'.$link2.'" target="_blank">'.$title2.'</a><br/><a href="'.$link.'" target="_blank">'.$title1.'</a><br/></td></tr><tr><td><form action="delete.php">';
if($a=='admin')
{
echo '<input type="hidden" name="nid" value="'.$nid.'">

<input type="submit" value="delete">';
}
echo '</form></td></tr>';
}
?>
</table>
</div>
</div><!-- end content -->
<?php
include('sidecontent.php');
?>
</body>
</html>
