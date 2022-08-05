<html>
 <head>
  <title>Unvalidated Redirects and Forwards</title>
 </head>
 <body>
 <?php 

	$hashed_url = urlencode(hash("md5", "http://securitytube.net"));

	echo '<p>Please visit <a href="redirect.php?url=http://securitytube.net&hash='.$hashed_url.'" >SecurityTube.net</a> for fantastic Infosec Videos</p>'; 

	echo '<pre>';
	print_r(hash_algos());
	echo '</pre>';
?> 
 </body>
</html>

