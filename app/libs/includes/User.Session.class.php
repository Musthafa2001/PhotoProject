<?php

class UserSession
{
    public $conn = null;
    public $uid = null;
    public $userobj = null;
    public $data = null;
    public static function authentication($user, $pass)
    {
        $username = User::logIn($user, $pass);
        if ($username) {
            $user = new User($username);
            $conn = Database::getConnection();
            $ip = $_SERVER['REMOTE_ADDR'];
            $agent = $_SERVER['HTTP_USER_AGENT'];
            $token = md5(rand(0, 99999) . $ip . $agent . time());
            $sql = "INSERT INTO `usersession` (`uid`, `token`, `logintime`, `ip`, `useragent`, `active`)
VALUES ('$user->id', '$token', now(), '$ip', '$agent', '1')";
            if ($conn->query($sql)) {
                // print('token set');
                Session::set('session_token', $token);
                return $token;
            }
        } else {
            return false;
        }
    }

    public static function authorized($token)
    {
        $sess = new UserSession($token);
        if (isset($_SERVER['REMOTE_ADDR']) and isset($_SERVER["HTTP_USER_AGENT"])) {
            if ($sess->isValid()) {
                session::$user = $sess->getuser();
                // print(Session::$user->getfirstname());
                return $sess;
            }
        }
    }


    public function getipaddress(){
        return $this->data['ipaddress'];
    }

    public function removesession(){
        if(Session::isset('session_token')){
            session::unset();
            session::destroy();
        }
    }



    public function isvalid()
    {
        $loginTimestamp = strtotime($this->data['logintime']);

        $currentTimestamp = time();

        // 30 minutes in seconds
        $sessionLimit = 10;


        if (($currentTimestamp - $loginTimestamp) <= $sessionLimit) {
            //    print($currentTimestamp- $loginTimestamp);


            // echo "Session active";
            return true;
        } else {
            // session expired
            // echo "Session expired";
            return false;
            // optionally destroy session
            // session_destroy();
        }
    }




    public function __construct($token)
    {
        $this->conn = Database::getConnection();
        $token = $token;
        $sql = "SELECT * FROM `usersession` WHERE `token` ='$token'";
        $result = $this->conn->query($sql);


        if ($result->num_rows == 1) {

            $row = $result->fetch_assoc();
            // print_r($row);
            $this->data = $row;
            $this->uid = $row['uid'];
            // print($this->uid);

            return $this->uid;
        } else {
            throw new Exception("session is invalid");
        }
    }




    public function getuser()
    {

        return new User($this->uid);
    }


}
