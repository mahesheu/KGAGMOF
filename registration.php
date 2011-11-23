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
var username=document.getElementById('username').value;
if(username=='')
{
document.getElementById('errorcode').innerHTML='username field required';
return false;
}
var pass=document.getElementById('password').value;
if(pass=='')
{
document.getElementById('errorcode').innerHTML='password field field required';
return false;
}
var confirmpass=document.getElementById('confirmpassword').value;
if(confirmpass=='')
{
document.getElementById('errorcode').innerHTML='confirm password field field required';
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


if(pass!=confirmpass)
{
document.getElementById('errorcode').innerHTML='password and confirm password does not match';
return false;
}
if(phonemobile.length<10)
{
document.getElementById('errorcode').innerHTML='incorrect mobile number';
return false;
}
}
function noCopyMouse(e) 
{

var isRight = (e.button) ? (e.button == 2) : (e.which == 3);


        if(isRight) {
            //alert('You are prompted to type this twice for a reason!');
            return false;
        }
        return true;
    }

    function noCopyKey(e) {
        var forbiddenKeys = new Array('c','x','v');
        var keyCode = (e.keyCode) ? e.keyCode : e.which;
        var isCtrl;

        if(window.event)
            isCtrl = e.ctrlKey
        else
            isCtrl = (window.Event) ? ((e.modifiers & Event.CTRL_MASK) == Event.CTRL_MASK) : false;
    
        if(isCtrl) {
            for(i = 0; i < forbiddenKeys.length; i++) {
                if(forbiddenKeys[i] == String.fromCharCode(keyCode).toLowerCase()) {
                    //alert('You are prompted to type this twice for a reason!');
                    return false;
                }
            }
        }
        return true;
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

<<?php
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

<div id="main" align="Center" style="margin-top:90px">
<h1>Registration</h1>
<style>
td{
padding:10px;
}
</style>
<div id="errorcode"></div>
<form action="register_entry.php" method="post" onSubmit="return validate_form();">
<table><tr><td>
Name*:</td><td><input type="text" name="name" id="name"></td>
</tr>
<tr><td>
Qualification*:</td><td><input type="text" name="qualification" id="qualification"></td>
</tr>
<tr>
<td>Working at:</td>
<td><input type="text" name="workingat"></td>
</tr>
<tr>
<tr>
<td>Gender:</td>
<td><select  name="gender">
<option value="M">Male</option>
<option value="F">Female</option>
</select></td>
</tr>
<td>Username*:</td>
<td><input type="text" name="username" id="username"></td>
</tr>
<tr>
<td>Password*:</td>
<td><input type="password" name="password" id="password" onmousedown="return noCopyMouse(event);" onkeydown="return noCopyKey(event);"></td>
</tr>
<tr>
<td>Confirm Password*:</td>
<td><input type="password" name="confirmpassword" id='confirmpassword' onreturn ></td>
</tr>
<tr>
<td>Address:</td>
<td><textarea name="address"></textarea></td>
</tr>
<tr>
<td>Email*:</td>
<td><input type="text" name="email" id="email"></td>
</tr>
<tr>
<td>Phone-Mobile*:</td>
<td><input type="text" name="phonemobile" id="phonemobile"></td>
</tr>
<tr>
<td>Phone-Residence:</td>
<td><input type="text" name="phoneresidence" id="phoneresidence"></td>
</tr>
<tr>
<td colspan="2" align="right"><input type="submit" name="submit" value="register"></td>
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
