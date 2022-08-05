<?php
session_start();

if($_SESSION['islogin'] != 1){
	header ("Location: login.php");
	die();
}

if (isset($_POST['submit'])) {
	
	// echo 'valid Form Submitted';	
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