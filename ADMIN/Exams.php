<html>
<head>
     
        <!-- <link rel="stylesheet" type="text/css" href="stylingforadmin.css"> -->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->

        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
        <!-- <script src="https://kit.fontawesome.com/edfedfffe1.js" crossorigin="anonymous"></script>  -->
        
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  -->
       
        <!-- <script src="menu.js"></script> -->
       
</head>


<body onload="extended_menu()">      

                        <?php
                        if(!isset($_GET['search'])){
                        ?>
                        <div class="row1" style="background-color:rgb(235, 229, 219)">
                           <h4><B>Exams</B></h4>
                        </div>
                        <div class="row2" style="display:inline;background-color:#f5f5f5;">
                           <button class="button"  id="createexam" onclick='createexam("")'>+CREATE EXAM</button>
                           <button class="button" name='editexam' id="editexam"  onclick='editExam()'>EDIT EXAM</button>
                           <button class="button" name='deleteexam' id="deleteexam" type="submit" onclick=deleteexam()>DELETE EXAM</button>
                           <br><br>
                           <span id='search_name'>Search</span>     <input type="text"  id='search' onkeyup='search_exam(this.id)'>
                           
                           <div id="l1" style="margin-top:10px;">
                           <?php
                           }
                           ?>
                                <?php
                                            include_once 'dbconnect.php';
                                           
                                            
                                            $sql="SELECT * from list_of_exams;";
                                            $query=mysqli_query($conn,$sql);
                                            if($query==null)
                                                echo"No exams are created";
                                            else if(mysqli_num_rows($query)==0)
                                                echo"No exams are created";
                                            else if(isset($_GET['search']) && $_GET['search'] !=''){
                                                $search=$_GET['search'];
                                                $sql="select * from list_of_exams where concat(`exam_name`,`pass_percent`,`exam_duration`) LIKE '%$search%'";
                                                $res=mysqli_query($conn,$sql);
                                               
                                                
                                                echo"<form method='POST' action='editexamdetails.php' id='form1'>";
                                                //echo"<button name='deleteexam' value='deleteexam' hidden></button>";
                                                echo "<table id='list' class='table table-striped table-bordered table-hover table-condensed'>
                                                    <tr><th>Select</th><th>Exam</th><th>pass percentage</th><th>Exam Duration(in mins)</th><th>Enable exam</th>";
                                                while($row=mysqli_fetch_assoc($res))
                                                {
                                                     
                                                    echo "<tr>";
                                                    echo"<td><input type='checkbox'  name='select[]' id='select".$row['sno']."' onchange='checkedBox(this.id)' value='".$row['sno']."' ></td>";

                                                
                                                    echo "<td size='30'>".$row['exam_name']."</td><td size='30'>".$row['pass_percent']."</td><td>".$row['exam_duration']."</td>";
                                                    
                                                   
                                                    $s=$row['sno'];
                                                    $value=$row['Enable'];
                                                    if($value==1){
                                                    echo"<td><label class='switch'>
                                                    <input type='checkbox' id='toggle".$row['sno']."' value=$value checked onchange='examenable($s)'>
                                                    <span class='slider round'></span>
                                                  </label></td>";
                                                    }
                                                    else{
                                                        echo"<td><label class='switch'>
                                                        <input type='checkbox' id='toggle".$row['sno']."' value=$value onchange='examenable($s)'>
                                                        <span class='slider round'></span>
                                                      </label></td>";
                                                    }
                                                  
                                                    echo "</tr>";
                                                    
                                                    //$s=$s.$row['sno'].",";
                                                }
                                                
                                                echo "</table>";
                                                
                                                echo "<input type='checkbox' name='selectall' id='selectallbutton' onClick='selectAll()' >select all";
                                                echo"</form>";
                                            }
                                            else 
                                            {
                                                echo"<form method='POST' action='editexamdetails.php' id='form1'>";
                                                //echo"<button name='deleteexam' value='deleteexam' hidden></button>";
                                                echo "<table id='list' class='table table-striped table-bordered table-hover table-condensed'>
                                                    <tr><th>Select</th><th>Exam</th><th>pass percentage</th><th>Exam Duration(in mins)</th><th>Enable exam</th>";
                                                while($row=mysqli_fetch_assoc($query))
                                                {
                                                    
                                                    echo "<tr>";
                                                    echo"<td><input type='checkbox'  name='select[]' id='select".$row['sno']."' onchange='checkedBox(this.id)' value='".$row['sno']."' ></td>";

                                                
                                                    echo "<td size='30'>".$row['exam_name']."</td><td size='30'>".$row['pass_percent']."</td><td>".$row['exam_duration']."</td>";
                                                    
                                                   
                                                    $s=$row['sno'];
                                                    $value=$row['Enable'];
                                                    if($value==1){
                                                    echo"<td><label class='switch'>
                                                    <input type='checkbox' id='toggle".$row['sno']."' value=$value checked onchange='examenable($s)'>
                                                    <span class='slider round'></span>
                                                  </label></td>";
                                                    }
                                                    else{
                                                        echo"<td><label class='switch'>
                                                        <input type='checkbox' id='toggle".$row['sno']."' value=$value onchange='examenable($s)'>
                                                        <span class='slider round'></span>
                                                      </label></td>";
                                                    }
                                                  
                                                    echo "</tr>";
                                                    
                                                    //$s=$s.$row['sno'].",";
                                                }
                                                
                                                echo "</table>";
                                                
                                                echo "<input type='checkbox' name='selectall' id='selectallbutton' onClick='selectAll()' >select all";
                                                echo"</form>";
                                            }
                                    
                                     ?>

                           </div>
                        
                        </div>



</body>
</html>