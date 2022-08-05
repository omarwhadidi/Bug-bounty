<?php
session_start();

// Method 1 [whitelisting]

$list = ["file1.php" , "file2.php" , "file3.php"] ;
$file = "file1.php";

if(in_array($list, $_GET[ 'page'])){
	// The page we wish to display
	$file = $_GET[ 'page'];
}

// Only allow include.php or file{1..3}.php
// if( $file != "include.php" && $file != "file1.php" && $file != "file2.php" && $file != "file3.php" ) {
	// This isn't the page we want!
	// echo "ERROR: File not found!";
	// exit;
// }




// Method 2 [User cant control the File included]

include("file1.php");




?>
