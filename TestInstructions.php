
<?php
session_start();


?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"> </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- <script src='https://kit.fontawesome.com/a076d05399.js'></script> -->
  
  <link rel="stylesheet" href="stylingforstudent.css">
</head>
<style>
  
#instructions{
position:absolute;
top:30%;
left:20%;
width:60%;
height:60%;
border-radius:10px;

}
.success {
	border-color: skyblue;
	color: matte;
	}
</style>
<body>
<body style="background-color:#f6f4f1;">
<div class="topnav" id="myTopnav" class="navbar" style="background-color:#410056;">
<a class="navbar-brand" href="shome.php" style="margin-top:-15px;margin-bottom:-22px;margin-left:-16px;"><img src="skillrushn4.jpg" width="280" height="80" ></a>
 
 
  
  <a href="javascript:void(0);" style="font-size:25px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
<div class="container-fluid">
<div class='instructions'>

<?php
if(isset($_POST['take_exam']))
{
  include_once 'dbconnect.php';
    
    $exam=$_POST['take_exam'];
    $user=$_SESSION['roll_no'];
    $checkquery="select rollno from examsessions where rollno='$user' and exam_name='$exam'";
    $res=mysqli_query($conn,$checkquery);
    $row=mysqli_fetch_assoc($res);
    if(mysqli_num_rows($res) && $row['rollno']==$user)
    {

        echo"<center style='margin-top:45px;margin-bottom:10px;'><b >Looks like you have already taken this exam.</b></center>";
        echo"<center><a href='challenges.php' ><button class='button2' style='font-size:20px;padding:10px 20px;margin-left:0px;cursor:pointer;'><b>Go back</b></button></center>";
    }
    else{
    $query="select exam_duration from list_of_exams where exam_name='$exam'";
    $res=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($res);

    $time=$row['exam_duration'];
    echo"<center><h2>Instructions</h2></center>";
    echo"<ul style='margin-left:5px;'>";
    echo "<li>ready to start ".$_POST['take_exam']." exam\n</li>" ;
    echo"<li>This exam is of $time minutes</li>";
    echo"<li>Take this exam in full screen only</li>";
    echo"<li>Tab monitoring is acive.If found guilty your exam will be invalid</li>";
    echo"</ul>";
    echo"<form action='first.php?exam=$exam' method='POST'>";
    echo"<center ><button  style='padding:10px;cursor:pointer;margin-left:0px;' class='button2' name='start' value='$time'><b>START EXAM</b></button></center>";
    echo"</form>";
    }
}
else{
    header('location:challenges.php');
}
?>

</div>
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