<html>
<head>
 <link rel="stylesheet" href="signinstyling.css">
 <script src="myjavascript.js"></script>
</head>
<body>
<div class="container">
<div><img src="newvjitlogo.png" width="280px" height="65px" style="margin-top:20px;margin-left:40px;"></img></div>
<p id="s1"></p>
<?php

include_once 'dbconnect.php';
//$conn=mysqli_connect('localhost','root','','vjit');
if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"]=="reset") && !isset($_POST["action"])){
    $error='';
  $key = $_GET["key"];
  $email = $_GET["email"];
  $curDate = date("Y-m-d H:i:s");
  $query = mysqli_query($conn,"SELECT * FROM `password_reset_temp` WHERE `key`='$key' and `email`='$email';");
  $row = mysqli_num_rows($query);
  if ($row==""){
    $error = '<h2>Invalid Link</h2>
    <p>The link is invalid/expired. Either you did not copy the correct link
    from the email, or you have already used the key in which case it is 
    deactivated.</p>';
    }
 else{
    $row = mysqli_fetch_assoc($query);
    $expDate = $row['expDate'];
    if ($expDate >= $curDate){
    ?>
    <br />
    <form method="post" action="" name="update">
    <input type="hidden" name="action" value="update" />
    <br /><br />
    <label><strong>Enter New Password:</strong></label><br />
    <input type="password" name="pass1" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and one lowercase letter, and at least 8 or more characters" required />
    <br /><br />
    <label><strong>Re-Enter New Password:</strong></label><br />
    <input type="password" name="pass2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and one lowercase letter, and at least 8 or more characters" required/>
    <br /><br />
    <input type="hidden" name="email" value="<?php echo $email;?>"/>
    <input type="submit" class="resetbtn" value="Reset Password" />
    </form>
    <?php
    }
    else{
        $error .= "<h2>Link Expired</h2>
        <p>The link is expired. You are trying to use the expired link which 
        is valid only 24 hours (1 day after request).<br /><br /></p>";
    }
 }
if($error!=""){
  echo "<div class='error'>".$error."</div><br />";
  } 
} // isset email key validate end
 
 
if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
    $error="";
    $pass1 = mysqli_real_escape_string($conn,$_POST["pass1"]);
    $pass2 = mysqli_real_escape_string($conn,$_POST["pass2"]);
    $email = $_POST["email"];
    $curDate = date("Y-m-d H:i:s");
    if ($pass1!=$pass2){
        $error.= "<p>Password do not match, both password should be same.<br /><br /></p>";
    }
    if($error!=""){
        echo "<div class='error'>".$error."</div><br />";
    }
    else{
        $pass1 = md5($pass1);
        mysqli_query($conn,"UPDATE `students_list` SET `Password`='$pass1' WHERE `email`='".$email."';");
        
        mysqli_query($conn,"DELETE FROM `password_reset_temp` WHERE `email`='$email';");
        
        echo '<p>Congratulations! Your password has been updated successfully.</p>';
        echo"<button><a href='index.php'></button>";
    } 
}
?>
</div>
</body>
</html>