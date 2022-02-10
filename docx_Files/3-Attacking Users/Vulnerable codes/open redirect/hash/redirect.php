<?php

	$url = urldecode($_GET["url"]);

	$hash = urldecode($_GET["hash"]);

	if ( $hash == hash("md5", $url) )
	{
		header('Location: '.$_GET["url"]);
	}
	else
	{

		echo 'Invalid Redirect URL';
	}

	die();

?>

