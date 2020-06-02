<?php
    include_once 'dbconnect.php';
    $query= "select `Email` from students_list";
    $res=mysqli_query($conn,$query);
    $c=mysqli_num_rows($res);
    echo $c;
?>