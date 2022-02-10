<?php

	echo "File included: ".$_REQUEST["file"]."<br>";
	echo "<br><br>";
	$remote_file =  $_REQUEST["file"].".html";
	echo "Remote file to be fetched: ".$remote_file;
	echo "<br><br>";

	include $remote_file;

?>


