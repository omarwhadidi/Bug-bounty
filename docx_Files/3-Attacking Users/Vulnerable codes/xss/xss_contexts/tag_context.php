<!-- Reflective XSS -->
<html>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
	  <label>Your query</label>
	  <input type="text" name="query">
	 
	  
	  <input type="submit" name="send" value="Send">
	</form>
</html>
<?php
  if(isset($_GET['query']))
  	{echo "Could not find any pages when searching for ".$_GET['query'];}


?>

