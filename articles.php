<?php
session_start();
include('connection.php');

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
<script>
function delete_comment(commentid)
{

document.location.href="comment_delete.php?cid="+commentid;
}
function delete_post(postid)
{
document.location.href="post_delete.php?pid="+postid;
}
function redir(val)
{
var combox='ta'+val;
var com2=document.getElementById(combox).value;
document.location.href="comment_post.php?tid="+val+"&comment="+com2;

}
</script>
 <script>
        function runScript(e,x)
        {
		         // look for window.event in case event isn't passed in
                if (window.event) { e = window.event; }
                if (e.keyCode == 13)
                {
                       redir(x);
                }
        }
        </script>
		<style>
body
{
font-family:Arial;
}
.sbox{
background-color:blue;
color:white;
cursor:pointer;
}
.sbox:hover
{
color:red;
background-color:white;
border : 1px solid black;
}
#s1
{
width:80px;
}
#s2
{
width:80px;
}
</style>
</head>

<body>

<div id="header">

<div id="logo"></div>

<?php
//include('social.php');
?>

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
<body><form action="thread_post.php" method="post">
<div align="center">
<?php
if(isset($_SESSION['userId']))
{
echo '
<table border="0"><tr><td colspan="3">
Title:<textarea cols="50" rows="1" name="title"></textarea><br>
Desc<textarea cols="50" rows="5" name="desc"></textarea>
</td></tr>
<tr><td></td><td><input type="submit" name="submit" value="post"></td>
</table>';
}
?>
</form>
</div>
<hr>
<div align="center" style="">
<table width="800px" border="0">
<?php 
$query=mysql_query("select * from threads order by tid DESC");
while($fetch=mysql_fetch_array($query))
{
$postedby=$fetch['creator'];
$rx=$fetch['tid'];

 $u=mysql_query("select * from profile where id='$postedby'");
 $v=mysql_fetch_array($u);
 
echo '<tr><td width="100px" >';
if(file_exists('upload/'.$postedby.'.jpg'))
{
echo '<img src="upload/'.$postedby.'.jpg">';

}
 else 
 echo '<img src="upload/default.jpg">';
echo '<br>'.$v["name"].'</td><td colspan="2"><h3>'.$fetch["title"].'</h3><br/>'.$fetch["description"];
if($postedby==$_SESSION['userId']||$_SESSION['userId']=='admin')
{
echo '<input type="button" value="Delete" id="'.$rx.'" onclick="delete_post(this.id);">';
}
echo '</td></tr>';
$Tr=mysql_query("select * from comments where tid='$rx'");

	while($fe=mysql_fetch_array($Tr))
	{
	$cid=$fe['id'];
	$uid=$fe['creator'];
   $t=mysql_query("select * from profile where id='$uid'");
	$r=mysql_fetch_array($t);
	
	$name=$r['name'];
echo '<tr><td></td><td width="100px">';

	if(file_exists('upload/'.$uid.'.jpg'))
{
echo '<img src="upload/'.$uid.'.jpg">';

}
 else 
 echo '<img src="upload/default.jpg"><br/>';
 echo '</td><td><div id="x" style="position:absolute;width:400px;"><b>'.$name.'</b>:'.$fe["comment"].'<br>';

  if($postedby==$_SESSION['userId'] || $uid==$_SESSION['userId']||$_SESSION['userId']=='admin')
	{
echo '<div style="position:inherit;top:0px;right:0px;cursor:pointer;" onclick="delete_comment('.$cid.')"><img src="close_button.gif"/></div>';
	//	echo '<input type="button" value="Delete" id="'.$cid.'" onclick="delete_comment(this.id);">';
	}
	echo '</td></tr>';	



   

	}
echo '<tr><td></td><tD></td><td>';
if(isset($_SESSION['userId']))
{
echo'
<textarea cols="50" name="ta'.$rx.'" id="ta'.$rx.'" onkeypress="runScript(event,'.$rx.')"></textarea>
<br/><input type="button" value="comment" id="'.$rx.'" onclick="redir(this.id);">';
}
echo '</td></tr>';
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
