<?php
session_start();
if(!isset($_SESSION['roll_no']))
    header('location:index.php');

    include_once 'dbconnect.php';
        //$conn=mysqli_connect("localhost","root",'',"vjit");
$rollno=$_SESSION['roll_no'];
$query="SELECT * FROM students_list WHERE `RollNo`='$rollno' ";

if(mysqli_query($conn, $query)){
	$data=mysqli_query($conn, $query);
$row=mysqli_fetch_assoc($data);
 }
?>

<html>
<head>
<link rel="stylesheet" href="stylingforsettings.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"> </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="stylingforstudent.css">
</head>
<body>
<div class="topnav" id="myTopnav" class="navbar" style="background-color:#410056;">
<a class="navbar-brand" href="shome.php" style="margin-top:-15px;margin-bottom:-24px;margin-left:-16px;"><img src="skillrushn5.jpg" width="60" height="50" ></a>
  <a href="aptitude.php">Aptitude</a>
  <a href="technical.php">Technical</a>
  <a href="verbal.php">Verbal</a>
    <a href="">Logical</a>
  <div class="dropdown">
    <button class="dropbtn" style="color:white;"><i class='fas fa-align-justify'></i>
    </button>
    <div class="dropdown-content" style="right:2px;">
      <a href="settings.php">Settings</a>
      <a href="editpassword.php">Change Password</a>
      <a href="logout.php">Logout</a>
    </div>
  </div> 
  
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>  

<div class="container" style="margin-top:30px;">

 <form  method="post" ><br><br>
 <label for="pswd"><b style="color:#410056;">NEW PASSWORD</b></label><br>
 <input type="password"   id="pswd" name="pswd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and one lowercase letter, and at least 8 or more characters" required><br><br>
 <label for="rpswd"><b style="color:#410056;">RE-ENTER NEW PASSWORD</b></label><br>
 <input type="password" id="rpswd"  name="rpswd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and one lowercase letter, and at least 8 or more characters" required><br>
 <p id="demo"></p>
 <p id="demo1"></p>
 <p style="margin-left:10px;color:red;">
 </p>
 
<?php
if(isset($_POST['btn'])){
    
    $rollno=$_SESSION['roll_no'];
$pass1=md5($_POST['pswd']);
$pass2=md5($_POST['rpswd']);
if($pass1==$pass2)
{

$reg="update `students_list` set `Password`='$pass1' where `students_list`.`RollNo`='$rollno'";
if(mysqli_query($conn, $reg)){
    
   header('location:shome.php');
   
   

   
    
     
    
    
}
}
else
echo "passwords mismatched";


}
?>


<script>
    
rpswd.onkeyup = function giri() {
    var x1 = document.getElementById("pswd").value;
    var x2 = document.getElementById("rpswd").value;
    if((x1.length > 0)&&(x2.length >=1))
{
    if(x1==x2){
     document.getElementById("demo").innerHTML ="passwords matched";
      document.getElementById("demo1").innerHTML ="";
      document.getElementById("btn").disabled=false;
}
     else{
       document.getElementById("demo1").innerHTML ="passwords mis-matched";
       document.getElementById("demo").innerHTML =""; 
}
}
else
{
document.getElementById("demo").innerHTML ="";
document.getElementById("demo1").innerHTML ="";
}
}
pswd.onkeyup = function giri() {
    document.getElementById("demo1").innerHTML ="";
    var x1 = document.getElementById("pswd").value;
    var x2 = document.getElementById("rpswd").value;
    if((x2.length > 0)&&(x1.length >=1))
{
    if(x1==x2){
     document.getElementById("demo").innerHTML ="passwords matched";
     document.getElementById("demo1").innerHTML ="";
     document.getElementById("btn").disabled=false;
}
     else{
       document.getElementById("demo1").innerHTML ="passwords mis-matched";
       document.getElementById("demo").innerHTML ="";

}
}

else
{
document.getElementById("demo").innerHTML ="";
document.getElementById("demo1").innerHTML ="";
}
}
</script>
<button type="submit" class="registerbtn" id="btn" name="btn" disabled><b>SUBMIT</b></button>
</form>
</div> 
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

</script>
</body>
</html>