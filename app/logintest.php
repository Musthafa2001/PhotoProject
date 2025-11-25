<?php

include_once "libs/load.php";

$username="musthafa";
$pass="123456789";

if(session::isset('session_token')){
    print("welcome Back $username");
    $usrobj=UserSession::authorized(session::get('session_token'));
    


}
else{
    print("Trying to login");
    $login=UserSession::authentication($username,$pass);

}