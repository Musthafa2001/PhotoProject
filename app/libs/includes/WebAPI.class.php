<?php 
class WebAPI{
    public function __construct(){
        Database::getConnection();
    }
    public function initiatesession(){
        Session::start();
        
        if(session::isset('session_token')){
            try{
            session::$usersession= UserSession::authorized(Session::get('session_token'));
            // session::set( "usersession",session::$usersession);
                
            }
            catch(Exception $e){
                // TODO: handle the session;
                return false;
            }

            
        }
    }
}
?>