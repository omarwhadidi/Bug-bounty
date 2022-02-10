<?php

// ---------------- code Snippet 1 --------------------------//


if (isset($_GET['image_url'])){    # Check if the 'url' GET variable is set
	$url = $_GET['image_url'];

	$file = fopen($url, 'rb');    # Fetch the image from the user supplied URL
	
	header("Content-Type: image/png");    # Send proper header for png images
	
    fpassthru($file);  # Dump image file
}

# Notify user if he didn't enter a URL
echo 'Please enter image url with image_url parameter';


// ---------------- code Snippet 1 ---------------------------//




// ---------------- code Snippet 2 ---------------------------//

if(isset($_GET['page'])){
   
      $page=$_GET['page'];
      $vuln=fopen($page, "r") or exit("unable to open the specified file");
       //you can use "r", instead of "r+" but not "w","w+" as it clears the file , as well as "a","a+","x",and"x+" as they are not for file reading.
      while(!feof($vuln)) {
        echo fgets($vuln) . "<br \>";
      }

      fclose($vuln);

}

// ---------------- code Snippet 2 ----------------------------//


?>