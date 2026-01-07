<?php
class Database
{
    public static $conn = null;
    public static function getConnection()
    {

        if (Database::$conn == null) {

            $servername = "192.168.29.172";
            $username = "user";
            $password = "password";
            $dbname = "db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            else{
                print("connected");
                Database::$conn=$conn;
                return $conn;
            }


        } else {
            return Database::$conn;
        }
    }
}
