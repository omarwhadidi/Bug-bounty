<?php

// Is there any input?
if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) {

	// Get input
	$name = htmlspecialchars(addslashes($_GET[ 'name' ]);
	//$name = htmlentities(addslashes(( $_GET[ 'name' ]));

	// Feedback for end user
	$html .= "<pre>Hello ${name}</pre>";
}



?>
