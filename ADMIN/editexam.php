<?php

   if(isset($_GET['editexam']))
   {

       if(empty($_GET['select'])){
           ?>
          
   
           <?php
       
       }
       if(!empty($_GET['select']))
       {
           require 'dbconnect.php';
           $List = explode (",", $_GET['select']);
         
           ?>
           <form method='GET' id='form1'>
               <?php
           echo "<table class='table table-striped table-bordered table-hover table-condensed'><tr><th size='25'>Exam name</th><th>pass percentage</th><th>Exam duration(in mins)</th></tr>";
          
           foreach($List as $s )
           {
               $sql = "SELECT * FROM list_of_exams WHERE sno=".$s;
              
               
               if($res=mysqli_query($conn,$sql))
               {
               
                  
                   while($row=mysqli_fetch_assoc($res))
                   {
                   echo "<tr>";
                   
                   echo "<td> <input type='text' name='examname[]' size='30' value='".$row['exam_name']."'></td>
                           <td ><input type='text' name='passpercentage[]' value='".$row['pass_percent']."'></td>
                           <td ><input type='text' name='exam_duration[]' value='".$row['exam_duration']."'></td>";
                    echo"<td><input type='text' name='serialno[]' size='30' value='".$s."' hidden></td>";
                           
                                     
                   echo "</tr>";
                   }
                  
               }
           }
                      
           echo "</table>";
           echo "<input  type='button' class='button' id='update' value='Update'  name='examdetailsupdate' onclick='examupdate()'>";
       
           ?>

           </form>
           <button onclick="exams()"  class="button" id="cancel" style="margin-top:-75px;margin-left:220px;font-size:18px;">Cancel</button>
        
           <?php
       }
   }

   //**** P H P   P A R T   F O R   U P D A T I N G   E X A M   D E T A I L S*/
   if(isset($_GET['examupdation']))
        {
            require 'dbconnect.php';
            echo $_GET['examname'];
            $exam = explode (",", $_GET['examname']);
            $pass = explode (",", $_GET['passpercentage']);
            $eduration=explode(",",$_GET['examduration']);
            $ssnno = explode (",", $_GET['sno']);
            
            $c=count($exam);
        
            foreach($exam as $s){
                $examname[]=$s;
            }
            foreach($pass as $pp)

            {
                $passpercent[]=$pp;
            }
            foreach($eduration as $ed)
            {
                $examduration[]=$ed;
            }
            foreach($ssnno as $sno)
            {
                $ss[]=$sno;
            }
           for($i=0 ;$i<$c;$i++)
            {
                $query="SELECT * from list_of_exams where sno=".$ss[$i].";";
                $res=mysqli_query($conn,$query);
                    $row=mysqli_fetch_assoc($res);
                
                   
                if($row['exam_name']!=$examname[$i]){ //condition to check if the value is changed.update only if changed
                    $renamequery="ALTER TABLE ".$row['exam_name']." RENAME to ".$examname[$i].";";    
                        
                    $rename_res=mysqli_query($conn,$renamequery);
                }

                if($row['exam_name']!=$examname[$i] || $row['pass_percent']!=$passpercent[$i] || $row['exam_duration']!=$examduration[$i]){
                    $sqlquery="UPDATE list_of_exams SET exam_name='$examname[$i]', pass_percent='$passpercent[$i]',exam_duration='$examduration[$i]' where sno=$ss[$i];";
                    if(mysqli_query($conn,$sqlquery))
                    {
                        http_response_code(201);
                        
                    }else{
                        var_dump(http_response_code(404));
                    }
                }
                    
                
            }
            
        }
?>