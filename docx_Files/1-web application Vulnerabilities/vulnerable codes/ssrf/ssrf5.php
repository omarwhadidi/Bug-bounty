<?php 

/*This code uses the fsockopen function to get the data (file or HTML) from the user's URL. This function uses a socket to establish a TCP connection with the server to transfer raw data*/

function GetFile($host,$port,$link) 
{ 
	$fp = fsockopen($host, intval($port), $errno, $errstr, 30); 
	if (!$fp) { 
		echo "$errstr (error number $errno) \n"; 
		} else { 
		$out = "GET $link HTTP/1.1\r\n"; 
		$out .= "Host: $host\r\n"; 
		$out .= "Connection: Close\r\n\r\n"; 
		$out .= "\r\n"; 
		fwrite($fp, $out); 
		$contents=''; 
		while (!feof($fp)) { 
			$contents.= fgets($fp, 1024); 
		} 
		fclose($fp); 
		return $contents; 
	} 
}
?>