<html>

<head>
    <link rel="stylesheet" href="signupstyling.css">
	
</head>
<body>
<div style="background-color:#f6f4f1;">
            <a  href="#">
                  <img src="newvjitlogo.png" alt="VJIT" width="280px" height="65px" style="margin-left:0px;margin-top:16px;margin-bottom:10px;"></a>
              
</div>
          
<div class="container">
<div><img src="skillrushn3.jpg" width="360px" height="80px" style="margin-top:10px;margin-left:20px;"></img></div>

<p id="s1"></p>
 <form  method="post" >

    <br><br><label for="username"><b style="color:#410056;">NAME</b></label><br>
    <input type="text" id="username"  name="username"  pattern="[A-Za-z ]*"  title="must contain only alphabets with a max length of 30 characters" size="30" maxlength="30" required><br><br>
    
    <label for="email"><b style="color:#410056;">EMAIL</b></label><br>
    <input type="text" id="email"   name="email" size="30" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="should be in the form of characters@characters.domain format with a max length of 30 characters" maxlength="30" required><br><br>
 

<main>
    <div id="rollno">
    <label for="rollno"><b style="color:#410056;">ROLL NO</b></label><br>
    <input type="text" id="rollno"  name="rollno" pattern="[0-9]{5}[A-Z]{1}[0-9]{4}" title="must contain only one alphabet and 9 digits exactly of length 10 characters" size="10"  minlength="10" maxlength="10" required>
    </div>
    
    <div id="branch"><b style="color:#410056;">BRANCH</b><br>
    <select name="branch" required>
    <option selected disabled hidden style='display: none' value=''></option>
    <option value="CSE"><b>CSE</b></option>
    <option value="ECE"><b>ECE</b></option>
    <option value="CIVIL"><b>CIVIL</b></option>
    <option value="MECH"><b>MECH</b></option>
    <option value="IT"><b>IT</b></option>
    <option value="EEE"><b>EEE</b></option>
    </select>
    </div>
</main>
    <br><br><br><br><label for="pswd"><b style="color:#410056;">PASSWORD</b></label><br>
    <input type="password"   id="pswd" name="pswd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and one lowercase letter, and at least 8 or more characters" required><br><br>
    
    <label for="rpswd"><b style="color:#410056;">RE-ENTER PASSWORD</b></label><br>
    <input type="password" id="rpswd"  name="rpswd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and one lowercase letter, and at least 8 or more characters" required><br>
    <p id="demo"></p>
    <p id="demo1"></p>
	<p style="margin-left:10px;color:red;">
	<?php
	if(isset($_POST['btn'])){
		include_once 'dbconnect.php';
$name=$_POST['username'];
$email=$_POST['email'];
$rollno=$_POST['rollno'];
$branch=$_POST['branch'];
$pass=$_POST['pswd'];
$epass=md5($pass);
$s="select * from students_list where `RollNo`='$rollno'";
$sql="select * from students_list where Email='$email'";
$mailresult=mysqli_query($conn, $sql);
$num2=mysqli_num_rows($mailresult);
$result=mysqli_query($conn, $s);
$num=mysqli_num_rows($result);

if($num2==1||$num==1){
	
if($num2+$num==2)
echo"Registration Failed!! An account with this Mail and Roll No already exists!!";

else if($num==1)
echo"Registration Failed!! An account with this RollNo already exists!!";

else
echo"Registration Failed!! An account with this Email already exists!!";
}
else{
$reg="insert into students_list(Name,Email,`RollNo`,Branch,Password) values('$name','$email','$rollno','$branch','$epass')";
if(mysqli_query($conn, $reg))
	header('location:index.php');
}
	}

?></p>
<button type="submit" class="registerbtn" name="btn"><b >SIGN UP</b></button>
<p id="s2"><i>Already have an account? then<a href="index.php" style="text-decoration:none;color:#410056;"><b>SIGN IN</b></a></i></p>   
</form>
</div> 
<script>
rpswd.onkeyup = function giri() {
    var x1 = document.getElementById("pswd").value;
    var x2 = document.getElementById("rpswd").value;
    if((x1.length > 0)&&(x2.length >=1))
{
    if(x1==x2){
     document.getElementById("demo").innerHTML ="passwords matched";
      document.getElementById("demo1").innerHTML ="";
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
</body>
</html>
