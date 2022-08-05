<?php
$session start();

$_SESSION['islogin'] = 1;

if($_SESSION['islogin'] != 1){
	header ("Location: login.php");
	die();
}

// White Listing Domains
$origins = ["www.domain.com" , "dev.domain.com" , "api.domain.com" , "test1.domain.com"];

if (in_array($origins, $_SERVER['HTTP_ORIGIN'])){

	$origin = @$_SERVER['HTTP_ORIGIN'];
}
else {
	$origin = "www.domain.com";
}


 header ("Content-Type: application/json");
 header ("Access-Control-Allow-Origin: " .$origin);
 header ("Access-Control-Allow-Credentials: true");

 echo ' {"name":"Guest user" , phone number": "0234235" , "email":"email@gmail.com" , "address" : "street 3",
"own books": ["Book one", "Book two" ,"Book three"], "private books": ["book 4","book5"]}'


?>