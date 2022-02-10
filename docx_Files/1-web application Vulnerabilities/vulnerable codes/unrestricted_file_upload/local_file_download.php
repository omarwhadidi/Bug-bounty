<?php
/*   if(isset($_GET['file'])){
   
        $file = $_SERVER["DOCUMENT_ROOT"]. $_REQUEST['file'];
    	header("Pragma: public");
     	header("Expires: 0");
     	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
     	header("Content-Type: application/force-download");
        header( "Content-Disposition: attachment; filename=".basename($file));
       //header( "Content-Description: File Transfer");
       @readfile($file);
       die();

  }*/



if(isset($_GET['path']))
{	
	$filename = $_GET['path']; //Read the filename
	
	//Check the file exists or not
	if(file_exists($filename)) {

		//Define header information
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header("Cache-Control: no-cache, must-revalidate");
		header("Expires: 0");
		header('Content-Disposition: attachment; filename="'.basename($filename).'"');
		header('Content-Length: ' . filesize($filename));
		header('Pragma: public');


		flush(); //Clear system output buffer
		readfile($filename); //Read the size of the file
		die(); //Terminate from the script
	}
	else{
		echo "File does not exist.";
	}


}
else {
	echo "Filename is not defined."; 
}
?>
