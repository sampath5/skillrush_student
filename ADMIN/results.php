<?php
session_start();

?>
<html>
    <body onload='extended_menu()'>
                <?php
                if(!isset($_GET['search']))
                {
                ?>
            <div class="row1" style="background-color:rgb(235, 229, 219)">
                           <h4><B>Results</B></h4>
                        </div>
                        <div class="row2" id="row2" style="display:inline;background-color:#f5f5f5;">
                           
                           
                           <span id='search_name'>Search</span> <input type="text"  id='search' onkeyup='search_result(this.id)'>
                           
                           <div id="l1" style="margin-top:10px;">
                 <?php
                }
                ?> 
                           <?php
                           include_once 'dbconnect.php';
                            $query='select * from examconducted';
                            $res=mysqli_query($conn,$query);
                            echo"<span style='color:Red;'>*</span>Active exams are not shown here";
                            echo "<table id='list' class='table table-striped table-bordered table-hover table-condensed'>
                                                    <tr><th>Exam</th><th>conducted on</th><th>Results</th>";
                            if(gettype($res)=='boolean'){
                                    echo"<br>No exams are conducted or exam is still active";
                            }
                            else if(isset($_GET['search']) && $_GET['search']!=''){
                                    $search=$_GET['search'];
                                    $searchquery="select exam_name,starttime from examconducted where endtime!='NULL'AND concat(exam_name,starttime) like '%$search%'";
                                    $queryresult=mysqli_query($conn,$searchquery);
                                    while($row=mysqli_fetch_assoc($queryresult)){
                                        $exam=$row['exam_name'];
                                        echo "<tr>";
                                        echo"<td>".$row['exam_name']."</td>";
                                        echo"<td>".$row['starttime']."</td>";
                                        echo"<td><button value='$exam' id='getresult".$exam."' onclick='getresult(this.id)'>Get result</button></td>";
                                       echo"</tr>";
                                    }
                            }
                            else{
                            while($row=mysqli_fetch_assoc($res)){
                                if($row['endtime']!=null){
                                    $exam=$row['exam_name'];
                                    echo "<tr>";
                                    echo"<td>".$row['exam_name']."</td>";
                                    echo"<td>".$row['starttime']."</td>";
                                    echo"<td><button value='$exam' id='getresult".$exam."' onclick='getresult(this.id)'>Get result</button></td>";
                                    echo"</tr>";
                                }
                                
                            }
                            echo"</table>";
                        }

                           ?>
    </body>
</html>
