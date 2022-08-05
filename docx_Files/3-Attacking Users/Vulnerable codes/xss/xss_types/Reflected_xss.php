<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="body_padded">
	<h1>Vulnerability: Reflected Cross Site Scripting (XSS)</h1>

	<div class="vulnerable_code_area">
		<form name="XSS" action="#" method="GET">
			<p>
				What's your name?
				<input type="text" name="name">
				<input type="submit" value="Submit">
			</p>

		</form>
		
	</div>
</body>
</html>


<?php
// Is there any input?
if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) {
    // Feedback for end user
    echo '<pre>Hello ' . $_GET[ 'name' ] . '</pre>';
}

?>
?>