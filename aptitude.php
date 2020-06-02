<?php
session_start();
if(!isset($_SESSION['roll_no'])){
header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aptitude(Practise)</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"> </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="stylingforstudent.css">

  </head>
<body style="background-color:white;">

<div class="topnav" id="myTopnav" class="navbar" style="background-color:#410056;">
<a class="navbar-brand" href="shome.php" style="margin-top:-15px;margin-bottom:-24px;margin-left:-16px;"><img src="skillrushn5.jpg" width="60" height="50" ></a>
  <a href="">Aptitude</a>
  <a href="technical.php">Technical</a>
  <a href="verbal.php">Verbal</a>
    <a href="logical.php">Logical</a>
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
<p style="padding:20px 0px 0px 170px;"><b>TOPICS</b></p>
<div id='content'>
<table align="left" >
    <tr>
    <td><b>NUMBER SYSTEMS</b></td>
    <td><a href="TestInstructions.php"><button  class="button button2"><b>TAKE TEST</b></button></a></td>
  </tr>
   <tr>
    <td><b>TIME AND WORK</b></td>
    <td><a href="TestInstructions.php"><button  class="button button2"><b>TAKE TEST</b></button></a></td>
  </tr>
  
  
    <tr>
    <td><b>HCF AND LCM</b></td>
    <td><a href="TestInstructions.php"><button  class="button button2"><b>TAKE TEST</b></button></a></td>
  </tr>
  
 <tr>
    <td><b>LOGARITHMS</b></td>
    <td><a href="TestInstructions.php"><button  class="button button2"><b>TAKE TEST</b></button></a></td>
  </tr>
  <tr>
    <td><b>AVERAGES</b></td>
    <td><a href="TestInstructions.php"><button  class="button button2"><b>TAKE TEST</b></button></a></td>
  </tr>
  <tr>
    <td><b>CLOCKS</b></td>
    <td><a href="TestInstructions.php"><button  class="button button2"><b>TAKE TEST</b></button></a></td>
  </tr>
 
 <tr>
    <td><b>PERMUTATIONS</b></td>
    <td><a href="TestInstructions.php"><button  class="button button2"> <b>TAKE TEST</b></button></a></td>
  </tr>
  </div>
  <div>
 <tr>
    <td><b>PERCENTAGES</b></td>
    <td><a href="TestInstructions.php"><button  class="button button2" ><b>TAKE TEST</b></button></a></td>
  </tr>
 <tr>
    <td><b>BOATS AND STREAMS</b></td>
    <td><a href="TestInstructions.php"><button class="button button2" ><b>TAKE TEST</b></button></a></td>
  </tr>
</table>
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