<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="css/main.css">
		<script src="https://www.google.com/recaptcha/api.js" async defer ></script>

	</head>
	<body>
		<div class="login">
			<h1>Login</h1>
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" >
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" autocomplete="off" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" autocomplete="new-password" required>

				<span>Remember me</span>
				<input type="checkbox" name="rememberme" Value="1">
				

				<input type="submit" name="Login" value="Login">
			</form>

			<a href="forget-password/password_reset.php" >Forget Password?</a>
		    <a href="register.php">Register</a>
		</div>
	</body>
</html>


<?php

// example 1



$example_int = 7;
$example_str = "7 abc";
if ($example_int == $example_str) {

   echo $example_int .' is the same as '. $example_str.' </br>';
}
else {

	echo $example_int .' is not the same as '. $example_str.' </br>';
}



// example 2

$example_int = 0;
$example_str = "abc";
if ($example_int == $example_str) {

   echo $example_int .' is the same as '. $example_str.' </br>';
}
else {

	echo $example_int .' is not the same as '. $example_str.' </br>';
}

// example 3

$values = array("apple","orange","pear","grape");
var_dump(in_array(0, $values));
//True
var_dump(in_array(0, $values, true));
//False
echo '</br>';

// example 4

if (hash('md5','240610708',false) == '0') {
  print "Matched \n ";
}
if ('0e462097431906509019562988736854' == '0') {
  print "Matched \n";
}




if (isset($_POST['Login']) ){

	if (!empty($_POST['username']) || !empty($_POST['password']) ) {
						
		// initializing Variables
		$name = $_POST['username'];
		$passwd = $_POST['password'];

		include('db_connect.php');


		$sql="select * FROM users where username='$name'  ";

		$result = $conn->query($sql);

		if ($result->num_rows == 1) {   // == 1 use LIMIT for sql
						
			echo '</br>user found</br>';		

	  	    // output data of each row
		  	while($row = $result->fetch_assoc()) {

			  	echo '</br>'.$row["username"].'</br>';

			  	if ($passwd == $row["password"]){

			  		echo 'matched';
			  	}
			  	else {

			  		echo 'doesnt match ';
			  }

			}

		}


	}

}





?>