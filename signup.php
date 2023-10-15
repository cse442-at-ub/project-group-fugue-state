<?php 

require "connect.php";

//This function will generate a random ID for the user. It will check if the ID already exists 
//in the database to make sure every user has a unique ID. If it already exists, it will recursively
//generate new ids until it finds one that doesn't exist.

function generateID(){
    global $conn;
    $randID = FLOOR(RAND()) + 1000;
    $sql = "SELECT account_id FROM Users WHERE account_id = '$randID'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        generateID();
    }else{
        return $randID;
    }
}


//This function quantifies the strength of the password, making sure the user includes 
//lower case letters, upper case letters, numbers, and special characters. 

function passwordStrength($password){
    global $signupPath;
    if (strlen($password) < 8){
        $message = "password is too short";
        popUp($message,$signupPath);    
        return false;
    }
    if (preg_match('/[A-Z]/', $password) == false){
        $message = "password does not contain uppercase letters";;
        popUp($message,$signupPath);
        return false;
    }
    if (preg_match('/[a-z]/', $password) == false){
        $message = "password does not contain lowercase letters";
        $redirect = "testsignup.html";
        popUp($message,$signupPath);
        return false;
    }
    if (preg_match('/[0-9]/', $password) == false){
        $message = "password does not contain numbers";
        $redirect = "testsignup.html";
        popUp($message,$signupPath);
        return false;
    }
    if (preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password) == false){
        $message = "password does not contain special characters";
        $redirect = "testsignup.html";
        popUp($message,$signupPath);
        return false;
    }
    return true;
}

//This function will take in a username, password, email, and alt_email and create a new user 
//in the database. If the user already exists, it will return false, it will not create a new user.


function signUpSQL(){
    global $signupPath;
    global $loginPath;
    $username = getInfo("username");
    $password = getInfo("password");
    if (passwordStrength($password) == false){
        exit();
    }
    $hashed_password = hash("sha256",$password);
    $email = getInfo("email");
    global $conn;
    $sql = "SELECT username FROM logins WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        $message = "This username is already taken";
        popUp($message,$signupPath);
        exit();
    }
    if (strlen($username) == 0 || strlen($password) == 0 || strlen($email) == 0){
        $message = "Please fill out all fields";
        popUp($message,$signupPath);
        exit();
    }
    $sql = "SELECT email FROM logins WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        $message = "This email is already registered to another user";
        popUp($message,$signupPath);
        exit();
    }
    $randID = generateID();
    $sql = "INSERT INTO logins (username, password, email, account_id) VALUES ('$username', '$hashed_password', '$email', '$randID')";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        $message = "New user created succsessfully";
        popUp($message,$loginPath);
        exit();
    } else {
        $message = "Unsuccsessful signup";
        popUp($message,$signupPath);    
        exit();
    }
}


$conn = connect();
signUpSQL();


?>
