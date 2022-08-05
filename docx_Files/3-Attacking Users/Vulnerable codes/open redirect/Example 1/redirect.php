<?php

	# direct & XSS
	if( isset($_GET['url'])) {
		header ("location: ".$_GET['url']);
		// echo "<h1 id=h1>".$_GET['url']."</h1>";
		die();
	}

	if( isset($_GET['url1'])) {
		header('Location: '.urldecode($_GET["url1"]));                 // --> Double URL Encoding 
		//header('Location: '.urldecode(urldecode($_GET["url1"])));    // --> Double URL Encoding 
		//header('Location: '.base64_decode(urldecode($_GET["url1"]))); // --> Base64 Encoding 
		die();
	}

	# TLD
	if( isset($_GET['url2'])) {
		header ("location: http://google.com".$_GET['url2']);
		// echo "<h1 id=h1>http://google.com".$_GET['url2']."</h1>";
	}
	
	
	# [\ or \\ , [#] , [without //]
	if( isset($_GET['url3'])) {
		if(substr($_GET['url3'],0,4) == "http" || substr($_GET['url3'],0,4) == "https") {
			if(strpos($_GET['url3'],".google.com") !== false ){ # don't forget dots
				// echo "<h1 id=h1>".$_GET['url3']."</h1>":
				header ("location:".$_GET['url3']);
			}
		}
	}
	
?>

