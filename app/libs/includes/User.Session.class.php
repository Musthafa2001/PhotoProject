<?php

use function PHPSTORM_META\type;

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
VALUES ('$user->id', '$token', now(), '$ip', '$agent', '1')";
            if($conn->query($sql)){
                Session::set('session_token',$token);
                return $token;
            }
        }
        else{
            return false;
        }


    }

public static function authorized($token){
    
   $session_user=new UserSession($token);

}



public function __construct($token)
{
        $conn=null;
        $uid=null;
        $this->$conn=Database::getConnection();
        $this->$token=$token;
        // print($token);
        $sql="SELECT * FROM `usersession` WHERE `token` ='$token'";
        //  print($sql);
    
        $result = $this->$conn->query($sql);
        // print_r($result);
      
        if ($result->num_rows==1){
            // print("hello");
            $row=$result->fetch_assoc();
            // print_r($row);
            $this->$uid=$row['uid'];
            print($this->$uid);
           
            return $this->$uid;
        }
        else{
            throw new Exception("session is invalid");
        }
}






}




?>