<?php

$file=$_GET['exam'];
header('Content_type: application/vnd.ms-excel');
header('Content-disposition: attachment;filename='.$file.'result.xls');
echo $_POST['texttype'];
?>