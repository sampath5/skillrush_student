<?php
session_start();
?>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- <script src="https://kit.fontawesome.com/edfedfffe1.js" crossorigin="anonymous"></script>  -->
        
		<link rel="stylesheet" type="text/css" href="cardstyle.css">
    <link rel="stylesheet" type="text/css" href="challenge.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="home.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"> </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- <script src='https://kit.fontawesome.com/a076d05399.js'></script> -->
  
  <link rel="stylesheet" href="stylingforstudent.css">

</head>
<body style="background-color:#f6f4f1;">
<div class="topnav" id="myTopnav" class="navbar" style="background-color:#410056;">
<a class="navbar-brand" href="shome.php" style="margin-top:-15px;margin-bottom:-22px;margin-left:-16px;"><img src="skillrushn4.jpg" width="280" height="80" ></a>
 
  <div class="dropdown">
    <button class="dropbtn" style="color:white;margin-top:12px;font-size:20px;"><i class='fas fa-align-justify'></i>
    </button>
    <div class="dropdown-content" style="right:2px;">
      <a href="settings.php">Settings</a>
      <a href="editpassword.php">Change Password</a>
      <a href="logout.php">Logout</a>
    </div>
  </div> 
  
  <a href="javascript:void(0);" style="font-size:25px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
		  
<!-- <div class="row">
  <div class="column">
    <div class="card">
      <h3>Card 1</h3>
      <p>jhsdvbikasfaouoofa</p>
      
    </div>
  </div>

  <div class="column">
    <div class="card">
      <h3>Card 2</h3>
      <p>jhsdvbikasfaouoofa</p>
      
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3>Card 3</h3>
	  <p>jhsdvbikasfaouoofa</p>
      <p></p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3>Card 4</h3>
      <p>hsgdhfghfdfghjklkjhgfd</p>
      
    </div>
  </div>
</div>  -->
<?php
include_once 'dbconnect.php';

$query="select * from list_of_exams;";
$res=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($res)){
    if($row['Enable']==1)
    {
        $exam_name=$row['exam_name'];
        
           echo"<div class='row'>";
                echo"<div class='col-xs-4 col-md-4 col-sm-4 col-lg-4'>";
                echo"<div class='column1'>";
                echo" <div class='flip-box'>";
                echo"<div class='flip-box-inner'>";
                echo"<div class='flip-box-front'>";
                echo"<h2>$exam_name exam</h2>";
                
                echo"</div>";
                echo"  <div class='flip-box-back'>";
                echo"<div class='center'>";
                echo"<form action='TestInstructions.php' method='post'>";
                echo"<h2><button class='btn readmore' name='take_exam' value='$exam_name'><Strong>Take Exam</strong></button></h2>";
                echo"</form>";
                echo"</div>";
            echo"</div></div></div></div></div>";
                                          
    }
}
?>
              <!-- <div class="row">
                <div class='col-xs-4 col-md-4 col-sm-4 col-lg-4'>
                  <div class="column1">
                      <div class="flip-box">
                          <div class="flip-box-inner">
                              <div class="flip-box-front">
                                <h2>Front Side</h2>
                                <p>lkfnqoi</p>
                                </div>
                              <div class="flip-box-back">
                                  <div class="center">
                                    <h2><button class="btn readmore"><Strong>Solve Challenge</strong></button></h2>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div> -->
    <!-- <div class='col-xs-4 col-md-4 col-sm-4 col-lg-4'>
      <div class="column1">
          <div class="flip-box">
              <div class="flip-box-inner">
                  <div class="flip-box-front">
                    <h2>Front Side</h2>
                    <p>lkfnqoi</p>
                    </div>
                  <div class="flip-box-back">
                      <div class="center">
                        <h2><button class="btn readmore"><Strong>Solve Challenge</strong></button></h2>
                      </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    <div class='col-xs-4 col-md-4 col-sm-4 col-lg-4'>
      <div class="column1">
        <div class="flip-box">
            <div class="flip-box-inner">
                <div class="flip-box-front">
                    <h2>Front Side</h2>
                    <p>ufygwihulhf</p>
                  </div>
                <div class="flip-box-back">
                  <div class="center">
                    <h2><button class="btn readmore"><Strong>Solve Challenge</strong></button></h2>
                    </div>
                  </div>
              </div>
          </div>
        </div>
      </div> -->

  </div>
</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

</script>
	</body>
</html>
