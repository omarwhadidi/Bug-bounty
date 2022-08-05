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


  <?php

	/*$ref = $_SERVER['HTTP_REFERER'];

	$theOrigins = array(
	'http://mysite.tld/?page_id=x1',
	'http://mysite.tld/?page_id=x2');

	$validRef = false;

	if (in_array($ref, $theOrigins)) {
	$validRef = true;
	}


	if (isset($_GET['passkey']) && ($_GET['passkey'] == 'thePasskey') &&  $validRef ) {


	//show html page


	} else {
	     //echo 'You are not supposed to access this page directly';
	     header('HTTP/1.0 403 Forbidden');
	     exit('Forbidden');
	}*/



/*		if( stripos( $_SERVER[ 'HTTP_REFERER' ] ,$_SERVER[ 'SERVER_NAME' ]) !== false ) {
		// Get input
		$pass_new  = $_GET[ 'password_new' ];
		$pass_conf = $_GET[ 'password_conf' ];

		...........Code...........

		}*/


	/*if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']!='')
		{
		  Code for sign up
		} 
		else 
		{
		 header("Location: ../register/register.php");
		 exit ();
		}*/







/*    //check for refering page to switch content based on referrer
    $referrer = $_SERVER['HTTP_REFERER'];
    if ($referrer == 'http://url.com' or $referrer == 'http://url-2.com') {
        	//Matches YES!
		
		 } else { 
		 	//Matches NO!
			 header( 'Location: http://www.url.com/no-soup-for-you/' ) ;
			 exit ();
		  } 

*/



      /*  if(strpos($_SERVER['HTTP_REFERER'], 'mysite.tld') !== false)
         { ... }

         if(stristr($_SERVER['HTTP_REFERER'], "conforming.php")) { 

         }
         Else {

         }*/


        
	
?>



