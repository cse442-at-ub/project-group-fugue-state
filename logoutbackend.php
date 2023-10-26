<?php

if (getInfo("logout") == "true"){
    session_start();
    session_destroy();
    $message = "Logout successful";
    popUp($message);
    redirectPage($homePath);
    exit();
}

?>