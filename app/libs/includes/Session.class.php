<?php

class Session
{

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
        include $_SERVER["DOCUMENT_ROOT"]."/app/__template/$name.php";
    }


    public static function renderpage(){

        Session::loadtemplate("_master");
    }

    public static function currentscript(){
        return basename($_SERVER['PHP_SELF'],".php");
        
    }
    
    public static function authentication(){
        return true;
    }

}
