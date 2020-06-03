<?php
session_start();
if(isset($_SESSION['user_name']))
	header('location:Home.php');
	include_once 'dbconnect.php';
?>
<html>
<head>

 <link rel="stylesheet" href="signinstyling.css">
 <script src="myjavascript.js"></script>
</head>
<body>
<div style="background-color:#f6f4f1;">
            <a  href="#">
                  <img src="newvjitlogo.png" alt="VJIT" width="280px" height="65px" style="margin-left:0px;margin-top:16px;margin-bottom:10px;"></a>
            
</div>
<div class="container" style="margin-top: 14px;">
<div><img src="skillrushn3.jpg" width="360px" height="80px" style="margin-top:0px;margin-left:20px;"></img></div>
<p id="s1"></p>
 <form action="" method="post">

    <br><br><label  style="color:#410056;"for="username"><b>USER NAME</b></label><br>
    <input type="text" id="username"  name="username"  required>
    
    <br><br><label for="pswd" style="color:#410056;"><b>PASSWORD</b></label><br>
    <input type="password"   id="pswd" name="pswd" required><a style="margin-left:15px;cursor:pointer;" onclick="myfunction()" ><img id="demo5" style="height:30px;width:30px;color:#410056;" src="eye slash.png"></a><br>
   <p> <a id="s3" style="color:#410056;" href=""><b>forgot password?</b>
  
</a><br><br>
<?php
if(isset($_POST['submit']))
{
$username=$_POST['username'];
$password=$_POST['pswd'];
$query="SELECT * FROM admins_list WHERE `username`='$username' ";

if(mysqli_query($conn, $query)){
	$data=mysqli_query($conn, $query);
$n=mysqli_num_rows($data);
$row=mysqli_fetch_assoc($data);

if($n==1 && $password==$row['password']){
$_SESSION['user_name']=$username;
header('location:Home.php');
}
else
echo " <p style='color:red;margin-left:18px;'> Login Failed!!</p>";}
else
echo "<p style='color:red;margin-left:18px;'>Login Failed!!</p>";
}
?>

<button type="submit" name="submit"  class="button1" style="margin-left:120px;padding:9px;"><b>SIGN IN</b></button>
</form>
</div> 
<script>
function myfunction() {

  
  var x = document.getElementById("pswd");
  if (x.type === "password") {
    x.type = "text";
    
    document.getElementById("demo5").src = "eye icon.png";
    
  } else {
    x.type = "password";
  
    document.getElementById("demo5").src = "eye slash.png";
  
  
  }
}
</script>
</body>
</html>