<?php

	header('Location: '.urldecode($_GET["url"]));
	//header('Location: '.urldecode($_GET["url"]));   --> Double URL Encoding 
	//header('Location: '.base64_decode(urldecode($_GET["url"])));  -->  Base64 Encoding 
	die();

?>

