<?php
session_start();
include_once 'dbconnect.php';
date_default_timezone_set('Asia/Kolkata');
if(isset($_GET['sno'])){
    $sno=$_GET['sno'];
    $changeto=$_GET['changeto'];
    $query="UPDATE `list_of_exams` SET `Enable`=$changeto WHERE sno=$sno;";
    if(mysqli_query($conn,$query)){
        $sql="select exam_name from list_of_exams where sno=$sno;";
        $res=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($res);
        $insert=0;
        $exam=$row['exam_name'];
        if($changeto=='1'){
        $que="create table result_$exam(sno int PRIMARY KEY AUTO_INCREMENT ,rollno varchar(10) UNIQUE,Marks int,result varchar(10))";
        $st=date("y-m-d H:i:s");
        if(mysqli_query($conn,$que)){
        
                // echo"table result";
                echo $st;
                 $query2="INSERT INTO `examconducted`(`exam_name`, `starttime`, `result`) VALUES ('$exam','$st','NO')";
                 if(mysqli_query($conn,$query2))
                   $_SESSION['started']=$st;
        }
        // else{
        //     echo"<script>alert('this exam is already conducted.To reconduct the exam delete the exam related data in database(examconducted table) and delete result table 
        //         of this particular exam.Make sure u stored the data in excel sheet');</script>";
        // }   
        
    }
        //For disabling the exam
    else{
            $et=date("y-m-d H:i:s");
            // echo"updated";
            $updatequery="UPDATE `examconducted` SET `endtime`='$et' WHERE `exam_name`='$exam'";
            if($_SESSION['started'])
            {if(mysqli_query($conn,$updatequery))
                unset($_SESSION['started']);
            }
    }
    }
    else{
        http_response_code(456);
    }
}

?>