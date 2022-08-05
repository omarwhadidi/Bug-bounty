<html>
<head>
	<title>stored xss</title>
	<style>
		* {
			margin:0px;
			padding:0px;
			box-sizing: border-box;
		}
		header {
			background-color:#7097EB;
			height:80px;

		}
		header h1 {
			color:#fff;
			text-align: center;
			line-height:66px;
		}
		main {
			height:500px;
			background-color:#F2F4F9;
		}
		.container {
			height:100%;
			width:50%;
			margin: auto;
			
		}
		form   {
			padding-top:20px;
			
		}
		form > div  {
			padding-top:3%;
			margin-left:2%;
		}

		form input[type="submit"] {
			width: 102px;
		    height: 31px;
		    background-color: #00A43E;
		    color: #fff;
		    border: none;
		    border-radius: 10px;
		}
		form textarea {
			width: 50%;
		    display: block;
		    height: 100px;
		    margin-top: 11px;
		    padding: 8px;
		    resize: none;

		}
		.result {
			margin-top:30px;
		}
		.result p {
			margin-top:10px;
			font-size:20px;
		}
	</style>
</head>
	<body>
		<header>
			<h1>stored xss</h1>
		</header>
		<main >
			<div class="container">
				<form action="" method="get">
					<div>
						<label for="un">username:</label>
						<input type="text" name="name" placeholder="please enter your username" id="un"/>
					</div>
					<div>
						<label for="comm">share your post:</label>
						<textarea id="comm" name="post" placeholder="whats on your mind?"></textarea>
					</div>
					<div>
						<label >level:</label>
						<select name="level">
							<option  value="level1">level 1</option>
							<option  value="level2">level 2</option>
							<option  value="level3">level 3</option>
							
						</select>
					</div>
					<div>
						
						<input type="submit" name="submit"  value="post" />
					</div>
				</form>
				<div class="result">
					<?php 
						// database variables
				 		$server_name="localhost";
				 		$sql_name="root";
				 		$sql_password="";
				 		$db_name="sql_injection";

				 		//connect to daba base
				 		// or mysqli_connect(host, username, password, dbname, port, socket)
				 		//mysqli_select_db($db_handle,$database_name);

				 		$conn = new mysqli($server_name,$sql_name,$sql_password,$db_name);
				 		if($conn->connect_error){
				 			die("coudnt connect to database".$conn->connect_error);
				 		}

				 		$q="SELECT * FROM xss ";
				 		$query=mysqli_query($conn,$q);
				 		$num_of_rows=mysqli_affected_rows($conn);
				 		for ($i=0 ;$i <$num_of_rows;$i++){
				 			$row=mysqli_fetch_assoc($query);
				 			echo $row['username']."<br/>";
				 			echo $row['post']."<br/>";
				 		}
					?>
				</div>
			</div>
		</main>
	</body>
</html>
<?php
 if ($_SERVER['REQUEST_METHOD'] == 'GET'){

 		function test_input($data){
 			$data = trim($data);
 			$data = stripslashes($data);
 			$data = htmlspecialchars($data);
 			$data = mysqli_real_escape_string($data);
 				return $data;
 			}
 		// database variables
 		$server_name="localhost";
 		$sql_name="root";
 		$sql_password="";
 		$db_name="sql_injection";

 		//connect to daba base
 		// or mysqli_connect(host, username, password, dbname, port, socket)
 		//mysqli_select_db($db_handle,$database_name);

 		$conn = new mysqli($server_name,$sql_name,$sql_password,$db_name);
 		if($conn->connect_error){
 			die("coudnt connect to database".$conn->connect_error);
 		}

 		$username=$post="";

 	if (isset($_GET['submit']) && $_GET['level'] == 'level1'){

 		$username=$_GET['name'];
 		$post=$_GET['post'];
 		if (!empty($username) && !empty($post)){
	 				$sql="INSERT INTO `xss` (`username`, `post`) VALUES ( '$username', '$post')";
	 		//INSERT INTO `xss` (`user_id`, `username`, `post`) VALUES (NULL, 'omar', 'hi');
	 		$query=mysqli_query($conn,$sql);
	 		if (!$query){
	 			echo "not inserted";
 				}
 		}
 		else {
 			echo "all fields are required";
 		}
 		
 	

 	}
 	if (isset($_GET['submit']) && $_GET['level'] == 'level2'){
 		$username=$_GET['name'];
 		$post=$_GET['post'];
 		echo"two";
 	}
 	if (isset($_GET['submit']) && $_GET['level'] == 'level3'){
 		$username=$_GET['name'];
 		$post=$_GET['post'];
 		echo"one";
 	}
 	if (isset($_GET['submit']) && $_GET['level'] == 'level4'){
 		$username=$_GET['name'];
 		$post=$_GET['post'];
 		echo"one";
 	}


 }

 ?>