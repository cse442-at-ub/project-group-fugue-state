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
    if (strlen($password) < 8){
        echo "password is too short || \n";
        return false;
    }
    if (preg_match('/[A-Z]/', $password) == false){
        echo "password does not contain upper case letters || \n";
        return false;
    }
    if (preg_match('/[a-z]/', $password) == false){
        echo "password does not contain lower case letters || \n";
        return false;
    }
    if (preg_match('/[0-9]/', $password) == false){
        echo "password does not contain numbers || \n";
        return false;
    }
    if (preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $password) == false){
        echo "password does not contain special characters || \n";
        return false;
    }
    return true;
}

//This function will take in a username, password, email, and alt_email and create a new user 
//in the database. If the user already exists, it will return false, it will not create a new user.


function signUpSQL(){
    $username = getInfo("username");
    $password = getInfo("password");
    if (passwordStrength($password) == false){
        //return false;
        header("Location: testsignup.html");
        exit();
    }
    $hashed_password = hash("sha256",$password);
    $email = getInfo("email");
    global $conn;
    $sql = "SELECT username FROM logins WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        //echo "Username is taken || \n";
        header("Location: testsignup.html");
        //return false;
        exit();
    }
    if (strlen($username) == 0 || strlen($password) == 0 || strlen($email) == 0){
        //echo "Please fill out all fields || \n";
        header("Location: testsignup.html");
        //return false;
        exit();
    }
    $sql = "SELECT email FROM logins WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        //echo "An account has already been registered with this email || \n";
        header("Location: testsignup.html");
        //return false;
        exit();
    }
    $randID = generateID();
    $sql = "INSERT INTO logins (username, password, email, account_id) VALUES ('$username', '$hashed_password', '$email', '$randID')";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        //echo "New user created successfully || \n";
        header("Location: testlogin.html");
        //return true;
        exit();
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error . " || \n";
        header("Location: testsignup.html");
        //return false;
        exit();
    }
}


$conn = connect();
signUpSQL();

?>
