<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
/*
$server = "database-1.crxqfck7ken2.ap-south-1.rds.amazonaws.com";
$username = "admin";
$password = "skillrush";
$db = "vjit";*/
if(!($conn = new mysqli($server, $username, $password, $db)))
{
     die(' connection failed ! --> '.mysqli_connect_error());
}
?>
