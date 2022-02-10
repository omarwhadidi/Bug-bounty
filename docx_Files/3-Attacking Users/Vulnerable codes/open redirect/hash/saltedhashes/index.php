<html>
 <head>
  <title>Unvalidated Redirects and Forwards</title>
 </head>
 <body>
 <?php 

	$salt = "abc";

	$hashed_url = urlencode(hash("md5", $salt."http://securitytube.net"));

	echo '<p>Please visit <a href="redirect.php?url=http://securitytube.net&salt='.$salt.'&hash='.$hashed_url.'" >SecurityTube.net</a> for fantastic Infosec Videos</p>'; 

	echo '<pre>';
	print_r(hash_algos());
	echo '</pre>';
?> 
 </body>
</html>

