<?php

	echo "File included: ".$_REQUEST["page"]."<br>";
	echo "<br><br>";
	$local_file =  "html/".$_REQUEST["page"];
	echo "Local file to be used: ".$local_file;
	echo "<br><br>";

	include $local_file;

?>


