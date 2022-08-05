<html>
 <head>
  <title>Unvalidated Redirects and Forwards</title>
 </head>
 <body>

<form action='salthash.php' method="GET">
URL:<br>
<input type="text" name="url">
<br>
<select name="salted">
<option value="none">none</option>
<option value="prepend">prepend</option>
<option value="append">append</option>
</select>
Salt: 
<input type="text" name="salt">
<br><br>
<input type="submit" value="Get Hash List">

</form>


<?php 

	$url = urldecode($_GET["url"]);
        $salted = urldecode($_GET["salted"]);
	$salt = urldecode($_GET["salt"]);

	if ($url)
	{

		$fullurl = $url;

		if($salted == "prepend")
		{
			$fullurl = $salt.$url;
		}
		elseif($salted == "append")
		{
			$fullurl = $url.$salt;

		}

		foreach (hash_algos() as $hash_algo) {

			$url_hash = hash($hash_algo, $fullurl, false);
			echo $hash_algo.'    '.$url_hash.'<br>';
			

		}

	}
?> 
 </body>
</html>

