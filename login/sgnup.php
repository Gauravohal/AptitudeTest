<!-- <!DOCTYPE HTML>
<html>
<head>
<title>User Signup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="quiz.css" rel="stylesheet" type="text/css">
</head>

<body> -->

<?php
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$pass=md5($_POST['pass']);
$email_id=$_POST['email_id'];
$mobile_no=$_POST['mobile_no'];
$abc=$pass;
if($first_name==""||$last_name==""||$pass==""||$email_id==""||$mobile_no="")
{
	echo "<script>alert('please fill all the details')</script>";
	echo "<script>location.replace(\"sgnup.html\")</script>";	
}
else
{
extract($_POST);
include("database.php");
$rs=mysqli_query($conn,"select * from registration where email_id='$email_id'");
if (mysqli_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1>Login Id Already Exists</div>";
	exit;
}
$query="insert into registration(first_name,last_name,pass,email_id,mobile_no) values('$first_name','$last_name','$abc','$email_id','$mobile_no')";
$rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");
echo "<br><br><br><div class=head1>Your Login ID  $email_id Created Sucessfully</div>";
echo "<br><div class=head1>Please Login using your Login ID to take Quiz</div>";
echo "<br><div class=head1><a href=login.html>Login</a></div>";
}
// header("Location:sgnup.html");

?>
<!-- </body>
</html> -->