<?php
		$count=0;
		
		if (isset($_FILES['fileToUpload']['tmp_name'])){
				//image variables
			$image_name=$_FILES['fileToUpload']['name'];
			$image_type=$_FILES['fileToUpload']['type'];
			$image_tmpname=$_FILES['fileToUpload']['tmp_name'];
			$image_size=$_FILES['fileToUpload']['size'];

			$allowed_extensions= array("jpeg","jpg","xml","svg");
			$blacklist= array("php","php1","php2","php3","php4","php5","php6","phps");

			$tmp = explode('.',$image_name );
			$image_extension = strtolower(end($tmp));
			 			//explode divide the array into smaller array after finding the .
						//end() get the final value of the array

				if(in_array($image_extension,$blacklist)){
                        echo "extention Not allowed!";
                        $count++;
                        exit(0);
                                }                             
				 if (!in_array($image_extension,$allowed_extensions )){
					echo "this extention is not allowed \n";
					$count++;
					exit(0);
				}
				
                if($_FILES['fileToUpload']['type'] != "text/xml" ){
	 				echo "content type Not allowed!";
	 				$count++;
	 				exit(0);
				 }
	
				if ($count ==0){
				        $target_file="uploads/".$image_name;
						move_uploaded_file($image_tmpname , "uploads/".$image_name);
						
						$myfile = fopen($target_file, "r") or die("Unable to open file!");
	    
	    					#reading file
	    					$xml= fread($myfile,filesize($target_file));
	    					//$doc = simplexml_load_string($xml);
	    
	    					#parsing XML
	    					//$oldValue = libxml_disable_entity_loader(true); // enable external entity 
	    					//$doc = simplexml_load_string($xml);
	    					libxml_disable_entity_loader(false);
	    
	    					#returning parsed data
	    					$doc = simplexml_load_string($xml, null, LIBXML_NOENT);
				}
				else {
				     echo "coudnt insert file";
				}

		}
		


?>

<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"></head><body>

<form action="" method="post" enctype="multipart/form-data" style="margin-left:30%;margin-top:10%;background-color:#e2e2e2;width:450px;padding:15px;border-radius: 20px;border: 2px solid black;">
   <p style="margin-left:30%;padding:10px;margin-top: 11px;">Select file to upload:</p>
    <input name="fileToUpload" id="fileToUpload" style="padding:1px;margin-left:30%;" type="file"><br><input value="Upload Contacts" name="submit" style="margin-top:20px;margin-left:125px;margin-bottom: 10px;" type="submit">
</form>

<div style="margin-left: 30%;background-color: black;width: 450px;padding: 15px;color: white;margin-top: 20px;border-radius: 20px;border: 2px solid #e2e2e2;">

<?php

if(isset($doc)){

	for($x=0;$x<count($doc->name);$x++){
    	
    	echo $doc->name[$x]." : ".$doc->num[$x]."\n<br>";
	
	}
}
else {

	echo "output";
}


?>

</div>

</body></html>