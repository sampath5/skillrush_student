<?php
$url = parse_url(getenv("https://www.cleardb.com/database/details?id=59FB37C4CF0D8D262D52412313A05AA4"));

$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);

$conn = new mysqli($server, $username, $password, $db);
?>
