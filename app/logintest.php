<?php

include_once "libs/load.php";
$username="musthafa";
$pass="123456789";


if(session::isset('session_token')){
   
    $usrobj=UserSession::authorized(session::get('session_token'));
     print("welcome Back $username");
     
    $a=time() - Session::get("last_activity");
  
    if($a>=10){
   
        session::unset();
        Session::destroy();
        print("Session is expired");
    }
    elseif($a<10){
        
        session::set("last_activity",time());
    }
}
   
else{
    print("Trying to login");
    $login=UserSession::authentication($username,$pass);
    // $timeout = 50;
    session::set("last_activity",time());

}






