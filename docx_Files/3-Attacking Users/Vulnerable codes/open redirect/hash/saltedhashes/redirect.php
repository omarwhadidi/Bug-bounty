<?php

	$salt = "abc";

	$url = urldecode($_GET["url"]);

	$hash = urldecode($_GET["hash"]);

	if ( $hash == hash("md5", $salt.$url) )
	{
		header('Location: '.$_GET["url"]);
	}
	else
	{

		echo 'Invalid Redirect URL';
	}

	die();

?>

