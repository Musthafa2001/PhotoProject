<?php

include_once "libs/load.php";
$username="musthafa";
$pass="123456789";

if(session::isset('session_token')){
    $usrobj=UserSession::authorized(session::get('session_token'));
    // $a=session::get("user_session");
    print(" welcome Back ".session::$user->getfirstname()." ".session::$user->getlastname());
}

else{
    print("Trying to login");
    $login=UserSession::authentication($username,$pass);

}






