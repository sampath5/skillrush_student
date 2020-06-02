<?php
session_start();
if(!isset($_SESSION['roll_no']))
    header('location:index.php');
    else{
        $con=mysqli_connect("localhost","root",'',"vjit");
        $rollno=$_SESSION['roll_no'];

        $query="SELECT * FROM students_list WHERE `RollNo`='$rollno' ";

if(mysqli_query($con, $query)){
	$data=mysqli_query($con, $query);
$row=mysqli_fetch_assoc($data);
$name=$row['Name'];
$mail=$row['Email'];

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
<div class="container" style="margin-top:30px;">
 <form  method="post" >

    <br><br><label for="username"><b style="color:#410056;">NAME</b><i type='button' onclick="myFunction1()"  class="fas fa-edit" style="margin-left:295px;cursor:pointer;"></i></label><br>
    <input type="text" id="username" value="<?php echo $name?>" name="username"  pattern="[A-Za-z .]*"  title="must contain only alphabets with a max length of 30 characters" size="30" maxlength="30" required readonly ><br><br>
    
    <label for="email"><b style="color:#410056;">EMAIL</b><i type='button' onclick="myFunction2()" class="fas fa-edit" style="margin-left:295px;cursor:pointer;"></i></label><br>
    <input type="text" id="email"   name="email" value="<?php echo $mail?>" size="30" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$" title="should be in the form of characters@characters.domain format with a max length of 30 characters" maxlength="30" required readonly><br><br>
 
    <script>

function myFunction1() {
	
  document.getElementById("username").readOnly = false;
  document.getElementById("username").focus() = true;
	
  
}
function myFunction2() {
  document.getElementById("email").readOnly = false;
  document.getElementById("email").focus() = true;
}
</script>
<button type="submit" class="registerbtn" name="btn"><b>SAVE CHANGES</b></button>
  
</form>
</div> 
<?php	
if(isset($_POST['btn'])){

$con=mysqli_connect("localhost","root",'',"vjit");  
$name1=$_POST['username'];
$email1=$_POST['email'];

$reg="update `students_list` set `Name`='$name1' , `Email`='$email1' where `students_list`.`RollNo`='$rollno'";
if(mysqli_query($con, $reg)){
    
   header('location:settings.php');
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