<?php
class User
{

    public static function signup($user, $pass, $email, $phoneno)
    {
        $conn = Database::getConnection();
        $pass=md5($pass);
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


    public static function logIn($username,$password){
        $conn=Database::getConnection();
        $sql = "SELECT * FROM `auth` WHERE `username` ='$username'";
        
      $result = $conn->query($sql);

      if ($result->num_rows ==1) {
  // output data of each row
    $row = $result->fetch_assoc();
    if($row['password']==$password){
       return $row;
    }
    else{
        return false;
    }
   
  }
 else {
  echo "0 results";
}

    }
}
