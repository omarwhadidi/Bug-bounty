<?php

	$page = $_REQUEST["page"];
	echo "File included: $page<br>";
	echo "<br><br>";
	$local_file =  "html/".$page.".html";
	echo "Local file to be used: ".$local_file;
	echo "<br><br>";

	include $local_file;

?>


