<?php
session_start();

if (isset($_SESSION['token']) && isset($_POST['submit'])) {
	
	// echo 'valid Form Submitted';
	
	if ($_POST['token'] != $_SESSION['token']) {
		die 'Error: invalid token';
	}
	else {
		echo 'valid token';
		
		// Write code to store data in database
	}
} else {

	die 'Error: Mising Paramters';
}
?>

<!-- 

session_start();
if (
!array_key_exists("token", $_SESSION) ||
!array_key_exists("token", $_POST) ||
$_SESSION["token"] !== $_POST["token"] 
) {
	die("Sorry, no CSRF for me, thanks!");
}
 -->