<html>
 <head>
  <title>Unvalidated Redirects and Forwards</title>
 </head>
 <body>

<form action='hash.php' method="GET">
URL:<br>
<input type="text" name="url">
<br>
<input type="submit" value="Get Hash List">

</form>


<?php 

	$url = urldecode($_GET["url"]);

	if ($url)
	{

		foreach (hash_algos() as $hash_algo) {

			$url_hash = hash($hash_algo, $url, false);
			echo $hash_algo.'    '.$url_hash.'<br>';
			

		}

	}
?> 
 </body>
</html>

