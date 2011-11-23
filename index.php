<?php
 session_start();
 ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" 
      type="image/png" 
      href="images/rel.jpg">
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<link rel="stylesheet" href="jquery.jcarousel.css" type="text/css" media="all" />
<title> KGAGMOF </title>
<link href="css/global.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<link href='http://fonts.googleapis.com/css?family=IM+Fell+DW+Pica+SC' rel='stylesheet' type='text/css'>
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
<?php  ?>
</div>
<?php
include('menu.php');
?>
<script>
$(document).ready(function() {
	$(".paging").show();
$(".paging a:first").addClass("active");

//Get size of the image, how many images there are, then determin the size of the image reel.
var imageWidth = $(".window").width();
var imageSum = $(".image_reel img").size();
var imageReelWidth = imageWidth * imageSum;
//Adjust the image reel to its new size
$(".image_reel").css({'width' : imageReelWidth});
rotate = function(){
    var triggerID = $active.attr("rel") - 1; //Get number of times to slide
    var image_reelPosition = triggerID * imageWidth; //Determines the distance the image reel needs to slide

    $(".paging a").removeClass('active'); //Remove all active class
    $active.addClass('active'); //Add active class (the $active is declared in the rotateSwitch function)
    //Slider Animation
    $(".image_reel").animate({
        left: -image_reelPosition
    }, 1000 );

}; 
//Rotation  and Timing Event
rotateSwitch = function(){
    play = setInterval(function(){ //Set timer - this will repeat itself every 7 seconds
        $active = $('.paging a.active').next(); //Move to the next paging
        if ( $active.length === 0) { //If paging reaches the end...
            $active = $('.paging a:first'); //go back to first
        }
        rotate(); //Trigger the paging and slider function
    }, 5000); //Timer speed in milliseconds (7 seconds)
};

rotateSwitch(); //Run function on launch
//On Hover
$(".image_reel a").hover(function() {
    clearInterval(play); //Stop the rotation
}, function() {
    rotateSwitch(); //Resume rotation timer
});	

//On Click
$(".paging a").click(function() {
    $active = $(this); //Activate the clicked paging
    //Reset Timer
    clearInterval(play); //Stop the rotation
    rotate(); //Trigger rotation immediately
    rotateSwitch(); // Resume rotation timer
    return false; //Prevent browser jump to link anchor
});
	
	//Code goes here
});

</script>
<style>
.main_view {
	float: left;
	position: relative;
}
/*--Window/Masking Styles--*/
.window {
	height:230px;	width: 980px;
	overflow: hidden; /*--Hides anything outside of the set width/height--*/
	position: relative;
}
.image_reel {
	position: absolute;
	top: 0; left: 0;
}
.image_reel img {float: left;}

/*--Paging Styles--*/
.paging {
	visibility:hidden;
	position: absolute;
	bottom: 5px; right: 0px;
	width: 178px; height:47px;
	z-index: 100; /*--Assures the paging stays on the top layer--*/
	text-align: center;
	line-height: 40px;
	background :url(images/mm.png) repeat;
	display: none; /*--Hidden by default, will be later shown with jQuery--*/
	
}
.paging a {
	padding: 5px;
	text-decoration: none;
	color: #fff;
}
.paging a.active {
	font-weight: bold;
	background: transparent;
	border: 1px solid #FFF;
	-moz-border-radius: 3px;
	-khtml-border-radius: 3px;
	-webkit-border-radius: 3px;
}
.paging a:hover {font-weight: bold;}
</style>
<div class="main_view">
    <div class="window">
        <div class="image_reel">
            <a href="#"><img src="images/d1.jpg" alt=""  width="972"></a>
			<a href="#"><img src="images/sah.jpg" alt="" width="972"/></a>
            <a href="#"><img src="images/d2.jpg" alt="" width="972"/></a>
            <a href="#"><img src="images/d3.jpg" alt="" width="972"/></a>
            <a href="#"><img src="images/d4.jpg" alt="" width="972"/></a>
            <a href="#"><img src="images/d5.jpg" alt="" width="972"/></a>
            <a href="#"><img src="images/d6.jpg" alt="" width="972"/></a>
        </div>
    </div>
    <div class="paging">
        <a href="#" rel="1">1</a>
        <a href="#" rel="2">2</a>
        <a href="#" rel="3">3</a>
        <a href="#" rel="4">4</a>
        <a href="#" rel="5">5</a>
        <a href="#" rel="6">6</a>
		  <a href="#" rel="7">7</a>
    </div>
</div>
<div id="intro">
<div align="center">
<p><span><h2>Welcome to the official Website of KGAGMOF</h2></span>
<br/> </p>
</div>
</div>
<div id="box_left">
<img src="images/sdeimg.jpg"/>
</div>
<div id="box_right">
<h3>News Board</h3>
<style>
#page li
{
margin:5px;
}
</style>
<div id="page">
	<ul id="ticker_02" class="ticker">
	<?php
	include('connection.php');
		$query=mysql_query("select * from news");
		while($fetch=mysql_fetch_array($query))
			{
			$val=$fetch['id'];
			echo '<li onclick="redir('.$val.');">'.$fetch["news"].'</li>';
			
			}
	?>
	</ul>
	</span>
</div>
<script>
	function tick2(){
		$('#ticker_02 li:first').slideUp( function () { $(this).appendTo($('#ticker_02')).slideDown(); });
	}
	setInterval(function(){ tick2 () }, 3000);
