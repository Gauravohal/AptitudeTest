<?php
include("database.php");
$username=$_POST['username'];
$passward=md5($_POST['pass']);
if($username=="" || $passward=="")
{
    echo "<script>alert('please enter username & passward')</script>";
	echo "<script>location.replace(\"login.html\")</script>";	
}
else
{
// if($conn)
// {
//     // echo "Connection Sucessful";
//     echo "<script>location.replace(\"cong.html\")</script>";
// }

$select1="SELECT * FROM registration
        WHERE email_id='$username'
        AND pass='$passward'";
$check1 = mysqli_fetch_array(mysqli_query($conn,$select1));

if($check1)
{
    // echo "User Available";
    echo "<script>location.replace(\"cong.html\")</script>";

}
else
{
    $select2="SELECT * FROM registration
        WHERE mobile_no='$username';
        AND pass='$passward'";
    $check2 = mysqli_fetch_array(mysqli_query($conn,$select2));
    if($check2)
    {
        // echo "User Available";
        echo "<script>location.replace(\"cong.html\")</script>";
    }
    else
    {
        echo "<script>alert('Invalid username & passward')</script>";
        echo "<script>location.replace(\"login.html\")</script>";	
    }
    
}
}
?>