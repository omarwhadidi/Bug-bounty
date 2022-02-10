<?php 

// Here we parse Data From XML File then Insert it into Database

include 'db_connect.php';



if(isset($_POST['buttonImport'])) {
	copy($_FILES['xmlFile']['tmp_name'],
		'uploads/'.$_FILES['xmlFile']['name']);
	$posts = simplexml_load_file('uploads/'.$_FILES['xmlFile']['name']);
	
	foreach($posts as $post){

		$stmt = $conn->prepare("INSERT INTO feedback ( username, feedback) VALUES ( ?, ?);");

   		
   		$stmt->execute(array($post->username,$post->post));
	


	}
}


?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
	XML File <input type="file" name="xmlFile">
	<br>
	<input type="submit" value="Import" name="buttonImport">
</form>
<br>
<h3>Product List</h3>
<table cellpadding="2" cellspacing="2" border="1">
	<tr>
		<th>Id</th>
		<th>Name</th>
		<th>Price</th>
		<th>Post Date</th>
	</tr>
	<?php 



$sql = "SELECT * FROM feedback";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($post = $result->fetch_assoc()) {
    echo "
    	<tr>
			<td> ".$post['feedback_id']." </td>
			<td> ".$post['username']." </td>
			<td>  ".$post['feedback']." </td>
			<td>  ".$post['Feedback_date']." </td>
		</tr>";
  }
} else {
  echo "0 results";
}

$conn->close();


?>
</table>

