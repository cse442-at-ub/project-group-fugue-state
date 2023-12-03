<?php

require_once "connect.php";

function resetPassword(){
    $newpassword = getInfo("newpassword");
    $confirmpassword = getInfo("confirmpassword");
    $code = getInfo("code");
    if ($newpassword != $confirmpassword){
        popUp("passwords do not match");
        redirectPage("forgotpassword.php");
    }
    $username = $_SESSION["username"];
    $newhashedpassword = hash("sha256",$newpassword);
    global $conn;
    $sql = "SELECT code FROM resetCodes WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0){
        popUp("No reset code is registered with this email or username");
        redirectPage("forgotpassword.php");
    }
    $result = $result->fetch_assoc()["code"];

    $sql2 = "SELECT password FROM logins WHERE username = '$username'";
    $result2 = $conn->query($sql2);
    $result2 = $result->fetch_assoc()["password"];
    if ($result2 == $newhashedpassword){
        popUp("New password cannot be the same as the old password");
        redirectPage("forgotpassword.php");
    }
    if ($result == $code){
        $sql = "UPDATE logins SET password = '$newhashedpassword' WHERE username = '$username'";
        $conn->query($sql);
        $sql = "DELETE FROM resetCodes WHERE username = '$username'";
        $conn->query($sql);
        popUp("Password reset successful");
        redirectPage("login.php");
    }else{
        $sql = "DELETE FROM resetCodes WHERE username = '$username'";
        $conn->query($sql);
        popUp("Incorrect reset code");
        redirectPage("forgotpassword.php");
    }
}

resetPassword();


?>