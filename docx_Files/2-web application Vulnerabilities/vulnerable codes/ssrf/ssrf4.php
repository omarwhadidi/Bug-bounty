
<?php 

/*if (isset($_POST['url'])) {

    $link = $_POST['url'];
    $filename = './images/'.rand().'txt';
    $curlobj = curl_init($link);
    $fp = fopen($filename,"wb");
    curl_setopt($curlobj, CURLOPT_FILE, $fp);
    curl_setopt($curlobj, CURLOPT_HEADER, 0);
    curl_exec($curlobj);
    curl_close($curlobj);
    fclose($fp);
    $fp = fopen($filename,"r");
    $result = fread($fp, filesize($filename)); 
    fclose($fp);
    echo $result;
}*/


if (isset($_POST['url']))
{
    $link = $_POST['url'];
    $curlobj = curl_init();
    curl_setopt($curlobj, CURLOPT_POST, 0);
    curl_setopt($curlobj,CURLOPT_URL,$link);
    curl_setopt($curlobj, CURLOPT_RETURNTRANSFER, 1);
    $result=curl_exec($curlobj);
    curl_close($curlobj);
     
    $filename = './images/'.rand().'.txt';
    file_put_contents($filename, $result); 
    echo $result;
}

?>

<html>
<body>
<form action="" method="post">
<h2>  Upload image through url<br>
 <input type="text" style="font-size: 14;width:450px;" name="url" placeholder="http://example.com" />
 <br>
 <input type="submit" value="Submit">
</form>
</body>
</html>

 

