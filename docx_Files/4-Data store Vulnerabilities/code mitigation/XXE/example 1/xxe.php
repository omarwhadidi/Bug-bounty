<?php


//ini_set("display_errors",1);
include("db_connect.php");

$message = "";
$body = file_get_contents("php://input");


libxml_disable_entity_loader (true);   // Mitigation
$xml = simplexml_load_string($body,'SimpleXMLElement',LIBXML_NOENT);

    // Debugging
     //print_r($xml);

if(isset($xml->username)){

    $name = (string)$xml->username;
    echo $name;
}

if(isset($xml->password)){
    
    $passwd = (string)$xml->password;
}
        

    

if(isset($name) && $name != "" && $passwd) {

    // $name = mysqli_real_escape_string($conn, $name);
    // $passwd = mysqli_real_escape_string($conn, $passwd);
    
    $sql="select * FROM users where username='$name' and password='$passwd'  ";

    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {    // == 1 use LIMIT for sql

        session_start();
        $_SESSION['username'] = $name; 
        header('Location: home.php');
    }
   

}





$conn->close();



?>