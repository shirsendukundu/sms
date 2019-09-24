<?php
// for getting subdomain *.ci.local
$url = $_SERVER['HTTP_HOST'];

$parsedUrl = parse_url($url);

$host = explode('.', $parsedUrl['path']);

$subdomain = $host[0];
//echo $subdomain;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = $subdomain ;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
	}
	?>