<?php
session_start();
date_default_timezone_set('Asia/Kolkata');
// if(!isset($_SESSION['end_time']))
// http_response_code(555);
$from_time1=date("y-m-d H:i:s");
$to_time=$_SESSION['end_time'];

$timefirst=strtotime($from_time1);
$timesecond=strtotime($to_time);

$diff=$timesecond-$timefirst;
 $t=gmdate("H:i:s",$diff);
if($t=='00:00:00')
{
    $_SESSION['finished']=1;
   // echo gmdate("H:i:s",$diff);
}
if( $_SESSION['finished']==0){
echo $t;}
else{
    echo"finished";
    unset($_SESSION['end_time']);
    unset($_SESSION['start_time']);
}
?>