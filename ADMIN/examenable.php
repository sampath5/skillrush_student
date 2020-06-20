<?php
session_start();
include_once 'dbconnect.php';
date_default_timezone_set('Asia/Kolkata');
if(isset($_GET['sno'])){
    $sno=$_GET['sno'];
    $changeto=$_GET['changeto'];
    $examname_query="select exam_name from list_of_exams where sno=$sno";
    $row=mysqli_fetch_assoc(mysqli_query($conn,$examname_query));
    $exam=$row['exam_name'];

    $sql_query="select * from examconducted where exam_name='$exam'";
    //To enable
    
     if($changeto==1){
        $res=mysqli_query($conn,$sql_query);
            if(mysqli_num_rows($res)==0)
            {
                
                $query="create table result_$exam(sno int PRIMARY KEY AUTO_INCREMENT ,rollno varchar(10) UNIQUE,Marks int,result varchar(10))";
                if(mysqli_query($conn,$query))
                {
                    $que="UPDATE `list_of_exams` SET `Enable`=$changeto WHERE sno=$sno;";
                    $st=date("y-m-d H:i:s");
                    if(mysqli_query($conn,$que))
                    {
                        echo $st;
                        $query2="INSERT INTO `examconducted`(`exam_name`, `starttime`, `result`) VALUES ('$exam','$st','NO')";
                        if(mysqli_query($conn,$query2))
                        {
                            echo"Exam enabled";
                        }
                    } 
                }
                else{
                    echo"Failed to enable exam.Unable to generate Result table or already existing ";
                    //http_response_code(453);
                }  
            }
            else{
                echo"Exam is already conducted.To reconduct the exam u have to delete result table and remove exam data from examconducted table";
            }
        }
    //For disabling the exam
    else
    {
        $et=date("y-m-d H:i:s");
        $updatequery="UPDATE `examconducted` SET `endtime`='$et' WHERE `exam_name`='$exam'";
        if(mysqli_query($conn,$updatequery))
        {
            $query="UPDATE `list_of_exams` SET `Enable`=$changeto WHERE sno=$sno;";
            if(mysqli_query($conn,$query))
                echo"$et Exam Disabled";
        }
        
    }
}

?>
