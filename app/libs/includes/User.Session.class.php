<?php

class UserSession
{

    public static function authentication($user,$pass){
        $username=User::logIn($user,$pass);
        if($username){
            $user=new User($username);
            $conn= Database::getConnection();
            $ip=$_SERVER['REMOTE_ADDR'];
            $agent=$_SERVER['HTTP_USER_AGENT'];
            $token=md5(rand(0,99999).$ip.$agent.time());
            $sql="INSERT INTO `usersession` (`uid`, `token`, `logintime`, `ip`, `useragent`, `active`)
VALUES ('$user->uid', '$token', now(), '$ip', '$agent', '1')";
s
            
        }
        else{
            return false;
        }


    }

public function __construct($id)
{
        $this->conn=Database::getConnection();
        $this->$id=$id;
        $sql="SELECT * FROM `usersession` WHERE `id` = '$id' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows){
            $row=$result->fetch_assoc();
            $this->id=$row['uid'];
        }
        else{
            throw new Exception("session is invalid");
        }
}

public function getuser(){
    return new User($this->uid);
}

}




?>