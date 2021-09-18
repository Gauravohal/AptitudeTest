<?php
$hostname="localhost";
$username="root";
$passward="";
$database="aptitude";
$conn=mysqli_connect($hostname,$username,$passward,$database);
if(!$conn){
 die('Could not Connect My Sql:' .mysqli_error());
}

$name=$_POST['name'];
$email=$_POST['email'];
$mobile_no=$_POST['mobile_no'];
$message=$_POST['message'];

$query="insert into contact_us(name,email,mobile_no,message) values('$name','$email','$mobile_no','$message')";
$rs=mysqli_query($conn,$query)or die("Could Not Perform the Query");
echo "<script>alert('Successful')</script>";
echo "<script>location.replace(\"index.html\")</script>";
?>