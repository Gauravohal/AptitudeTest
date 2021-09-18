<?php
// session_start();
include("database.php");
if(isset($_POST['submit']))
{
    $user_id = $_POST['user_id'];
    $result = mysqli_query($conn,"SELECT * FROM registration where email_id='" . $_POST['email_id'] . "'");
    $row = mysqli_fetch_assoc($result);
	$fetch_user_id=$row['email_id'];
	$email_id=$row['email_id'];
	$password=$row['password'];
    if($user_id==$fetch_user_id) 
    {
				$to = $email_id;
                $subject = "Password";
                $txt = "Your password is : $password.";
                $headers = "From: password@studentstutorial.com" . "\r\n" .
                "CC: somebodyelse@example.com";
                mail($to,$subject,$txt,$headers);
			}
				else{
					echo 'invalid userid';
				}
}
?>