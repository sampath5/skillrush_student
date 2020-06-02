<?php
session_start();
if(!isset($_SESSION['roll_no'])){
header('location:index.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="home.css">
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
<a class="navbar-brand" href="" style="margin-top:-15px;margin-bottom:-24px;margin-left:-16px;"><img src="skillrushn4.jpg" width="280" height="80" ></a>
 
  <div class="dropdown">
    <button class="dropbtn" style="color:white;margin-top:12px;font-size:20px;"><i class='fas fa-align-justify'></i>
    </button>
    <div class="dropdown-content" style="right:2px;">
      <a href="settings.php">Settings</a>
      <a href="editpassword.php">Change Password</a>
      <a href="logout.php">Logout</a>
    </div>
  </div> 
  
  <a href="javascript:void(0);" style="font-size:25px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
  <div class="container">

    <section class="materials">
      <h1><a href="aptitudeM.php" ><button class="btn readmore" ><Strong>MATERIALS</strong></button></a></h1>
	</section>
    <section class="practice">
      <h1><a href="aptitude.php"><button class="btn readmore"><Strong>PRACTISE</strong></button></a></h1>
    </section>

    <section class="challenge">
      <h1><a href="TestInstructions.php"><button class="btn readmore" href="TestInstructions.php"><Strong>CHALLENGES</strong></button></a></h1>
    </section>

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