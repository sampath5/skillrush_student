<?php
session_start();
include_once 'dbconnect.php';
date_default_timezone_set('Asia/Kolkata');
if(isset($_POST['start'])){
$link=mysqli_connect("localhost","root","","vjit");
$duration=$_POST['start'];
// $res=mysqli_query($link,"se;ect * from timer");
// while($row=mysqli_fetch_assoc($res)){
//     $duration=$row['duration'];
// }
$_SESSION['duration']=$duration;
$_SESSION['finished']=0;
$_SESSION['testexam']=$_GET['exam'];
$_SESSION['start_time']=date("y-m-d H:i:s");
$end_time=date("y-m-d H:i:s", strtotime('+'.$_SESSION['duration'].'minutes',strtotime($_SESSION['start_time'])));

$_SESSION['end_time']=$end_time;
//echo $_SESSION['end_time'];
$_SESSION['st']=$_SESSION['start_time'];
$_SESSION['et']=$_SESSION['end_time'];
$exam=$_SESSION['testexam'];
$start=$_SESSION['start_time'];
$rollno=$_SESSION['roll_no'];


$ip_address;
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
{
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
}
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
{
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
}
//whether ip is from remote address
else
{
    $ip_address = $_SERVER['REMOTE_ADDR'];
}
 


$insertquery="INSERT INTO `examsessions`(`rollno`, `exam_name`,`ipaddress`, `starttime`) VALUES ('$rollno','$exam',INET_ATON('$ip_address'),'$start')";

echo$insertquery;
if(mysqli_query($conn,$insertquery))
    header("location:stu.php");
}
else
header('location:challenges.php');
?>
    