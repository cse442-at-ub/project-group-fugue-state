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

function missingFields($email){
    if (strlen($email) == 0){
        $message = "Please fill out all fields";
        popUp($message);
        return false;
    }  
    return true;
}

function send_reset(){
    global $conn;
    global $forgotPath;
    global $resetPath;
    $email = getInfo("email");

    if (missingFields($email) == false){
        redirectPage($resetPath);
    }

    $sql = "SELECT username FROM logins WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0){
        popUp("No account is registered with this email");
        redirectPage($resetPath);
    }
    $username = $result->fetch_assoc()["username"];

    $code = generate_reset();
    $sql = "SELECT code FROM resetCodes WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        $sql = "UPDATE resetCodes SET code = '$code' WHERE username = '$username'";
        $conn->query($sql);
    }else{
        $sql = "INSERT INTO resetCodes (username,email,code) VALUES ('$username','$email','$code')";
        $conn->query($sql);
    }

    $msg = "Your reset code is: " . strval($code);
    $header = "Reset Code Gig App";
    mail($email,$header,$msg);

    session_start();
    $_SESSION["username"] = $username;
    popUp("Reset code sent to email");
    redirectPage($forgotPath);
    exit();
}

send_reset();


?>