<?php
include('connection.php');
$name=$_POST['name'];
$qualification=$_POST['qualification'];
$workingat=$_POST['workingat'];
$gender=$_POST['gender'];
$username=$_POST['username'];
$password=$_POST['password'];
$confirmpassword=$_POST['confirmpassword'];
$address=$_POST['address'];
$email=$_POST['email'];
$phonemobile=$_POST['phonemobile'];
$phoneresidence=$_POST['phoneresidence'];
$result=mysql_query("select * from login where username='$username'");
$raws=mysql_num_rows($result);
if($raws==0)
{
mysql_query("insert into login(username,password,previlage,status) values ('$username','$password','u','0')");
$id=mysql_insert_id();
mysql_query("insert into profile(id,name,qualification,workingat,gender,address,email,phonemobile,phoneresidence) values ('$id','$name','$qualification','$workingat','$gender','$address','$email','$phonemobile','$phoneresidence')");
echo '<script type="text/javascript">
alert("Thank you for registering;\n Adminstrator has to approve before you can use use your account");';
echo 'document.location.href="index.php";
</script>';
}
else
{
?>
<script type="text/javascript">
alert("username already exist");
document.location.href="registration.php";
</script>
<?php
}
?>