<?php
session_start();
if(isset($_POST['submit']))
	{
	
				$cap = 'notEq';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['captcha'] == $_SESSION['cap_code']) {
     $query=$_POST['query'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$name=$_POST['name'];
	$email1='kgagmoftsr@gmail.com';
	$email2='kgagmof1983@gmail.com';
	//mail function here//
	$nquery=$query.'\n from:'.$name.'\n phone:'.$phone.'\n email:'.$email;
	
$headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($email1, 'message from website', $nquery, $headers);
mail($email2, 'message from website', $nquery, $headers);
        $cap = 'Eq';
    } else {
        echo'<script>alert("captcha verification incorrect ")</script>';
        $cap = '';
    }
}
	
	
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


  $(document).ready(function(){
                $('#submit').click(function(){
                    var name = $('#name').val();
                    var msg = $('#msg').val();
                    var captcha = $('#captcha').val();
                    
                    if( name.length == 0){
                        $('#name').addClass('error');
                    }
                    else{
                        $('#name').removeClass('error');
                    }

                    if( msg.length == 0){
                        $('#msg').addClass('error');
                    }
                    else{
                        $('#msg').removeClass('error');
                    }

                    if( captcha.length == 0){
                        $('#captcha').addClass('error');
                    }
                    else{
                        $('#captcha').removeClass('error');
                    }
                    
                    if(name.length != 0 && msg.length != 0 && captcha.length != 0){
                        return true;
                    }
                    return false;
                });

                var capch = '<?php echo $cap; ?>';
                if(capch != 'notEq'){
                    if(capch == 'Eq'){
                        $('.cap_status').html("Your form is successfully Submitted ").fadeIn('slow').delay(3000).fadeOut('slow');
                    }else{
                        $('.cap_status').html("Human verification Wrong!").addClass('cap_status_error').fadeIn('slow');
                    }
                }
                
                

            });
</script>

</head>

<body>

<div id="header">

<div id="logo"></div>

<?php
include('social.php');
?>
</div>
<?php 
include('menu.php');
?>


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
<div align="center" style="margin-top:100px">
<form action="" method="post">
<table height="300px">
<tr><td> your e-mail id </td><td><input type="text" name="email" size="42"></td></tr>
<tr><td>name:</td><td><input type="text" name="name" size="42" ></td></tr>
<tr><td>phone number:</td><td><input type="text" name="phone" size="42" ></td></tr>

<tr><td width="60px">human verification</td><td>      
                            <input type="text" name="captcha" id="captcha" maxlength="6" size="6"/>
                        <img src="captcha.php" height="30px" width="100px"/></td></tr>
<tr><td>your query</td><td><textarea name="query" rows="10" cols="32"></textarea></td></tr>
<tr><td colspan="2" align="center"><input type="submit" name="submit" value="mail"></td></tr></table>
</form>
<hr/>
<div style="color:black">
KGAGMOF,
STATE COMMITTEE OFFICE,
HINDUSTAN PHARMACY,
SREEPADA THEARTHAM,
DHANYA REMYA ROAD
NEAR AYURVEDA COLLEGE.
THIRUVANANTHAPURAM-1<br/>
mail:-www.kgagmof1983@gmail.com<br/>
visit our blog:-kgagmof.blogspot.com
</div>
</div>

</body>
</html>
