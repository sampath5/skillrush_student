<?php
include_once 'dbconnect.php';
$query="select * from list_of_exams where Enable=1;";
$res=mysqli_query($conn,$query);
$count=mysqli_num_rows($res);
echo$count;
?>