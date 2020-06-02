<?php
session_start();
if(!isset($_SESSION['roll_no']))
    header('location:index.php');
    else{
      include_once 'dbconnect.php';
        //$conn=mysqli_connect("localhost","root",'',"vjit");
        $rollno=$_SESSION['roll_no'];

        $query="SELECT * FROM students_list WHERE `RollNo`='$rollno' ";

if(mysqli_query($conn, $query)){
	$data=mysqli_query($conn, $query);
$row=mysqli_fetch_assoc($data);
$pass=$row['Password'];
 }
}

?>
<html>
<head>
    <link rel="stylesheet" href="stylingforsettings.css">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
<div class="container" id="container1" style="width:320px;margin-top:30px;">
 <form  method="post" >
 <br><br><label for="pswd"><b style="color:#410056;"> CURRENT PASSWORD</b></label><br>
    <input type="password"   id="pswd" name="pswd"  required><br><br>
    <button type="submit" class="registerbtn" name="btn" style="margin-left:50px;" ><b>SUBMIT</b></button>
</form>
</div> 
<?php	
if(isset($_POST['btn'])){
  include_once 'dbconnect.php';
//$conn=mysqli_connect("localhost","root",'',"vjit");  
$pass1=md5($_POST['pswd']);
if($pass==$pass1){
    $_SESSION['color']="red";
  header('location:editpassword2.php');
   }
}
?>
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