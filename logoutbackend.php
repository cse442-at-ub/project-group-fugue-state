<?php

require "connect.php";

if (getInfo("logout") == "true"){
    session_start();
    session_unset();
    session_destroy();
    $message = "Logout successful";
    popUp($message);
    redirectPage($homePath);
    exit();
}

?>