<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$databaseName = "onlinejobportal";

// Create connection
$conn = new mysqli($serverName, $userName, $password, $databaseName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>