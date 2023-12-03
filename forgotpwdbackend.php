<?php

require_once "connect.php";

function resetPassword($username, $email, $code, $newpassword){
    $newhashedpassword = hash("sha256",$newpassword);
    global $conn;
    $sql = "SELECT code FROM resetCodes WHERE username = '$username' AND email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0){
        echo "No reset code is registered with this email or username || \n";
        return false;
    }
    $result = $result->fetch_assoc()["code"];

    $sql2 = "SELECT password FROM logins WHERE username = '$username' AND email = '$email'";
    $result2 = $conn->query($sql2);
    $result2 = $result->fetch_assoc()["password"];
    if ($result2 == $newhashedpassword){
        echo "New password cannot be the same as the old password || \n";
        return false;
    }
    if ($result == $code){
        $sql = "UPDATE logins SET password = '$newhashedpassword' WHERE username = '$username' AND email = '$email'";
        $conn->query($sql);
        $sql = "DELETE FROM resetCodes WHERE username = '$username' AND email = '$email'";
        $conn->query($sql);
        echo "Password reset successfully || \n";
    }else{
        $sql = "DELETE FROM resetCodes WHERE username = '$username' AND email = '$email'";
        $conn->query($sql);
        echo "Incorrect reset code || \n";
    }
}


?>