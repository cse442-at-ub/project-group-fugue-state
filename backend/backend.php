<?php

// This is the backend for the app. It will handle all of the database connections and queries.

$server = "oceanus.cse.buffalo.edu";
$username = "breckenm";
$password = "50301442";
$db = "cse442_2023_fall_team_o_db";

$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

echo "Database Connection Status: Online || \n";


// This function will take in a JSON object and convert it to a SQL query.


function jsonToSQL($json){
    $sql = json_decode($json);
    return $sql;
}

//This function will take in a username and password string and check if it exists in the database. If it 
//does, it will return true, if not, it will return false.

function loginSQL($username, $password){
    global $conn;
    $sql = "SELECT username, password FROM Users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "Logged in Successfully as: ".$username." || \n";
        return true;
    } else {
        echo "Incorrect username or password || \n";
        return false;
    }
}

//This function will take in a username, password, email, and alt_email and create a new user 
//in the database. If the user already exists, it will return false, it will not create a new user.

function signUpSQL($username,$password,$email){
    global $conn;
    $sql = "SELECT username FROM Users WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows >0){
        echo "Username is taken || \n";
        return false;
    }else{
        $sql = "SELECT email FROM Users WHERE email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows >0){
            echo "An account has already been registered with this email || \n";
            return false;
        }else{
            $randID = FLOOR(RAND()) + 1000;
            $sql = "INSERT INTO Users (username, password, email, account_id) VALUES ('$username', '$password', '$email', '$randID')";
            $result = $conn->query($sql);
            if ($result === TRUE) {
                echo "New user created successfully || \n";
                return true;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error . " || \n";
                return false;
            }
        }
    }
}

//This function will send an email to the users email address containing a randomly generated code. They
//will use this code to reset their password. A helper function for forgotPassword().

function emailUser($username,$email){
    $randCode = FLOOR(RAND()) + 1005;
    $msg = "Hello ".$username.",\n\n your password reset code is ". $randCode ."\n\n Please do not share it with anyone. Thank you,\n The Gig App Team";
    if (strlen($msg) > 70){
        $msg = wordwrap($msg,70);
    }
    mail($email,"Gig App Password Reset",$msg);
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

//This function 

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
        echo "Incorrect code || \n";
    }
}

//Theses are tests for the functions above. They will be removed once the app is complete.

loginSQL("testuser","testpassword");
signUpSQL("testuser","testpassword","testemail");
signUpSQL("testuser","testpassword","testemail");
signUpSQL("testuser2","testpassword2","testemail2");
loginSQL("testuser2","testpassword2");
signUpSQL("testuser2","testpassword27","testemail27");
signUpSQL("testuser3","testpassword27","testemail27");
loginSQL("testuser3","testpassword27");
signUpSQL("testuser4","testpassword274","testemail2");

?>

