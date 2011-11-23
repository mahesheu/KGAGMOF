<?php
$qs=mysql_query("select visits from general");
$f=mysql_fetch_array($qs);
$count=$f[0];
if(!isset($_COOKIE['visits']))
{
$count++;
$r=mysql_query("update general set visits='$count'");
setcookie("visits","set");
}
?>