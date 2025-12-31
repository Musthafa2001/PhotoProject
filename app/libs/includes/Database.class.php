<?php

class Database
{
    public static $connection = null;
    /**
     * To get the Database connection 
     */
    public static function getConnection()
    {


        if (Database::$connection == null) {
            $servername = db_config("db_servername");
            $username = db_config("db_username");
            $password = db_config("db_password");
            $dbname = db_config("db_name");

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                print("not conneted");
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
