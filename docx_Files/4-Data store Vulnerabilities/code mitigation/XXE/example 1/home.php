<?php 

// Fix Headers Already Sent Error (First Thing in the Page)
ob_start();    

// Start the session
session_start();
session_regenerate_id();  // session fixation Prevention

if (!isset($_SESSION['username'])){
	
	header("Location: login.php");
	exit();        // To prevent Unvalidated Redirection
}




?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	<link rel="stylesheet" href="css/home.css">
</head>
<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Website Title</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				
				<form action="logout.php" method="POST" display="inline">
					<i class="fas fa-sign-out-alt"></i>
				    <input type="submit" name="logout" value="Logout" />
				</form>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome back, <?=$_SESSION['username']?>!</p>

			<?php



			include('db_connect.php');

			$name = $_SESSION['username'];

			$sql="select * FROM users where username='$name'  ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {   // == 1 use LIMIT for sql
			
			  	  // output data of each row
				  echo 'This is your Data: </br></br>'; 
				  while($row = $result->fetch_assoc()) {
				    
				    echo "- id: " . $row["id"]. " <br> - Name: " . $row["username"]. " <br> - Email: " . $row["email"]. "<br> - Gender : " .$row["gender"].  "<br>". "- IP Address : " .$row["client_ip"]."<br>";

				  }

			} else {
			  echo "0 results" ;
			}

			?>

			<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<textarea name="message"></textarea>
				<input type="submit" name="send" value="feedback" />
			</form>
		</div>
	
		<p>Edit Your Data <a href="Edit_account.php">Edit</a> </p>


	</body>
</html>
<?php 

	if (isset($_POST['send'])){

		if(!empty($_POST['message'])){

			$message= $_POST['message'];
			$name = $_SESSION['username'];

			 $sql=" INSERT  INTO feedback (username, feedback) VALUES ('$name', '$message')";


			 if (!$conn->query($sql) === TRUE) {
			 	echo "Error: " . $sql . "<br>" . $conn->error;
			 	exit();
			 }
			 else {
			 	echo 'Feedback Sent Successfully';
			 }

		}
		else {
			echo 'please specify a message First';
		}
	}

ob_end_flush(); // Fix Headers Already Sent Error
?>