<?php

	$id = $_GET["id"];

	if ($id == "1")
	{

		header('Location: http://securitytube.net');

	}
	else
	{

		echo "Invalid URL";

	}

	die();

?>

