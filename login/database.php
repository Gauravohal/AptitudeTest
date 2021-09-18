<?php
$hostname="localhost";
$username="root";
$passward="";
$database="aptitude";
$conn=mysqli_connect($hostname,$username,$passward,$database);
if(!$conn){
 die('Could not Connect My Sql:' .mysql_error());
}
?>