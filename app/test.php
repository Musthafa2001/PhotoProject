<?php
include_once "libs/load.php";

if(Session::isset('is_loggedin')){
    $userdata=Session::get('session_user');
    print('welcome back'.$userdata['username']);
    $result=$userdata;
}

else{
    print("NO session founct.. trying to login now");
    $result=User::logIn('musthafa','123456789');
    if($result){
        print('Login success'.$result['username']);
        Session::set('is_loggedin',true);
        Session::set('session_user',$result);

    }


}






?>