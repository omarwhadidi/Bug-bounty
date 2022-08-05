<?php

 /* This code uses the file_get_contents function to get the image from the URL specified by the user. It is then saved to the hard disk with a random file name and presented to the user. */
if (isset($_POST['url'])){
    $content = file_get_contents($_POST['url']);
    $filename = './images/'.rand().'img.jpg';
    file_put_contents($filename, $content);
    $img = "<img src=\"".$filename."\"/>";
}
echo $img;
?>


<html>
<body>
<form action="" method="post">
<h2> HTML Viewer<br>
 <input type="text" style="font-size: 14;width:450px;" name="url" placeholder="http://example.com" />
 <br>
 <input type="submit" value="Submit">
</form>
</body>
</html>