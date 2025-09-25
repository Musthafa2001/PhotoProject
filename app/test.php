

<?php 
$servername = "192.168.29.229";
$username = "user";
$password = "password";
$dbname = "db";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else{
    print("connected successfull");
}

?>

