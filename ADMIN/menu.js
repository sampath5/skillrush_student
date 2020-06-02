function shrinked_menu() {
         document.getElementById("menu1").innerHTML='<div class="sidenav" style="width:55px;"><a href="#" onclick="extended_menu();"><i class="fa fa-bars"></i></a><a href="Home.html" style="margin-top:30%;"><i class="fa fa-home"></i></a><a onclick="students()"><i class="fa fa-user-circle"></i></a><a onclick="exams()"><i class="fa fa-edit"></i></a><a onclick="results()"><i class="fa fa-trophy"></i></a><a onclick="questions()"><i class="fa fa-question-circle"></i></a></div>';
      
      }
 function extended_menu(){
        document.getElementById("menu1").innerHTML='<div class="sidenav" style="width:250px;"><a href="#" onclick="shrinked_menu();"><i class="fa fa-bars"></i></a><a href="Home.html" style="margin-top:30%;"><i class="fa fa-home"></i> HOME</a><a onclick="students()"><i class="fa fa-user-circle"></i> STUDENTS</a><a onclick="exams()"><i class="fa fa-edit"></i> EXAMS</a><a onclick="results()"><i class="fa fa-trophy"></i> RESULTS</a><a onclick="questions()"><i class="fa fa-question-circle"></i> QUESTIONS</a></div>';
     
       
      }  