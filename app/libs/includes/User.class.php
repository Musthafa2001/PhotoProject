<?php

class User
{
    public $conn=NULL;
    public $id=NULL;
    public function __call($name, $arguments)
    {
        $property=substr($name,0,3);
        if(substr($name,0,3)=="get"){
            
            return $this->__gets($property);
        

        }
        elseif(substr($name,0,3)=="set"){
            return $this->__sets($property);

        }
        else{
            throw new Exception("user::call -> $name");
        }
            
        
    }

    public function __construct($username)
    {
     
        $this->conn=Database::getConnection();
        $this->$username=$username;
        $sql="SELECT * FROM `auth` WHERE `username` = 'musthafa' OR `id`=$username LIMIT 50";
        $result = $this->conn->query($sql);
        if ($result->num_rows ){
            $row=$result->fetch_assoc();
            $this->id=$row['id'];


        }
        else{
            throw new Exception("Username doesn't exist");
        }

    }
    public function __gets($var){ 
        if(!$this->conn){
            $sql="SELECT `$var` FROM `users` WHERE `id` = '$this->id' LIMIT 50";
              $result = $this->conn->query($sql);
        }
          if ($result->num_rows==1 ){
            $row=$result->fetch_assoc()["$var"];
           

        }
        else{
           return null;
        }

    }
    public function __sets(){

    }


    public static function signup($user, $pass, $email, $phoneno)
    {
        $conn = Database::getConnection();
        // $pass=md5($pass);
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
    
      if ($result->num_rows==1) {
    $row = $result->fetch_assoc();
    if($row['password']==$password){
       return $row['username'];
    }
    else{
        return false;
        print("pass not matching");
    }
   
  }
 else {
  echo "0 results";
}

    }


 





}
