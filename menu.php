<ul class="dropdown"><!-- menu -->
<li><a href="index.php">Home</a></li>
<li><a href="aboutus.php">About us</a>
			<ul class="sub_menu">
				<li><a href="aboutus.php#history">Background</a></li>
				<li><a href="officebearers.php">Office Bearers</a></li>
				<li><a href="aboutus.php#achievements">Achievements</a></li>
				<li><a href="aboutus.php#aboutus">About us</a></li>
				<li><a href="aboutus.php#objectives">Objectives</a></li>
				<li><a href="aboutus.php#membership">Membership</a></li>
			</ul>
</li>
<!-- end submenu -->
<li><a href="news.php">News</a></li>
<li><a href="articles.php">Articles</a></li>
<li><a href="gallary.php">Gallery</a></li>
<li><a href="contactus.php">Contact Us</a></li>
<?php
if(isset($_SESSION['userId']))
{
$x=$_SESSION['userId'];
echo '<li><a href="">Account</a>
				<ul class="sub_menu">';
					if($x==='admin'){
					echo '<li><a href="admin.php">Admin page</a></li>';
					echo '<li><a href="ccp.php">Change cover page</a></li>';
					}
					echo '<li><a href="editprofile.php">Edit Profile</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>
		</li>';
}
?>
<div align="right" style="color:#FFF;margin-top:10px;margin-right:10px"><?php date_default_timezone_set('Asia/Kolkata');
$today = date("F j, Y, g:i a");echo $today; ?></div>
</ul><!-- close menu -->