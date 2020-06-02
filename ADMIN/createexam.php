
<?php
if(!isset($_GET['submit'])){
    ?>
<html>
    <head>
      

        
    </head>
    <body>
        <div>
            <form >
                <fieldset>
                    <div class="form-group">
                        <label><h4>Enter exam name</h4></label>
                        <input type="text" placeholder="Exam Name" class="form-input" name="exam_name" id="createExamName" required>
                        <label><h4> pass percentage</h4></label><input type="text" name="pass_percentage" id="createExamPasspercentage" required>
                        <label><h4> Exam duration in minutes</h4></label><input type="text" name="exam_duration" id="createExamduration" required>
                    </div>
                     


                     <input type="button" class="button" id="submit1"   stye="font-size=12px;" value="Submit" name="submit" id="createExamBtn" onclick="createExamsub()">
                     <button class= "button"  id="cancel"  onclick="exams()">Cancel</button>
                </fieldset>
            </form>
        </div>
        <?php
        }
        ?>
        <?php
                include_once 'dbconnect.php';
        
                if(isset($_GET['submit'])){
                    
                    $exam_name=$_GET['exam_name'];
                    $pass_percent=$_GET['pass_percentage'];
                    $examduration=$_GET['exam_duration'];
                    $query_checklistofexamstable="SHOW TABLES";
                    $res=mysqli_query($conn,$query_checklistofexamstable);
                    $listofexams_existing=0;
                    $c=mysqli_num_rows($res);
                    if($c>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            if($row['Tables_in_vjit']=='list_of_exams')
                            $listofexams_existing=1;
                        break;
                        }
                    }
                    if( $listofexams_existing==0){
                        $query_Createlisttable="create table list_of_exams(sno int PRIMARY KEY AUTO_INCREMENT,exam_name varchar(100) UNIQUE,pass_percent int,exam_duration int,Enable binary)";
                        // $query_responsetable="create table response_$exam_name(rsno int PRIMARY KEY AUTO_INCREMENT,rollno varchar(20),sno int,ans int,FOREIGN KEY(sno) REFERENCES $exam_name(sno))";
                        if(mysqli_query($conn,$query_Createlisttable))
                         $listofexams_existing=1;

                    }
                    
                    $query_checkExam="select * from list_of_exams where exam_name='$exam_name'";
                    $result=mysqli_query($conn,$query_checkExam);
                    $n=0;
                    $n=mysqli_num_rows($result);
                
                    if($n!=0){
                        var_dump(http_response_code(422));
                    }else{
                        $sql="INSERT INTO list_of_exams ( exam_name, pass_percent, exam_duration,`Enable` ) VALUES ('$exam_name',$pass_percent,$examduration,0);";
                        
                                if(mysqli_query($conn,$sql) ){
        
                                    if(mysqli_query($conn,"CREATE table ".$exam_name." (sno int NOT NULL AUTO_INCREMENT,question varchar(500),option1 varchar(100),option2 varchar(100),option3 varchar(100),option4 varchar(100),correctoption int,PRIMARY KEY(sno));"))
                                   {
                                    $query_responsetable="create table response_$exam_name(rsno int PRIMARY KEY AUTO_INCREMENT,rollno varchar(20),sno int,ans int,FOREIGN KEY(sno) REFERENCES $exam_name(sno))";
                                       if(mysqli_query($conn,$query_responsetable))
                                        var_dump(http_response_code(201));}
                                    else{
                                        http_response_code(424);
                                    }
                                }else{
                                    http_response_code(423);
                                }
                    }
                
                    // $is_exam_already_created=0;
                    // $table_present=1;

                    // $query=mysqli_query($conn,"SHOW TABLES;");
            
                    // if(mysqli_num_rows($query)==0  )
                    // {
                    //  $table_present=0;   
                    // }
                    // else
                    // {
                        
                    //     while($row=mysqli_fetch_assoc($query))
                    //     {

                    //         if($row['Tables_in_vjit']=='list_of_exams'){
                    //             $table_present=1;
                    //             break;
                    //         }
                            
                    //     } 
                    // } 
                    //     if($table_present==1)
                    //     { 
                    //         $stmt=mysqli_query($conn,"SELECT * FROM list_of_exams;");
                    //          while( $rows=mysqli_fetch_assoc($stmt)){
                    //             if($rows['exam_name']==$exam_name){
                    //                 echo"<script>alert('exam is already created');</script>";
                    //                 $is_exam_already_created=1;
                    //             }
                    //         }
                    //     }
                    //     else if($table_present==0)
                    //     {
                    //         if(mysqli_query($conn,"CREATE table list_of_exams (sno int NOT NULL AUTO_INCREMENT,exam_name varchar(100),pass_percent int,PRIMARY KEY(sno));")){
                    //             $table_present=1;
                    //             $is_exam_already_created=0;
                    //         }
                                
                    //     }
  
                    //     if( $is_exam_already_created==0)
                    //     {
                            
                    //         $sql="INSERT INTO list_of_exams ( exam_name, pass_percent) VALUES ('$exam_name',$pass_percent);";
                        
                    //         if(mysqli_query($conn,$sql) ){
    
                    //             if(mysqli_query($conn,"CREATE table ".$exam_name." (sno int NOT NULL AUTO_INCREMENT,question varchar(100),option1 varchar(100),option2 varchar(100),option3 varchar(100),option4 varchar(100),correctoption int,PRIMARY KEY(sno));"))
                    //             echo"<script>alert('exam is created start adding questions');</script>";
                    //         }
                    //     }
                       
                    }
                        
                
            ?>

    </body>
</html>