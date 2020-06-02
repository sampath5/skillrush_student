<html>
   <link rel="stylesheet" type="text/css" href="stylingfortable.css">
  
    <body>
    <div class="row1" style="background-color:rgb(255, 0, 0);">
                              <h4><B>QUESTIONS/ADD QUESTIONS</B></h4>
    </div>
    <div class="row2" style="display:inline;background-color:#f5f5f5;">
    <span id='span' style="color:green"></span><br>
<?php
        session_start();
        include_once 'dbconnect.php';
            $name="";
            if(isset($_SESSION['examcreated']))
            {
                
            $name=$_SESSION['examcreated'];

            $query="Select * from $name";
            $res=mysqli_query($conn,$query);
            $c=mysqli_num_rows($res);
            echo"<b>'$c' Questions are present in $name exam.<b><br>";

            }
        else{
                
        }
            ?>
        
        <form  action="" method="">
        <table id="list">
            <br><br>
            <tr><b>Question</b></tr><br><br>
            <tr><input type="text" id="question" name="question" required></tr><br><br>
        
            <div>
                <table name="options">
                    <th>S.NO</th>
                    <th>options</th>
                    <th>correct answer</th>
                    <tr>
                        <td>1.</td>
                        <td> <input type="text" id="option1" name="option1" class="options" required></td>
                        <td><input type="radio" name="correctoption" value="1" ></td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td> <input type="text" id="option2" name="option2" class="options" required></td>
                        <td><input type="radio" name="correctoption" value="2" ></td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td> <input type="text" name="option3" id="option3" class="options" required></td>
                        <td><input type="radio" name="correctoption" value="3" ></td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td> <input type="text" name="option4" id="option4" class="options" required></td>
                        <td><input type="radio" name="correctoption" value="4"></td>
                    </tr><br><br>
                </table><br><br>
                <!-- <input type="radio" name="correctoption" id="correctoption" required hidden > -->
            </div>
        </table>
        <input type="submit" class="button" id="submit1" style='width:250px;' value="Add Question" name="btn-add-ques" onclick=sub_addquestion()>
        
        </form>
        <?php echo"<button  value='$name' class='button' id='btn-cancel' style='width:250px;margin-left:330px;margin-top:-60px;margin-bottom:10px;' name='btn-cancel'  onclick=seequestions('cancel')>cancel</button>" ?>
        
        
        
<?php
      //session_start();     
    if(isset($_GET['addques']))
    {   
        $ques=$_GET['ques'];
        $op1 =$_GET['op1'];  
        $op2 =$_GET['op2'];
        $op3 = $_GET['op3'];
        $op4 =$_GET['op4'];
        
            $name=$_SESSION['examcreated']; 
         
          
        $correctoption=$_GET['co'];
        $sql = "INSERT INTO ".$name." (question,option1,option2,option3,option4,correctoption) VALUES ('$ques', '$op1', '$op2','$op3','$op4','$correctoption')";
        if(mysqli_query($conn,$sql))
         {//   echo "successfully added question";
        
                
        }
	    else
		    http_response_code(444);
    }
?>
    </div>
    </body>
    </html>