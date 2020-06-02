<?php
session_start();
?>

<html>
    <head>
    </head>
<body onload="extended_menu()">  
            <?php
                if(!isset($_GET['search']))
                {
            ?>
                    <div class="row1" id="row1" style="background-color:black;">
                        <h4 id="h1"><B>STUDENTS</B></h4>

                    </div>
                     
                    <div class="row2" id="row2" style="background-color:rgb(235, 229, 219);">
                        
                    <span id='search_name'>Search</span>  <input type="text"  id='search' onkeyup='search_student(this.id)'>
                     <br><br>
                     <div id='data'>
                <?php
                }
                ?>
                   
                    <?php
                    include_once 'dbconnect.php';

                    if(isset($_GET['search']) && $_GET['search']!=''){
                        $search=$_GET['search'];

                        $query="SELECT * FROM `students_list` WHERE concat(`Name`,`Email`,`RollNo`,`Branch`) LIKE '%$search%'";
                        $res=mysqli_query($conn,$query);
                        //if($res!=null)


                        echo" <table id='list'  class='table table-striped table-bordered table-hover table-condensed'>";
                        echo"<th>Roll num</th><th>Name</th><th>Email id</th><th>Branch</th>";
                        while($row=mysqli_fetch_assoc($res)){
                        
                            echo"<tr>";
                            echo"<td>".$row['RollNo']."</td>";
                            echo"<td>".$row['Name']."</td>";
                            echo"<td>".$row['Email']."</td>";
                            echo"<td>".$row['Branch']."</td>";
                            echo"</tr>";
                        }
                        echo" </table>";
                    }
                    else{
                    $query='SELECT `RollNo`,`Name`,Email,Branch from students_list';
                    $res=mysqli_query($conn,$query);
                    //if($res!=null)


                    echo" <table id='list'  class='table table-striped table-bordered table-hover table-condensed'>";
                    echo"<th>Roll num</th><th>Name</th><th>Email id</th><th>Branch</th>";
                    while($row=mysqli_fetch_assoc($res)){
                       
                        echo"<tr>";
                        echo"<td>".$row['RollNo']."</td>";
                        echo"<td>".$row['Name']."</td>";
                        echo"<td>".$row['Email']."</td>";
                        echo"<td>".$row['Branch']."</td>";
                        echo"</tr>";
                    }
                    echo" </table>";
                    }
                    ?>

                    </div>
                </div>
                
</body>