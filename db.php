<?php
$server = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "covid";

// procedure, oo, PDO
$conn = new mysqli($server, $dbuser, $dbpassword, $dbname);
if ($conn->connect_error) {
	$result = array();
	$result['status'] = "failed";
	$result['errorno'] = "101";
	$result['errormsg'] = "db connect error";
	echo json_encode($result);
	exit;
} 