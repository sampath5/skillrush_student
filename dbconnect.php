<?php
/*$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
{heroku details}
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
*/
$server = "database-1.cigyk57c3ye9.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "skillrush";
$db = "database-1";
$conn = new mysqli($server, $username, $password, $db);
?>
