<?php

include_once "libs/load.php";

$username="musthafa";
$pass="123456789";

if(isset($_GET['logout'])){
    Session::destroy();

}


if(Session::get("is_loggedin")){
    $user=Session::get("session_username");
    print("welcome back $user");
    $userobj=new User($user);
}
else{
    printf("no session found, trying to login");
    $result=User::logIn($username,$pass);
    if($result){
        print("success");
        $userobj=new User($username);
        echo "Login Successs", $userobj->getusername();
        Session::set('is_loggedin',true);
        Session::set('session_username',$username);
        
    }
    else{
        print("Login Failed");
    }

}