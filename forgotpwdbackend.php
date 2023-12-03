<?php


require_once "connect.php";
session_start();

function passwordStrength($password){
    $message = "Password does not meet requirements";
    if (strlen($password) < 8){
        //$message = "password is too short";
        popUp($message);    
        return false;
    }
    if (preg_match('/[A-Z]/', $password) == false){
        //$message = "password does not contain uppercase letters";;
        popUp($message);
        return false;
    }
    if (preg_match('/[a-z]/', $password) == false){
        //$message = "password does not contain lowercase letters";
        popUp($message);
        return false;
    }
    if (preg_match('/[0-9]/', $password) == false){
        //$message = "password does not contain numbers";
        popUp($message);
        return false;
    }
    if (preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password) == false){
        //$message = "password does not contain special characters";
        popUp($message);
        return false;
    }
    return true;
}

function resetPassword(){
    global $conn;
    global $forgotPath;
    global $loginPath;
    $newpassword = getInfo("newpassword");
    $confirmpassword = getInfo("confirmpassword");
    $code = getInfo("code");
    if ($newpassword != $confirmpassword){
        popUp("passwords do not match");
        redirectPage($forgotPath);
    }
    if (passwordStrength($newpassword) == false){
        redirectPage($forgotPath);
    }
    $username = $_SESSION["username"];
    $newhashedpassword = hash("sha256",$newpassword);
    $sql = "SELECT code FROM resetCodes WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0){
        popUp("No reset code is registered with this email or username");
        redirectPage($forgotPath);
    }
    $result = $result->fetch_assoc()["code"];

    $sql2 = "SELECT password FROM logins WHERE username = '$username'";
    $result2 = $conn->query($sql2);
    $result2 = $result2->fetch_assoc()["password"];
    if ($result2 == $newhashedpassword){
        popUp("New password cannot be the same as the old password");
        redirectPage($forgotPath);
    }
    if ($result == $code){
        $sql = "UPDATE logins SET password = '$newhashedpassword' WHERE username = '$username'";
        $conn->query($sql);
        $sql = "DELETE FROM resetCodes WHERE username = '$username'";
        $conn->query($sql);
        popUp("Password reset successful");
        redirectPage($loginPath);
        session_destroy();
        exit();
    }else{
        $sql = "DELETE FROM resetCodes WHERE username = '$username'";
        $conn->query($sql);
        popUp("Incorrect reset code");
        redirectPage($forgotPath);
        exit();
    }
}

resetPassword();

?>