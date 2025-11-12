<?php

include_once "libs/load.php";

$username="musthafa";
$pass="123456789";

// $a=UserSession::authentication($username,$pass);
// print($a);    

     
// }

// $a=user::logIn($username,$pass);
// print($a);

if(!Session::isset('session_token')){
    print(session::get('session_token'));
    $token_create=UserSession::authentication($username,$pass);
    print($token_create);
   

}
else{
 print(session::get('session_token'));
 $uid=UserSession::authorized(session::get('session_token'));


}

// $conns=Database::getConnection();
//   $sql="SELECT * FROM `usersession` WHERE `token` ='919984f963a8d34a6da820df687ae009'";
//         print($sql);
    
//  $result = $conns->query($sql);
//  print_r($result->fetch_assoc());



// if(Session::get("is_loggedin")){
//     $user=Session::get("session_username");
//     print("welcome back $user");
//     $userobj=new User($user);
// }
// else{
//     printf("no session found, trying to login");
//     $result=User::logIn($username,$pass);
//     if($result){
//         print("success");
//         $userobj=new User($username);
//         echo "Login Successs", $userobj->getusername();
//         Session::set('is_loggedin',true);
//         Session::set('session_username',$username);
        
//     }
//     else{
//         print("Login Failed");
//     }

// }