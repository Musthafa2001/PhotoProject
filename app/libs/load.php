<?php

function load($name){
    include_once $_SERVER["DOCUMENT_ROOT"]."/app/__template/$name.php";
}

function validate($username,$password){
    if($username=="hello@gmail.com" and $password=="12345678"){
        return true;
    }
}

?>