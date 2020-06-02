<html>
    <body>
    <div class="row1" style="background-color:rgb(255, 0, 0);">
                              <h4><B>QUESTIONS/ADD QUESTIONS</B></h4>
    </div>
    <div class="row2" style="display:inline;background-color:#f5f5f5;">

<?php


  session_start();
  include_once 'dbconnect.php';
 //echo $_GET['deleteques'];
   # P H P C O D E    F O R    E D I T T I N G  Q U E S T I O N S
  if( isset($_GET['editques']))
  {
      
     
      $exam=$_SESSION['examcreated'];
      echo $exam;
      $_SESSION['edit']=$exam;   #used in questions.php line 91
      
      if(!empty($_GET['select']))
      {
        $list= explode(",",$_GET['select']);
          ?>
              <form >     
              <?php
               
          foreach($list as $sno){
             
              $sql = "SELECT * FROM $exam WHERE sno=".$sno;
              $res=mysqli_query($conn,$sql);
              
              echo "<table class='table table-striped table-bordered table-hover table-condensed'><th>Questions</th><th>Option 1</th><th>Option 2</th><th>Option 3</th><th>Option 4</th></tr>";
              while($row=mysqli_fetch_assoc($res))
              {
              echo "<tr>";
              echo "<td> <input type='text' name='ques[]' size='30' value='".$row['question']."' required></td>
                      <td id='tdcorrectopt1".$sno."'><input type='text' name='option1[]'  value='".$row['option1']."' required><br>Correct option<input type='radio'  name='correctoption".$sno."' id='correctopt1".$sno."'   value='1' onchange='colorchange(this.id)'></td>
                      <td id='tdcorrectopt2".$sno."'><input type='text' name='option2[]'  value='".$row['option2']."' required><br>Correct option<input type='radio'  name='correctoption".$sno."' id='correctopt2".$sno."'   value='2' onchange='colorchange(this.id)'></td>
                      <td id='tdcorrectopt3".$sno."'><input type='text' name='option3[]'  value='".$row['option3']."' required><br>Correct option<input type='radio'  name='correctoption".$sno."' id='correctopt3".$sno."'   value='3' onchange='colorchange(this.id)'></td>
                      <td id='tdcorrectopt4".$sno."'><input type='text' name='option4[]'  value='".$row['option4']."' required><br>Correct option<input type='radio'  name='correctoption".$sno."' id='correctopt4".$sno."'   value='4' onchange='colorchange(this.id)'></td>";            
                      echo"<td><input type='text' name='serialno[]' size='30' value='".$sno."' hidden></td>";
               echo "</tr>";
              }
              echo "</table>";
              
          }
              ?>
          </form>

          <?php
          echo "<button  class='button' id='update' onclick=sub_editquestions()>Update</button>";
            echo "<button  value='$exam' class='button' name='btn-cancel'style='margin-left:20px;' id='btn-cancel' onclick=seequestions('cancel')>Cancel</button>";
          //foreach( as $selected)
      }
      else{
          echo"NO Item is selected";
      }
  }
  
  # P H P C O D E    F O R    U P D A T I N G  Q U E S T I O N S
  else if(isset($_GET['ques-update']))
  {
      
      $exam=$_SESSION['examcreated'];
      $questions=explode(',',$_GET['ques']);
      $op1=explode(',',$_GET['op1']);
      $op2=explode(',',$_GET['op2']);
      $op3=explode(',',$_GET['op3']);
      $op4=explode(',',$_GET['op4']);
      $sn=explode(',',$_GET['sno']);
      $copt=explode(',',$_GET['co']);
   

      foreach($questions as $ques){
          $question[]=$ques;
      }
      foreach($op1 as $o1)
      {
          $option1[]=$o1;
      }
      foreach($op2 as $o2)
      {
          $option2[]=$o2;
      }
      foreach($op3 as $o3)
      {
          $option3[]=$o3;
      }
      foreach($op4 as $o4)
      {
          $option4[]=$o4;
      }
      foreach($sn as $s)
      {
          $sno[]=$s;
      }
      foreach($copt as $co){
           $coption[] = $co;
      }
     
      $c=count($sno);
      // foreach($_POST['correctoption'+] as $co)
      // {
      //     $coption=$co;
      //     echo $co;
      // }
      
      for($i=0;$i<$c;$i++)
      {
          
          $sql="UPDATE $exam SET question='$question[$i]', option1='$option1[$i]', option2='$option2[$i]', option3='$option3[$i]', option4='$option4[$i]', correctoption='$coption[$i]' WHERE sno='$sno[$i]'";
          
          #$_POST['correctoption".$sno."']
          if(mysqli_query($conn,$sql))
              {
                //upon successfull execution of query

              }
          else{
              //echo'Failed to update.<br>'.$sql;
              
          }
      }
      
  }
 
  else
      echo"not directed properly";
      #header("location:Questions.php");
?>
    </div>
    </body>
</html>