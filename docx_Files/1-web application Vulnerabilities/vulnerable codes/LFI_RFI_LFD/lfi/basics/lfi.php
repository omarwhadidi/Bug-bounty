<?php

	echo "File included: ".$_REQUEST["page"]."<br>";
	echo "<br><br>";
	// Input validation
	//$local_file = str_replace( array( "http://", "https://" ), "", $file );
	//$local_file = str_replace( array( "../", "..\\" ), "", $file );
	$local_file =  $_REQUEST["page"];
	echo "Local file to be used: ".$local_file;
	echo "<br><br>";

	include $local_file;

?>


