<?php
class Database
{
    public static $connection = null;

    public static function getConnection()
    {
        if (Database::$connection == null) {

            $servername ="192.168.29.229";
            $username = "user";
            $password = "password";
            $dbname = "db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                  print("not connected");
                die("Connection failed: " . $conn->connect_error);
            } else {
                Database::$connection = $conn;
                print("connected");
                return $conn;
            }
        } else {
            print("existing connection");
            return Database::$connection;
        }
    }
    


}


