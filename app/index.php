<?php
include_once "libs/load.php";

if (isset($_GET['logout'])) {
    if (session::isset('session_token')) {
    }
    session::destroy();
    header("location: index.php");
    die();
} else {
    Session::renderpage();
}
