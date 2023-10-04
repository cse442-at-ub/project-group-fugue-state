<?php

//This function will send an email to the users email address containing a randomly generated code. They
//will use this code to reset their password. A helper function for forgotPassword().

function emailUser($username,$email){
    $randCode = FLOOR(RAND()) + 1005;
    $msg = "Hello ".$username.",\n\n your password reset code is ". $randCode ."\n\n Please do not share it with anyone. Thank you,\n The Gig App Team";
    if (strlen($msg) > 70){
        $msg = wordwrap($msg,70);
    }
    $mailSent = mail($email,"Gig App Password Reset",$msg);
    if ($mailSent == false){
        echo "Error sending email || \n";
    }else{
        echo "An email has been sent to your email address containing a password reset code || \n";
    }
    return $randCode;
}

//This function will email the user and add the code to the database so they can successfully
//reset their password with the code. 

function forgotPassword($email){
    global $conn;
    $sql = "SELECT username FROM Users WHERE email = '$email'";
    $result = $conn->query($sql);
    $username = $result->fetch_assoc()["username"];
    $randCode = emailUser($username, $email);
    $sql = "INSERT INTO resetCodes (username, email, code) VALUES ('$username', '$email', '$randCode')";
    $conn->query($sql);
}

//This function updates the users password in the database and removes the code from the database.

function resetPassword($username, $email, $code, $newpassword){
    global $conn;
    $sql = "SELECT code FROM resetCodes WHERE username = '$username' AND email = '$email'";
    $result = $conn->query($sql);
    $result = $result->fetch_assoc()["code"];
    if ($result == $code){
        $sql = "UPDATE Users SET password = '$newpassword' WHERE username = '$username' AND email = '$email'";
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