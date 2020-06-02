<?php
    session_start();
    if(isset($_SESSION['start_time'])){}
    else
    header('location:cant.html');
?>
<html>
<head>
  <style>
    .button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #410056;
  margin-left:100px;
  padding:12px 20px;
  font-size:14px;
  
}

.button2:hover {
  background-color:#410056;
  color: white;
  opacity:1;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
}
</style>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/edfedfffe1.js" crossorigin="anonymous"></script> 
    
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
      
        <link rel="stylesheet" href="stylingforstudentexampage.css">
      
       
  
               <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"> </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  
  
               
</script>
</head>
<script>
   var review_enable=0;
   function clear_response(obj){
       var d=document.getElementsByName(obj);
       var sno='';
       for(i=5;i<obj.length;i++)
           sno=sno+obj[i];
       var k='b'+sno;

       for(i=0;i<d.length;i++){
           if(d[i].checked==true)
               d[i].checked=false;
       }
      if(review_enable==0)
       document.getElementById(k).style="background-color:#D61A46";
   }

   function review(obj){ 
        review_enable=1;
       document.getElementById(obj).style="background-color:blue";
   }
   function answered(obj){
       review_enable=0;
       document.getElementById(obj).style="background-color:green";
   }

  
       document.onkeydown = function(e) {
       if(event.keyCode == 123) {
       return false;
       }
       if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){ //inspect
       return false;
       }
       if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){ //inspect
       return false;
       }
       if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){ // view sourcecode
       return false;
       }
       if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)){ //save
       return false;
       }
       if(e.ctrlKey && e.keyCode == 'H'.charCodeAt(0)){ //history 
       return false;
       }
       if(e.ctrlKey && e.keyCode == 'A'.charCodeAt(0)){ //select all
       return false;
       }
       if(e.ctrlKey && e.keyCode == 'F'.charCodeAt(0)){ //find
       return false;
       }
       if(e.ctrlKey && e.keyCode == 'E'.charCodeAt(0)){ //url
       return false;
       }
       if(e.ctrlKey && e.keyCode == 'C'.charCodeAt(0)){ //copy
       return false;
       }
       }
        
        

      
   var t;
   t=setInterval(function(){
       xmlhttp=new XMLHttpRequest();
       var k;
       xmlhttp.onreadystatechange=function(){
       if(this.readyState == 4 && this.status == 200) {
            
           k=this.responseText;
           document.getElementById('time').innerHTML=k;
           if(k=="finished"){
               document.getElementById('time').innerHTML="time finished";
               clear();
           }
         }
       };
       xmlhttp.open("GET","timer.php",true);
       xmlhttp.send();
   },1000);
   
  function clear()
  {    
   clearInterval(t);
    document.getElementById('btn-exam_submit').value='submit';
     document.getElementById('form1').action='response.php?btn-submit=true';
      document.getElementById('form1').submit();
  }
   

  $(document).ready(function(){
   $('#fullscreen').modal({backdrop: 'static', keyboard: false}) 
       $("#fullscreen").modal('show');
  });
    
 function fun_name()
   {
     var targetelement = document.documentElement;
    
     if (targetelement.requestFullscreen)
     {
       targetelement.requestFullscreen();
        
     }
     if (targetelement.webkitRequestFullscreen)
     {
       targetelement.webkitRequestFullscreen();
      
     }
     if (targetelement.mozRequestFullScreen)
     {
       targetelement.mozRequestFullScreen();
      
     }
     if (targetelement.msRequestFullscreen)
     {
       targetelement.msRequestFullscreen();
        
     }
   }

   document.onfullscreenchange = function ( event ) { 
       if(!document.fullscreen){
         $(document).ready(function(){
             $("#fullscreen").modal('show');
       });
       }
   }; 


 var tabchange=0;
 function checkPageFocus(){
 if(document.hasFocus()){}
 else{
     tabchange++;
 $(document).ready(function(){
         if(tabchange/2 < 5)
         { $('#modalcontent').html("Warning!If tab is changed again your exam will end. ");
         $("#focus").modal('show');}
         else
         clear();
     });
 }}

 function check(){
   document.getElementById('span').innerHTML="sec off focus="+tabchange/2;
 }

 setInterval(checkPageFocus, 500);
 setInterval(check, 300);
 </script>
