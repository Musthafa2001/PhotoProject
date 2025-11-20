<?php 
class WebAPI{
    public function __construct(){
        Database::getConnection();
    }
    public function initiatesession(){
        Session::start();
        // print(php_sapi_name());
        if(php_sapi_name()=="cli"){
            print("hello");

        }
        elseif(php_sapi_name()=="apache2handler"){
            // print("cool");

        }

    }
}
?>