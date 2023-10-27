<?php

require "connect.php";

if (getInfo("logout") == "true"){
    global $homePath;
    session_start();
    session_destroy();
    $message = "Logout successful";
    popUp($message);
    redirectPage($homePath);
    exit();
}

?>