<body oncontextmenu="return false;" >
<div class="topnav" id="myTopnav" class="navbar" style="background-color:#410056;">
<a class="navbar-brand" href="" style="margin-top:-15px;margin-bottom:-4px;margin-left:-8px;"><img src="skillrushn4.jpg" width="280" height="80" ></a>
  <span id="timeleft" style="margin-left:800px;color:white;">Time Left :</span>
  <span id="time" style="margin-top:20px;margin-left:5px;color:white;"></span>
</div>
<div class="container1" style="margin-top:0px;">


<div class="modal" id="fullscreen" >
    <div class="modal-dialog">
      <div class="modal-content">
      
      <div class="modal-body">
            Enter full screen to write exam.<br>
            Please click on OK to continue exam..
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick='fun_name()'>OK</button>
        </div>
        
      </div>
    </div>
  </div>

  <div class="modal" id="focus" >
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal body -->
        <div class="modal-body" id='modalcontent'>
            
            Tab monitoring is on. Be Carefull!!!
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick='fun_name()'>OK</button>
        </div>
        
      </div>
    </div>
  </div>

<div class="menu" style="background-color:#eee;">
<p style="text-align:center;margin:15px;"><b>QUESTION PANEL</b></p>

<div class="questionpanel" style="margin-top:40px;">
<?php
    //session_start();
    //if(isset($_SESSION['start_time'])){
     include_once 'dbconnect.php';
     $exam=$_SESSION['testexam'];
     $sql='select * from '.$exam;
     $res=mysqli_query($conn,$sql);
     $i=1;
     while($row=mysqli_fetch_assoc($res)){
        $v=$row['sno'];
        if($i<10)
            $i='0'.$i;
        $c=mysqli_num_rows($res);
        echo"<div><a href='#gh$v'><button id='b$v' class='button button5'>$i</button></a></div>";
        $i++;
     }
?>
    
</div>
</div>
<div class="content" style="background-color:#eee;overflow:scroll;">

    <?php
     include_once 'dbconnect.php';
     $sql='select * from '.$exam;
     //$_SESSION['testexam']=$exam;
     $res=mysqli_query($conn,$sql);
    
    //$_SESSION['user_exam']='16911A0513';
     $c=mysqli_num_rows($res);
    
    $i=1;
    ?>
    
    <form method='POST' id="form1" action='response.php'>
    <?php
    while($row=mysqli_fetch_assoc($res)){
        $v=$row['sno'];
    echo "<div class='polaroid'>";
        echo"<p id='gh$v'><br>".$i.". ".$row['question']."</p>"; 	
        
        echo" <div style='width:320px;margin-left:58px;'>";
                 echo"<label class='container'>".$row['option1'];
                echo"<input  type='radio'  name='radio".$v."' value=1 onchange=answered('b$v') >";
              
                echo"<span class='checkmark'></span>";
                echo"</label>";
                echo"<label class='container'>".$row['option2'];
                echo"<input  type='radio'  name='radio".$v."' value=2  onchange=answered('b$v') >";
              
                echo"<span class='checkmark'></span>";
                echo"</label>";
                echo"<label class='container'>".$row['option3'];
                echo"<input  type='radio'  name='radio".$v."' value=3 onchange=answered('b$v') >";
              
                echo"<span class='checkmark'></span>";
                echo"</label>";
                echo"<label class='container'>".$row['option4'];
                echo"<input  type='radio'  name='radio".$v."' value=4 onchange=answered('b$v') >";
              
                echo"<span class='checkmark'></span>";
                echo"</label>";
            echo"</div>";
            echo"<br>";
            echo" <button type='button' style='margin-left:60px;' class='button2' onclick=review('b$v')><b>MARK FOR REVIEW</b></button>";
            echo " <button type='button' style='margin-left:20px;' class='button2' onclick=clear_response('radio$v')><b>CLEAR RESPONSE</b></button>";
            echo"<br><br>" ;
        echo"</div>";
    $i++;
}
    
?>
<button class="button2" type='submit' style="margin-top:30px;margin-left:60px;padding:12px;width:15%;" name='btn-exam_submit' id='btn-exam_submit' form='form1' value='submit'><b>SUBMIT THE TEST</b></button>
</form>
    <!-- </form> -->

<br>

</div>
</div>
</body>
</html>