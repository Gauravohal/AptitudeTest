<!DOCTYPE>
<html>
<?php require 'database.php';
session_start(); ?>
<head>
<title>Quiz</title>
<style>
body {
    background: url("bg.jpg");
	background-size:100%;
	background-repeat: no-repeat;
	position: relative;
	background-attachment: fixed;
}
/* button */
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 500px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
.title{
	background-color: #ccc11e;
	font-size: 28px;
  padding: 20px;
	
}
.button3 {
    border: none;
    color: white;
    padding: 10px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}
.button3 {
    background-color: white; 
    color: black; 
    border: 2px solid #f4e542;
}

.button3:hover {
    background-color: #f4e542;
    color: Black;
}
body {
  -webkit-user-select: none;
     -moz-user-select: -moz-none;
      -ms-user-select: none;
          user-select: none;
}
.table1{
  font-size: 25px;
  padding: 10px;
}
.table2{
  /* border: 1px solid black; */
  font-size: 25px;
  padding: 10px;
}
</style>
</head>
<body><center>
<div class="title">Logical Quiz</div>
<?php 															
																if (isset($_POST['click']) || isset($_GET['start'])) {
																@$_SESSION['clicks'] += 1 ;
                                 $c = $_SESSION['clicks'];
                                //  $c=40;
																if(isset($_POST['userans'])) { $userselected = $_POST['userans'];
																
																$fetchqry2 = "UPDATE `quiz` SET `userans`='$userselected' WHERE `id`=$c-1"; 
																$result2 = mysqli_query($conn,$fetchqry2);
																}
		  
																	
 																} else {
																	$_SESSION['clicks'] = 56;
																}
																
																//echo($_SESSION['clicks']);
																?>
<div class="bump"><br><form><?php if($_SESSION['clicks']==56){ ?> <button class="button" name="start" float="left"><span>START QUIZ</span></button>
  <h2><u>Details About the Quiz</u></h2>
<table>
  <tr><td><b><li>Quiz Contains 10 quetions each having 2 marks for corrected answer.</li></b><br></td></tr>
  <tr><td><b><li>There is No Negative Marking.</li></b><br></td></tr>
  <tr><td><b><li>You have to attempt all the questions.</li></b><br></td></tr>
  <tr><td><b><li>You can't skip any questions.</li></b><br></td></tr>
  <tr><td><b><li>While giving the test do not refresh the page.</li></b><br></td></tr>
  <tr><td><b><li>You can't jump from One question to Another Question until you answer to current question.</li></b><br></td></tr>
  <tr><td><b><li>Once you submitted answer for specific question you can't go back to change it.</li></b><br></td></tr>
  <tr><td><b><li>At the end of Test clicking on Submit Button you can submit the test.</li></b><br></td></tr>
  <tr><td><b><li>Score will be displayed immediately after the submitting the test.</li></b><br></td></tr>
</table>
<?php } ?>
</form></div>

<form action="" method="post">  				
<table class="table1"><?php if(isset($c)) {   $fetchqry = "SELECT * FROM `quiz` where id='$c' and subid=3"; 
				$result=mysqli_query($conn,$fetchqry);
				$num=mysqli_num_rows($result);
				$row = mysqli_fetch_array($result,MYSQLI_ASSOC); }
		  ?>
<?php if($_SESSION['clicks'] >56 && $_SESSION['clicks'] < 67){
  $button_name;
  if($_SESSION['clicks']<66)
  {
   $button_name = "Next";
  }
  else
  {
    $button_name = "Submit";
  }
  ?>
  <tr><td><h3><br><?php echo @$row['que'];?></h3></td></tr> 
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option 1'];?>">&nbsp;<?php echo $row['option 1']; ?><br>
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option 2'];?>">&nbsp;<?php echo $row['option 2'];?></td></tr>
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option 3'];?>">&nbsp;<?php echo $row['option 3']; ?></td></tr>
  <tr><td><input required type="radio" name="userans" value="<?php echo $row['option 4'];?>">&nbsp;<?php echo $row['option 4']; ?><br><br><br></td></tr>
  <tr><td><center><button class="button3" name="click" ><?php echo $button_name; ?></button></td></tr> <?php }  
																	?> 
  <form>
 <?php if($_SESSION['clicks']>66){ 
	$qry3 = "SELECT `ans`, `userans` FROM `quiz`;";
	$result3 = mysqli_query($conn,$qry3);
	$storeArray = Array();
	while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
     if($row3['ans']==$row3['userans']){
		 @$_SESSION['score'] += 1 ;
	 }
}
 
 ?> 
 
 
 <h1>Result</h1>
 <table class="table2" border="10px">
  <tr><td>No. of Questions:</td><td>10</td></tr><br>
  <tr><td>Attempted Questions:</td><td>10</td></tr>
  <tr><td>No. of Correct Answer:</td><td><?php echo $no = @$_SESSION['score']; 
 session_unset(); ?></td></tr>
 <tr><b><td>Your Score:</td><td><?php echo $no*2; ?></td></b></tr>
 </table>
 <br><br>
 <a href="http://localhost/aptitude%20Test%20Portal/index.html"><input type="button" class="button3" value="logout"></a><br>
<?php } ?>


 <!-- <script type="text/javascript">
    function radioValidation(){
		/* var useransj = document.getElementById('rd').value;
        //document.cookie = "username = " + userans;
		alert(useransj); */
		var uans = document.getElementsByName('userans');
		var tok;
		for(var i = 0; i < uans.length; i++){
			if(uans[i].checked){
				tok = uans[i].value;
				alert(tok);
			}
		}
    }
</script> -->
</center>
</body>
</html>