<html>
 <head>
  <title>Unvalidated Redirects and Forwards</title>
 </head>
 <body>
 <?php 

	$salt = "c0mpl1cat3d";

	$hashed_url = urlencode(hash("md5", $salt."http://securitytube.net"));

	echo '<p>Please visit <a href="redirect.php?url=http://securitytube.net&hash='.$hashed_url.'" >SecurityTube.net</a> for fantastic Infosec Videos</p>'; 

?> 
 </body>
</html>

