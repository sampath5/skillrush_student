<?php
include_once 'dbconnect.php';
if(isset($_GET['deleteexam']))
{
    $select = explode (",", $_GET['select']);
    if(empty($select)){
        echo 'no data found';
    }
    else {
       foreach($select as $sno)
       {
           $query="SELECT exam_name from list_of_exams where sno=$sno";
           if(($res=mysqli_query($conn,$query))!=null){
                $row=mysqli_fetch_assoc($res);
            }

            $delete_responsetable="DROP TABLE response_".$row['exam_name'].";";
            if(($res=mysqli_query($conn,$delete_responsetable))!=null){
                //$row=mysqli_fetch_assoc($res);
                {
                   
                    $deletetable="DROP TABLE ".$row['exam_name'].";";
                    if(mysqli_query($conn,$deletetable)){}
                }
            }

            $sqlquery="DELETE FROM list_of_exams where sno=$sno;";

            if(($res=mysqli_query($conn,$sqlquery))!=null){
                //$row=mysqli_fetch_assoc($res);
                var_dump(http_response_code(201));
            }
            
       }
    }
}
?>