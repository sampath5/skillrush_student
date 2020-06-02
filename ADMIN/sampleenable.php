<?php

    session_start();
    include_once 'dbconnect.php';
date_default_timezone_set('Asia/Kolkata');
if(isset($_GET['sno'])){   
    $sno=$_GET['sno'];
    $changeto=$_GET['changeto'];
    $examnamequery="select exam_name,no_of_ques from list_of_exams where sno=$sno";
    $row=mysqli_fetch_assoc(mysqli_query($conn,$examnamequery));
    $exam=$row['exam_name'];
    $no_of_questions=$row['no_of_ques'];
    if($changeto==1){   //TO enable the exam
        $query="select exam_name from examconducted where exam_name='$exam'";
        if(mysqli_num_rows(mysqli_query($conn,$query))==0){
                $quesquery="select * from $exam ";
                if(mysqli_num_rows(mysqli_query($conn,$quesquery))){    //Query to check if all the questions are entered
                    $multiquery="create table result_$exam(sno int PRIMARY KEY AUTO_INCREMENT ,rollno varchar(10) UNIQUE,Marks int,result varchar(10));";
                    $multiquery.="INSERT INTO `examconducted`(`exam_name`, `starttime`, `result`) VALUES ('$exam','$st','NO');";
                    $multiquery.="UPDATE `list_of_exams` SET `Enable`=$changeto WHERE sno=$sno;";
                    if(!mysqli_multi_query($conn,$multiquery))
                    {
                        http_response_code(442);        //one of The above three queries must have failed
                    }
                }
                else{
                    http_response_code(440);        //Few questions are entered or Many questions are entered
                }
        }
        else{
            http_response_code(441); //exam is already conducted
        }

    }   
    else{        
               //To disable the exam
        $disablequery="UPDATE `list_of_exams` SET `Enable`=$changeto WHERE sno=$sno;";
        mysqli_query($conn,$disablequery);
    }

}



/*
    Changes in Exams.php
        add table columns for no of questions and total marks

    Changes in createexam.php 
        putone input type text for no_of_questions and Marks

        create table list_of_exams(sno int PRIMARY KEY AUTO_INCREMENT,exam_name varchar(100) UNIQUE,pass_percent int,exam_duration int,no_of_questions int,total_marks int,Enable binary);

        CREATE table ".$exam_name." (sno int NOT NULL AUTO_INCREMENT,question varchar(500),option1 varchar(100),option2 varchar(100),option3 varchar(100),option4 varchar(100),correctoption int,Marks int,PRIMARY KEY(sno));

    changes in Editexam.php
        putone input type text for no_of_questions and Marks

        UPDATE list_of_exams SET exam_name='$examname[$i]', pass_percent='$passpercent[$i]',exam_duration='$examduration[$i]',no_of_questions='$no_of_questions[$i]',total_marks='total_marks[$i]' where sno=$ss[$i];

    changes in questions.php
        Add table columns in line 139 to 148
    
    changesin addquestions.php
        add table rows for Marks
        INSERT INTO ".$name." (question,option1,option2,option3,option4,correctoption,Marks) VALUES ('$ques', '$op1', '$op2','$op3','$op4','$correctoption','$marks')
    Changes in editquestions.php
        add table data for marks in line 40 to 44 to display for editing
        UPDATE $exam SET question='$question[$i]', option1='$option1[$i]', option2='$option2[$i]', option3='$option3[$i]', option4='$option4[$i]', correctoption='$coption[$i]',Marks='$marks[$i]' WHERE sno='$sno[$i]'

    functions in home.html to be changed are
        sub_addquestion()
        sub_editquestion()
        createExamsub()
        examupdate()


*/
?>

