<?php
    // session_unset();
            ?>
<html>
<head>
     
        <!-- <link rel="stylesheet" type="text/css" href="stylingforadmin.css"> -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
        <!-- <script src="https://kit.fontawesome.com/edfedfffe1.js" crossorigin="anonymous"></script>  -->
        <!-- <script src="menu.js"></script> -->
        
</head>
<body onload="extended_menu()">

               <div class="row1" style="background-color:rgb(255, 0, 0);">
                              <h4><B>QUESTIONS</B></h4>
                        </div>
                        <div class="row2" style="display:inline;background-color:#f5f5f5;">
                           <button class="button" id="addquestions" style='visibility:hidden' onclick=addquestion()>+Add New Questions</button>
                           <button class="button" name="editquestions" id="editquestions"  style='visibility:hidden' onclick=editquestions()>Edit QUESTIONS</button>
                           <button class="button" type="submit" id="deletequestions" style='visibility:hidden' onclick=deletequestions()>Delete</button>

                           <!-- <form action="addquestions.php" id="form1" hidden>
                           </form> -->
                              
                              <div id="l1" style="margin-top:10px;">
                                    <?php
                                        
                                          session_start();
                                          echo"<b>Enter the exam name to see the questions.</b><br>";
                                          
                                    ?>
                                    <form  method="POST" >
                                         <br>
                                         <input type="text" placeholder="Exam name" name="exam-name" id="exam-name" required>
                                         
                                    </form>
                                          <input type="button" class="button" id="createexam" value="SEE QUESTIONS" name="btn-ques" onclick='seequestions("")'>
                                          <span id="span" style="color:red"></span>
                                    <?php
                                    include_once "dbconnect.php";
                        
                              //      if(isset($_SESSION['edit']))   //editing question php part in editingquestions.php line45
                              //       {
                              //            $exam=$_SESSION['edit'];

                              //             echo"$exam Exam Questions ";
                              //                    $sql="select * from $exam;";
                                                
                              //                   $res1=mysqli_query($conn,$sql);
                              //            echo"<form method='POST' action='editquestions.php' id='form2'>";
                              //             echo "<table class='table table-striped table-bordered table-hover table-condensed'><tr><th>Select</th>
                              //             <th>Questions</th><th>Option 1</th><th>Option 2</th><th>Option 3</th><th>Option 4</th></tr>";
                              //             while($row=mysqli_fetch_assoc($res1))
                              //             {
                                                
                              //                   echo "<tr>";
                              //                   echo"<td><input type='checkbox' name='select[]' id='select' onchange='checkedBox(this);' value='".$row['sno']."' ></td>";
                                                
                              //                   if($row['correctoption']==1)
                              //                   echo "<td>".$row['question']."</td><td style='background-color:green'>".$row['option1']."</td><td>".$row['option2']."</td><td>".$row['option3']."</td><td>".$row['option4']."</td>";
                                                
                              //                  else if($row['correctoption']==2)
                              //                   echo "<td >".$row['question']."</td><td >".$row['option1']."</td><td style='background-color:green'>".$row['option2']."</td><td>".$row['option3']."</td><td>".$row['option4']."</td>";

                              //                         else if($row['correctoption']==3)
                              //                   echo "<td >".$row['question']."</td><td >".$row['option1']."</td><td >".$row['option2']."</td><td style='background-color:green'>".$row['option3']."</td><td>".$row['option4']."</td>"; 

                              //                   else if($row['correctoption']==4)
                              //                   echo "<td >".$row['question']."</td><td >".$row['option1']."</td><td >".$row['option2']."</td><td >".$row['option3']."</td><td style='background-color:green'>".$row['option4']."</td>"; 
                                                
                              //                   echo "</tr>";
                                                
                                                
                              //             }
                                                                                          
                              //             echo "</table>";
      
                              //             echo "<input type='checkbox' name='selectall' id='selectallbutton' onClick='selectAll()' >select all";
                              //             echo"</form>";
                              //             unset($_SESSION['edit']);
                                          
                              //       }
                                      if(isset($_GET['seeques']) ) 
                                     {
                                          
                                           if(($_GET['exam_name']!=null) )
                                           {
                                                      //echo"exam-name";
                                                            $exam=$_GET['exam_name'];
                                                            $checked=false;
                                                            # UPDATTING THE QUERY . CTRL Z TO REVERT BACK TO SHOW TABLES.
                                                            $query="select * from list_of_exams";
                                                            
                                                            $res=mysqli_query($conn,$query);
                                                      while( $row=mysqli_fetch_assoc($res))
                                                      {
                                                            if($row['exam_name']==$exam){
                                                                  $checked=true;
                                                                  
                                                                  break;
                                                            }
                                                       }
                                                            if($checked==true)
                                                            { 
                                                                  
                                                            # if($row['exam_name']!=$exam)
                                                            #       echo"No such exam is found";   
                                                            
                                                                  $sql="select * from $exam;";
                                                                  
                                                                  $res1=mysqli_query($conn,$sql);
                                                            # $row=mysqli_fetch_assoc($res1);
                                                                  $c=mysqli_num_rows($res1);
                                                                  #echo"<script>alert('$res1');</script>";
                                                                  if($c==0)
                                                                  {
                                                                        $_SESSION['examcreated']=$exam;
                                                                       // echo $_SESSION['examcreated'];
                                                                        echo"<span style='color:red'>No questions </span> are added in $exam.Start adding questions for $exam exam by clicking on Add new Questions ";
                                                                       
                                                                        
                                                                  }
                                                                  else{
                                                                        $_SESSION['examcreated']=$exam;
                                                                      //  echo $_SESSION['examcreated'];
                                                                        echo"<p style='color:green'>$exam Exam Questions </p> ";
                                                                        $s="";
                                                                        echo"<form method='POST'  id='form2'>";
                                                                        echo "<table id='list'  class='table table-striped table-bordered table-hover table-condensed'><tr><th>Select</th>
                                                                        <th>Questions</th><th>Option 1</th><th>Option 2</th><th>Option 3</th><th>Option 4</th></tr>";
                                                                        while($row=mysqli_fetch_assoc($res1))
                                                                        {
                                                                              
                                                                              echo "<tr>";
                                                                              echo"<td ><input type='checkbox' name='select[]' id='select".$row['sno']."' onchange='checkedBox(this.id)'  value='".$row['sno']."' ></td>";
                                                                              
                                                                              if($row['correctoption']==1)
                                                                              echo "<td>".$row['question']."</td><td style='background-color:green'>".$row['option1']."</td><td>".$row['option2']."</td><td>".$row['option3']."</td><td>".$row['option4']."</td>";
                                                                              
                                                                              else if($row['correctoption']==2)
                                                                              echo "<td >".$row['question']."</td><td >".$row['option1']."</td><td style='background-color:green'>".$row['option2']."</td><td>".$row['option3']."</td><td>".$row['option4']."</td>";

                                                                              else if($row['correctoption']==3)
                                                                              echo "<td >".$row['question']."</td><td >".$row['option1']."</td><td >".$row['option2']."</td><td style='background-color:green'>".$row['option3']."</td><td>".$row['option4']."</td>"; 

                                                                              else if($row['correctoption']==4)
                                                                              echo "<td >".$row['question']."</td><td >".$row['option1']."</td><td >".$row['option2']."</td><td >".$row['option3']."</td><td style='background-color:green'>".$row['option4']."</td>"; 
                                                                              
                                                                              echo "</tr>";
                                                                              
                                                                              $s=$s.$row['sno'].",";
                                                                        }
                                                                                                                        
                                                                        echo "</table>";
                              
                                                                        echo "<input type='checkbox' name='selectall' id='selectallbutton'  onClick='selectAll()' >select all";
                                                                        echo"</form>";

                                                                  }
                                                                        
                                                            }   
                                                            else if($checked==false)
                                                            {
                                                                 // echo"<span style='color:red'>$exam Exam is  Not found.Please check your exam name </span>";
                                                                  http_response_code(405);
                                                            }
                                                      }
                                                      else
                                                            echo" <span id='span' style='color:red'> *** Please enter exam name </span>";
                                     }
                                    ?>    

                              </div>
                        
                        </div>



</body>
</html>
