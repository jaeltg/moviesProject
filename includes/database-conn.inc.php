<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "Movies";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

 
if(!$conn){
	die("Error: Cannot connect to the database");
}

?>