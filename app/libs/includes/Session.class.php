<?php

class Session
{
    public static $user=null;
    public static $usersession=null;

    public static function start()
    {
        session_start();
    }

    public static function unset()
    {
        session_unset();
    }

    public static function destroy()
    {
        session_destroy();
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function isset($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function get($key, $default = false)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return $default;
        }
    }

     public static function loadtemplate($name){
        $script= $_SERVER["DOCUMENT_ROOT"]."/app/__template/$name.php";
        if(is_file($script)){
            include $script;
        }
        else{
            include $_SERVER["DOCUMENT_ROOT"]."/app/__template/_error.php";
        }
    }


    public static function renderpage(){

        Session::loadtemplate("_master");
    }

    public static function currentscript(){
        return basename($_SERVER['PHP_SELF'],".php");
        
    }

    public static function isAuthenticated(){
        if(is_object(session::getusersession())){
        return session::getusersession()->isvalid();
    }
    else{
        return false;
    }
}

    public static function getuser(){
        return session::$user;
    }
    public static function getusersession(){
        return session::$usersession;
    }

}
