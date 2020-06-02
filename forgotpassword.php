<?php
session_start();
include_once 'dbconnect.php';
//$conn=mysqli_connect('localhost','root','','vjit');
?>
<html>
<head>
 <link rel="stylesheet" href="signinstyling.css">
 <script src='https://kit.fontawesome.com/a076d05399.js'></script>
 <script src="myjavascript.js"></script>
</head>
<body>
<div style="background-color:#f6f4f1;">
            <a  href="index.php">
                  <img src="newvjitlogo.png" alt="VJIT" width="280px" height="65px" style="margin-left:0px;margin-top:16px;margin-bottom:10px;"></a>
             
</div>
<div class="container">
<div><img src="skillrushn3.jpg" width="360px" height="80px" style="margin-top:0px;margin-left:20px;"></img></div>
<p id="s1"></p>
    <center><h2 style="color:#410056;">Forgot Password</h2></center>
 <form action="" method="post">

    <br><label for="rollno"><b style="color:#410056;">ROLL NO</b></label><br>
    <input type="text" id="rollno"  name="rollno"  required>
    
    <br><br><label for="pswd"><b style="color:#410056;">Enter Registered Mail id</b></label><br>
    <input type="text"   id="pswd" name="pswd" required><br>
   
   <?php
if(isset($_POST['submit']))
{
    $rollno=$_POST['rollno'];
    $email=$_POST['pswd'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $query="SELECT Email FROM students_list WHERE `ROLLNO`='$rollno' ";
        $res=mysqli_query($conn, $query);
        if(mysqli_num_rows($res)==1){
            $data=mysqli_query($conn, $query);
            $n=mysqli_num_rows($data);
            $row=mysqli_fetch_assoc($data);

            if($n==1 && $email==$row['Email']){
                

                $expFormat = mktime(date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y"));
                $expDate = date("Y-m-d H:i:s",$expFormat);
                $emailkey=$email;$emailkey.=5898;
                $key = md5($emailkey);
                $addKey = substr(md5(uniqid(rand(),1)),4,12);
                $key = $key . $addKey;
                mysqli_query($conn,"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('$email', '$key', '$expDate');");
                $output='Dear user,';
                $output.='Please use the following link to reset your password.';
                $output.='-------------------------------------------------------------';
                $output.='http:localhost:80/mp/student/resetpassword.php?key='.$key.'&email='.$email.'&action=reset'; 
                $output.='-------------------------------------------------------------';
                $output.='Please be sure to copy the entire link into your browser.
                            The link will expire after 1 day for security reason.';
                $output.='If you did not request this forgotten password email, no action 
                            is needed, your password will not be reset. However, you may want to log into 
                            your account and change your security password .';   
                $output.='Thanks,';
                $output.='Skillrush vjit';
                $body = $output; 
                $subject='Password-Recovery  Skillrush VJIT';
                $to=$email;
                if(mail($to,$subject,$body))
                    echo"An email has been sent to you with instructions on how to reset your password.";
                else{
                    echo"->Could not send mail..";
                }

        // header('location:shome.php');
            }
            else
                echo "<span style='color:red;'>Wrong mailid.Check again </span>";
    }
    else
    echo "<span style='color:red;'>Invalid user</span>";
    }
    else
        echo"Invalid email";
}
?>
</a><br><br>

  <button type="submit" name="submit"  class="button1" style="margin-left:100px;padding:11px;margin-top:-25px;"><b>Get link</b></button>
   
</form>
<a href="index.php"><button  class="button1" style='font-size:14px;cursor:pointer;padding:4px;margin-left:2px;margin-bottom:3px;margin-top:15px;'><i class='far fa-arrow-alt-circle-left'></i><b>BACK</b></button></a>
</body>
</html>