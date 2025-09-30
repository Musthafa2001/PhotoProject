<?php


class User
{

    public static function signup($user, $pass, $email, $phoneno)
    {
        $conn = Database::getConnection();

        $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `blocked`, `active`)
VALUES ('$user', '$pass', '$email', '$phoneno', '0', '0');";

        $error = false;

        if ($conn->query($sql) === TRUE) {

            $error = True;
        } else {
            $error = $conn->error;
        }

        return $error;
    }
}
