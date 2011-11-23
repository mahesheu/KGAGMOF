<?php
session_start();
$uid=$_SESSION['userId'];
include('connection.php');
$result=mysql_query("select * from profile where id='$uid'");
$raw=mysql_fetch_array($result);
$gen=$raw['gender'];
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
<script type='text/javascript'>
function validate_form()
{
var name=document.getElementById('name').value;
if(name=='')
{
document.getElementById('errorcode').innerHTML='Name field required';
return false;
}
var qualification=document.getElementById('qualification').value;
if(qualification=='')
{
document.getElementById('errorcode').innerHTML='Qualification field required';
return false;
}


var email=document.getElementById('email').value;
if(email=='')
{
document.getElementById('errorcode').innerHTML='email field required';
return false;
}
var phonemobile=document.getElementById('phonemobile').value;
if(phonemobile=='')
{
document.getElementById('errorcode').innerHTML='phone-mobile field required';
return false;
}
if(phonemobile.length<10)
{
document.getElementById('errorcode').innerHTML='incorrect mobile number';
return false;
}
}
</script>
<style>
#errorcode
{
color:red;
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
<div align="center"><div id="errorcode"></div><?php //?>
<form action="update_profile.php" method="post" onSubmit="return validate_form();" enctype="multipart/form-data">

<table height="600">
<tr><td>
<?php
if(file_exists('upload/'.$uid.'.jpg'))
{
echo '<img src="upload/'.$uid.'.jpg">';

}
 else 
 echo '<img src="upload/default.jpg">';
?>
</td><td><input type="file" name="file"></td></tr>

<tr><td>
Name*:</td><td><input type="text" name="name" value="<?php echo $raw['name'] ?>" id="name"></td>
</tr>
<tr><td>
Qualification*:</td><td><input type="text" name="qualification" value="<?php echo $raw['qualification'] ?>" id="qualification"></td>
</tr>
<tr>
<td>Working at:</td>
<td><input type="text" name="workingat" value="<?php echo $raw['workingat'] ?>"></td>
</tr>
<tr>
<tr>

<td>Gender:</td>
<td><select  name="gender">
<option value="M" <?php if($gen=='M') echo 'selected'; ?> >Male</option>
<option value="F" <?php if($gen=='F') echo 'selected'; ?> >Female </option>
</select></td>
</tr>
<tr>
<td>Address:</td>
<td><textarea name="address"><?php echo $raw['address'] ?></textarea></td>
</tr>
<tr>
<td>Email*:</td>
<td><input type="text" name="email" value="<?php echo $raw['email'] ?>" id="email"></td>
</tr>
<tr>
<td>Phone-Mobile*:</td>
<td><input type="text" name="phonemobile"  value="<?php echo $raw['phonemobile'] ?>" id="phonemobile"></td>
</tr>
<tr>
<td>Phone-Residence:</td>
<td><input type="text" name="phoneresidence"  value="<?php echo $raw['phoneresidence'] ?>" id="phoneresidence"></td>
</tr>
<tr>
<td colspan="2" align="center"><input type="submit" name="submit" value="Update" style="height:40px;width:100px"></td>
</tr>
</table>
</form>

  
  
  
</div>
</div><!-- end content -->
<?php
include('sidecontent.php');
?>
</body>
</html>
