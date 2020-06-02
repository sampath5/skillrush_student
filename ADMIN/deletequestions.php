<html>
<body onload="extended_menu()">

<div class="row1" style="background-color:rgb(255, 0, 0);">
               <h4><B>QUESTIONS</B></h4>
         </div>
         <div class="row2" style="display:inline;background-color:#f5f5f5;">

<?php

    include_once 'dbconnect.php';
    session_start();
 if( isset($_GET['deleteques']))
 {
     if(empty($_GET['select']))
     {
         //header("location:Questions.php");
         
     }
     else{
         
         $exam=$_SESSION['examcreated'];
         $list=explode(',',$_GET['select']);
         foreach($list as $s){
             $deletequery="DELETE from $exam WHERE sno=$s";
             
             if(mysqli_query($conn,$deletequery))
             {
                 echo $exam;
             }
             else{
                 
             }
         }
     }
 }
 
?>
         </div>
</body>
</html>