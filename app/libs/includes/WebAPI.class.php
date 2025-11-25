<?php 
class WebAPI{
    public function __construct(){
        Database::getConnection();
    }
    public function initiatesession(){
        Session::start();
        if(session::isset('session_token')){
            
        }
    }
}
?>