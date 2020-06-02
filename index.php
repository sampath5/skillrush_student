<?php
session_start();
if(isset($_SESSION['roll_no']))
  header('location:shome.php');
include_once 'dbconnect.php';
  //$conn=mysqli_connect("localhost","root",'',"vjit");
?>
<html>
<head>
  
 <link rel="stylesheet" href="signinstyling.css">
 
</head>
<body >
<div style="background-color:#f6f4f1;border-bottom:2px solid white;">
            <a  href="#">
                  <img src="newvjitlogo.png" alt="VJIT" width="280px" height="65px" style="margin-left:0px;margin-top:16px;margin-bottom:10px;"></a>
              <a href="about.html" style="float:right;margin-top:14px;"><button type="submit" name="submit"  class="button1"><b>ABOUT</b></button></a>
</div>
<div class="container" >
<div><img src="skillrushn3.jpg" width="360px" height="80px" style="margin-top:0px;margin-left:20px;"></img></div>
<p id="s1"></p>
 <form action="" method="post">

    <br><br><label for="rollno"><b style="color:#410056;">ROLL NO</b></label><br>
    <input type="text" id="rollno"  name="rollno"  required>
    
    <br><br><label for="pswd"><b style="color:#410056;">PASSWORD</b></label><br>
    <input type="password"   id="pswd" name="pswd" required><br>
   <p> <a id="s3" style="color:#410056"; href="forgotpassword.php"><b>Forgot password?</b></p>
   <?php
if(isset($_POST['submit']))
{
$rollno=$_POST['rollno'];
$password=$_POST['pswd'];
$query="SELECT * FROM students_list WHERE `ROLLNO`='$rollno' ";

if(mysqli_query($conn, $query)){
	$data=mysqli_query($conn, $query);
$n=mysqli_num_rows($data);
$row=mysqli_fetch_assoc($data);

if($n==1 && md5($password)==$row['Password']){
$_SESSION['roll_no']=$rollno;
header('location:shome.php');
}
else
echo " <p style='color:red;margin-left:18px;'> Login Failed!!</p>";}
else
echo "<p style='color:red;margin-left:18px;'>Login Failed!!</p>";
}
?>
</a><br><br>

<button type="submit" name="submit"  class="button1" style="margin-left:120px;"><b>SIGN IN</b></button>
<p id="s2"><i>Don't have an account, then  <a style="text-decoration:none;color:#410056;"  href="register1.php"><b>SIGN UP</b></a></i></p>   
</form>
</div> 

</body>
</html>