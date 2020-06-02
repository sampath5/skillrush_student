
<!-- <script>
    function f(){

    }
</script> -->
<?php

session_start();
date_default_timezone_set('Asia/Kolkata');
unset($_SESSION['start_time']);
unset($_SESSION['end_time']);
include_once 'dbconnect.php';
if( ( isset($_POST['btn-exam_submit'])  || isset($_GET['btn-submit']) ) && isset($_SESSION['testexam']) )
{    

    $exam=$_SESSION['testexam'];
    
    $rollno=$_SESSION['roll_no'];
    
    $sql="select * from $exam";
   $res= mysqli_query($conn,$sql);
   // $row=mysqli_fetch_assoc($res);
   $c=mysqli_num_rows($res);
    while($row=mysqli_fetch_assoc($res)){
        $s=$row['sno'];
        $sel='radio'.$s;
        if(isset($_POST[$sel]))
        {
           // echo $_POST[$sel];
            $ans=$_POST[$sel];
            //echo "  sno= ".$s."ans= ".$ans."  \n";
            $sqli="INSERT into response_$exam (`rollno`, `sno`, `ans`) values ('$rollno',$s,$ans);";
           // echo " ".$sqli."\n";
            if(mysqli_query($conn,$sqli))
                {}
            
            else{
                echo"failed\n";
           }
        }
        
    }
//     unset($_SESSION['user_exam']);
        unset($_SESSION['testexam']);
        $ended=$_SESSION['endedtime']=date("y-m-d H:i:s");

    $st=$_SESSION['st'];
    $et=$_SESSION['et'];

        $quer="UPDATE `examsessions` SET `endtime`='$ended' WHERE rollno='$rollno' and exam_name='$exam'";
        if(mysqli_query($conn,$quer)){
            //echo $quer;
            header('location:Thankyou.html');
        }
//         $ip_address;
//         if (!empty($_SERVER['HTTP_CLIENT_IP']))   
//         {
//             $ip_address = $_SERVER['HTTP_CLIENT_IP'];
//         }
//         //whether ip is from proxy
//         elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
//         {
//             $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
//         }
//         //whether ip is from remote address
//         else
//         {
//             $ip_address = $_SERVER['REMOTE_ADDR'];
//         }
// echo $ip_address;
    
    echo $ended." # ".$st." # ".$et;
    //echo" <br>".$ip_address;
    
   //
}
else{
    header('location:cant.html');
    
}
?>