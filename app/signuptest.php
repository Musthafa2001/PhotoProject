<?php
include_once "libs/load.php";
// print("hello");

$username="mm";
$password="Eclair@";
$email="mm@gmail.com";
$phoneno="123456789";

$result=Database::getConnection();
$sql="INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `blocked`, `active`)
VALUES ('$username', '$password', '$email', '$phoneno', '0', '0');";
    
if (Database::$connection->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}




