<?php
include_once "includes/Database.class.php";

function loadtemplate($name){
    include_once $_SERVER["DOCUMENT_ROOT"]."/newapp/templates/$name.php";
}


?>