function  redir(val)
{
document.location.href="news.php#"+val;
}
function validate_form()
{
var username=document.getElementById('username').value;
if(username=='')
{
document.getElementById('errorcode').innerHTML='Enter username';
return false;
}
var password=document.getElementById('password').value;
if(password=='')
{
document.getElementById('errorcode').innerHTML='Enter password';
return false;
}
}
</script>
<div align="center">   <style>#errorcode
{
color:red;
}</style>
   <a href="news.php"><div class="smallbox" align="center">view all</div></a>
	</div>
	<br/><br/>
	<h3>Members Login</h3>
	<form action="login.php" method="post" onSubmit="return validate_form();">
<table border="0" height="120px">
<tr><td colspan="2" align="center"><div id="errorcode">
<?php
if(isset($_GET['ecode']))
{
$ecode=(int)$_GET['ecode'];

if($ecode==0)
{
$error='Your account has not been activated';
}
if($ecode==1)
{
$error='Your account blocked';
}
if($ecode==2)
{
$error='Incorrect username/password';
}
}
echo $error;
?>
</div></td></tr>
<tr><td>Username</td><td><input type="text" name="username" id="username"></td></tr>
<tr><td>Password</td><td><input type="password" name="password" id="password"></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="submit" style="background-color:#666;color:white;height:45;width:70px;"></td></tr>
<tr><td colspan="2" align="center">Not a member?<a href="registration.php">register here</a></td></tr>
</table>
</form>
	</div>
</div>
<div id="box_middle">
<!--<h3>Projects</h3>-->
<p style="font-weight:bold;line-height:25px;">KGAGMOF is the most prominent and dominant grouping among Medical Officers in the department of Indian systems of Medicine.KGAGMOF emphasizes the need for people oriented ayurvedic practices and necessity of curbing unfriendly practices against Graduate Ayurveda Medical Officers</p>
<br/><p style="font-weight:bold;line-height:25px;">The KGAGMOF (Kerala Government Ayurveda Graduate Medical Officers Federation) was formed in 1981. KGAGMOF represents Government Graduate ayurveda medical Officers of Kerala State ISM Department. Out of the total about 1100 ayurveda medical Officers are eligible for membership, KGAGMOF has 750members as on date.  Federation had a long and golden way of rebellious history.</p>
</div>
<div id="footer">
    <div class="box1">
      <h2>Ayur Digest</h2>
      <img class="imgl" src="upload/imgl.jpg" alt="" />
      <p align="left" >A bimonthly organ of Kerala Government Ayurveda Graduate  Medical Officer&rsquo;s Federation.
  Ayu: Digest is the most widely circulating bimonthly  journal among  Government doctors and  private practitioners it is also subscribed by  Ayurvedic colleges as well as Private institutions </p>
<div align="right">   
  <a href="downloads.php"><div class="smallbox" align="center">Download</div></a>
	</div></div>
    <div class="box contactdetails">
	<h2>Contact us</h2>
            <ul>
       <li>KGAGMOF,
</li><li>STATE COMMITTEE OFFICE,
</li><li>HINDUSTAN PHARMACY,
</li><li>SREEPADA THEARTHAM,
</li><li>DHANYA REMYA  ROAD
</li><li>NEAR AYURVEDA COLLEGE.
</li><li>THIRUVANANTHAPURAM-1</li>
          <li>mail:-www.kgagmof1983@gmail.com</li>
		</ul>
	
    <DIV align="center" style="border-top:1px solid #8cb501;padding:10px;">
    <b>TOTAL VISITS</b>
    <div style="margin-top:20px;border:1px solid #8cb501;height:30px;width:100px;color:green;font-size:15px;letter-spacing:2px;">
<?php 
   include('counter_main.php');
   echo'<b>'.$count.'</b>';
   ?>
    </div>
    </DIV>
    <iframe src="http://www.google.com/talk/service/badge/Show?tk=z01q6amlq4kldoh9elj78t23rtj64freedb3bt68rgfrdchvi81n6auchq6mvpklr5jfgtguha36e5thk1if1dbid51u2ehhnda2d7tn5tg5qv3071vc71irqsp01usii04ug8tujif8f8clmj77qgdvfsnti3ciomohqtihj&amp;w=200&amp;h=60" frameborder="0" allowtransparency="true" width="300" height="60"></iframe>
    </div>
    <div class="projectbox">
      <h2>Office bearers</h2>
      <div class="wrap">
        <div class="fix"></div>
        <div class="project_badge_image" id="project_badge_image1"><a href="#"><img src="images/1.jpg" alt=""  title="A.Jayan,President"/></a></div>
        <div class="project_badge_image" id="project_badge_image2"><a href="#"><img src="images/2.jpg" alt="" title="V.P.Anil Kumar Vice President"/></a></div>
        <div class="project_badge_image" id="project_badge_image3"><a href="#"><img src="images/3.jpg" alt="" title="K.Biju ,Secratary"/></a></div>
        <div class="project_badge_image" id="project_badge_image4"><a href="#"><img src="images/4.jpg" alt="" title="N.P.Mathew,Joint secretary"/></a></div>
        <div class="project_badge_image" id="project_badge_image5"><a href="#"><img src="images/5.jpg" alt="" title="Sabeer Ali,Joint secretary"/></a></div>
        <div class="project_badge_image" id="project_badge_image6"><a href="#"><img src="images/6.jpg" alt="" title="Vaheeda Beegum,Joint secretary"/></a></div>
		<div align="right">   
   <a href="officebearers.php"><div class="smallbox" align="center">view all</div></a>
	</div>
        <div class="fix"></div>
      </div>
    </div>
    <br class="clear" />
  </div>  
 
<div id="credit">
<!--&copy; 2011 KGAGMOF | Powered by <a href="http://www.nintriva.com/">Nintriva Technologies</a>--> 
</div>
<?php
include('footer.php');
?>

</body>
</html>
