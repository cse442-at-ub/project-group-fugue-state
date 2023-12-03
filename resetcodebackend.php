<?php

require_once "connect.php";

function generate_reset(){
    global $conn;
    $randID = FLOOR(RAND()) + 100;
    $sql = "SELECT username FROM resetCodes WHERE code = '$randID'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        generate_reset();
    }else{
        return $randID;
    }
}

function send_reset($email){
    global $conn;
    //$email = getInfo("email");
    $sql = "SELECT username FROM logins WHERE email = '$email'";
    $result = $conn->query($sql);
    $username = $result->fetch_assoc()["username"];
    $code = generate_reset();
    $sql = "INSERT INTO resetCodes (username,email,code) VALUES ('$username','$email','$code')";
    $conn->query($sql);


    $msg = "Your reset code is: " . strval($code);
    $header = "Reset Code Gig App";
    mail($email,$header,$msg);

    session_start();
    $_SESSION["username"] = $username;
    echo "Reset code sent to email || \n";
    return true;
}

send_reset("breckenm@buffalo.edu");


?>