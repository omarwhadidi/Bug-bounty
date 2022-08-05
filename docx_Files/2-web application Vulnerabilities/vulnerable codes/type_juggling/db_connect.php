<?php 

$servername="localhost";
$username="pentest";
$password="pentest";
$db_name="pentest";


// Create connection
$conn = new mysqli($servername, $username, $password , $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


?>