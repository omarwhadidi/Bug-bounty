<?php
$session start();

$_SESSION['islogin'] = 1;

if($_SESSION['islogin'] != 1){
	header ("Location: login.php");
	die();
}

$origin = @$_SERVER['HTTP ORIGIN'];

 header ("Content-Type: application/json");
 header ("Access-Control-Allow-Origin: " .$origin);
 	// header ("Access-Control-Allow-Origin: mydomain.com");
 	// attack =  origin : attackermydomain.com / attacker-mydomain.com
 header ("Access-Control-Allow-Credentials: true");

 echo ' {"name":"Guest user" , phone number": "0234235" , "email":"email@gmail.com" , "address" : "street 3",
"own books": ["Book one", "Book two" ,"Book three"], "private books": ["book 4","book5"]}'


?>