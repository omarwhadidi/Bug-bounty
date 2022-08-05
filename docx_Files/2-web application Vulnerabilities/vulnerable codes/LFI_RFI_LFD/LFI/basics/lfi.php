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

<?php

	echo "File included: ".$_REQUEST["page1"]."<br>";
	echo "<br><br>";
	$local_file =  "/var/www/html/".$_REQUEST["page1"];
	echo "Local file to be used: ".$local_file;
	echo "<br><br>";

	include $local_file;

?>


<?php

	$page = $_REQUEST["page2"];
	echo "File included: $page<br>";
	echo "<br><br>";
	$local_file =  "/var/www/html/".$page.".html";
	echo "Local file to be used: ".$local_file;
	echo "<br><br>";

	include $local_file;

?>