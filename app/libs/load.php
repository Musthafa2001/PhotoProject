<?php

function load($name){
    include_once $_SERVER["DOCUMENT_ROOT"]."/app/__template/$name.php";
}

function validate($username,$password){
    if($username=="hello@gmail.com" and $password=="12345678"){
        return true;
    }
}

function signup($user,$pass,$email,$phoneno){

$servername = "192.168.29.229";
$username = "user";
$password = "password";
$dbname = "db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  
}

$sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `blocked`, `active`)
VALUES ('$user', '$pass', '$email', '$phoneno', '0', '0');";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
  return true;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}


?>