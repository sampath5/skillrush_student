

<?php
include_once 'dbconnect.php';
if(isset($_GET['exam'])){
    $exam=$_GET['exam'];
    $resultcheck="select result from examconducted where exam_name='$exam'";
    $resultcheckresp=mysqli_query($conn,$resultcheck);
    $rowresultcheck=mysqli_fetch_assoc($resultcheckresp);
    $tablecreated=false;
    if($rowresultcheck['result']=='NO')
    {
    $responsetable='response_'.$exam;
    $sesquery="select rollno from examsessions where exam_name='$exam'";
    $rollno=mysqli_query($conn,$sesquery);
    //echo $sesquery;
        if(gettype($rollno)!='boolean'){
            while($row=mysqli_fetch_assoc($rollno))
            {
                $marks=0;
                $roll=$row['rollno'];
                $query="select r.ans,q.correctoption from $responsetable r JOIN $exam q where r.sno=q.sno and r.rollno='$roll'";
               
                $res=mysqli_query($conn,$query);
                if(gettype($res)!='boolean'){
                    $attempted=mysqli_num_rows($res);
                    while($row2=mysqli_fetch_assoc($res)){
                            if($row2['ans']==$row2['correctoption']){
                                $marks=$marks+1;
                            }
                    }
                    $result;
                    $percentquery="select pass_percent from list_of_exams where exam_name='$exam'";
                    $percent=mysqli_query($conn,$percentquery);
                    $percentrow=mysqli_fetch_assoc($percent);
                    $percentvalue=$percentrow['pass_percent'];
                    if($marks>=$percentvalue)
                        $result='pass';
                    else
                        $result='fail';
                    $insert="insert into result_$exam(`rollno`,`Marks`,`result`) values('$roll',$marks,'$result')";
                    if(mysqli_query($conn,$insert))
                    {
                       
                    }

                }
                
            }
        }
        $update="UPDATE `examconducted` SET `result`='YES' WHERE exam_name='$exam'";
                        
        if(  mysqli_query($conn,$update)){
            $tablecreated=true;
            
        }
    }
    if($tablecreated==true || $rowresultcheck['result']=='YES'){

        $select="select r.rollno,s.Name,s.Branch,r.Marks,r.result from result_$exam r,students_list s where r.rollno=s.RollNo";
        $res=mysqli_query($conn,$select);
        if(gettype($res)!='boolean'){
            echo"<form action='print.php?exam=$exam' method='POST' id='form'>";
            echo"<div id='table1'>";
            echo"<button type='button' name='print' onclick='printresult()'>Get Excel</button><br>";
            echo "<table id='list' class='table table-striped table-bordered table-hover table-condensed'>
                <tr><th>Roll No</th><th>Name</th><th>Branch</th><th>Marks</th><th>Result</th>";
                while($row=mysqli_fetch_assoc($res)){
                    echo"<tr>";
                    echo"<td>".$row['rollno']."</td>";
                    echo"<td>".$row['Name']."</td>";
                    echo"<td>".$row['Branch']."</td>";
                    echo"<td>".$row['Marks']."</td>";
                    echo"<td>".$row['result']."</td>";
                    echo"</tr>";

                }
             echo"</table>";
             echo"</div>";
             echo"<input type='text' hidden value='' name='texttype' id='texttype'>";
           
             echo"</form>";   
        }
    }
}
?>