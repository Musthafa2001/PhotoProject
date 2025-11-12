<?php

class Database
{


    public static $connection = null;
    public static function getConnection()
    {
    
        
        if (Database::$connection == null) {
            $servername = "192.168.29.173";
            $username = "user";
            $password = "password";
            $dbname = "db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } else {
                Database::$connection = $conn;
                
                return Database::$connection;
            }
        } else {
            return Database::$connection;
        }
    }
}
