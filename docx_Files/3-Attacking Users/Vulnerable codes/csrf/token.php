<?php
session_start();
if (isset($_SESSION['token'])) {
	echo 'valid Form Submitted';
	if ($_POST['token'] != $_SESSION['token']) {
		echo 'invalid token';
	}
	else {
		echo 'valid token';
		// Write code to store data in database
	}
} else {

	echo 'inValid Form Submitted';
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