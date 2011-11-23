<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- Corporate Plus Template by Templatesperfect.com -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" media="all" />
<link rel="stylesheet" href="jquery.jcarousel.css" type="text/css" media="all" />
<title>Corporate Plus Business Template</title>

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



<ul class="dropdown"><!-- menu -->

<li><a href="index.php">Home</a></li>

<li><a href="aboutus.php">About us</a>
			<ul class="sub_menu">
				<li><a href="aboutus.php#history">History</a></li>
				<li><a href="aboutus.php">Office Bearers</a></li>
				<li><a href="aboutus.html#achievements">Achievements</a></li>
				<li><a href="aboutus.php#aboutus">About us</a></li>
				<li><a href="aboutus.php#objectives">Objectives</a></li>
				<li><a href="aboutus.php#membership">Membership</a></li>
			</ul>

</li>

<!-- end submenu -->

<li><a href="news.php">News</a></li>
<li><a href="articles.php">Articles</a></li>
<li><a href="gallery.php">Gallery</a></li>
<li><a href="contactus.php">Contact Us</a></li>
<div align="right" style="color:#FFF;margin-top:10px;margin-right:10px"><?php date_default_timezone_set('Asia/Kolkata');
$today = date("F j, Y, g:i a");echo $today; ?></div>
</ul><!-- close menu -->

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

</div><!-- end content -->


<div id="sidebar"><!-- sidebar -->

<h3>Favourites</h3>

    <div class="navcontainer">
    <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">photo Gallery</a></li>
    <li><a href="#">Ayur Digest</a></li>
    <li><a href="#">Office bearers</a></li>
    <li><a href="#">Mail us</a></li>
    </ul>
    </div>

<h3>Navigations</h3>

    <div class="navcontainer">
    <ul>
    <li><a href="#">Our Blog</a></li>
    <li><a href="#">ISM  </a></li>
    <li><a href="#">Kerala Finance</a></li>
    <li><a href="#">A G Kerala</a></li>
    <li><a href="#">Kerala PSC</a></li>
    </ul>
    </div>
    
<h3>What leads us</h3>

<p>Proin interdum lobortis venenatis. Donec ac felis accumsan arcu ultricies consequat imperdiet non felis. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>

<h3>Inspirational Quotes</h3>

<p class="sidebar_box">&quot;A   physician is obligated to consider more than a diseased organ, more   even than the whole man - he must view the man in his world&quot;.  ~Harvey   Cushing<br />
</p>

</div><!-- end sidebar -->




</body>
</html>
