
<html>
<head>
	<title></title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
	  <label>Your query</label>	 
	  
	  <input type="text" name="search" >
</form>

</body>
</html>


<?php
  if(isset($_GET['search']))
  	{echo '<input type="text" value=' . $_GET['search'] . '></input>';

}

?>