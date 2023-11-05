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


//This function checks if the email or username is already taken and returns false if it is

function takenInfo($username,$email){
    global $conn;
    $sql = "SELECT username FROM logins WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        $message = "This username is already taken";
        popUp($message);
        return false;
    }
    $sql = "SELECT email FROM logins WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        $message = "This email is already registered to another user";
        popUp($message);
        return false;
    }   
    return true;
}


//This function checks if any of the fields are empty and returns false if they are


function missingFields($username,$password,$email){
    if (strlen($username) == 0 || strlen($password) == 0 || strlen($email) == 0){
        $message = "Please fill out all fields";
        popUp($message);
        return false;
    }  
    return true;
}

//This function makes sure that the password and confirm password match and if they dont
//creates a popup error and returns false

function confirmPassword($password,$confirm_password){
    if ($password != $confirm_password){
        $message = "Passwords do not match";
        popUp($message);
        return false;
    }
    return true;
}

//This function will take in a username, password, email, and alt_email and create a new user 
//in the database. If the user already exists, it will return false, it will not create a new user.


function signUpSQL(){
    global $loginPath;
    global $signupPath;
    global $conn;
    global $usersPath;
    $username = getInfo("username");
    $password = getInfo("password");
    $confirm_password = getInfo("confirm_password");
    $email = getInfo("email");
    if (missingFields($username,$password,$email) == false || takenInfo($username,$email) == false
        || passwordStrength($password) == false || confirmPassword($password,$confirm_password) == false){
        redirectPage($signupPath);
        //exit();
    }else{
        $hashed_password = hash("sha256",$password);
        $randID = generateID();
        $sql = "INSERT INTO logins (username, password, email, account_id) VALUES ('$username', '$hashed_password', '$email', '$randID')";
        $result = $conn->query($sql);
        if ($result === TRUE) {
             // Make folder path
             //$userPath = $usersPath . strval($randID) . "/";
             $individualPath = $usersPath . strval($randID) . "/";
             // Create folder for new user
             mkdir($individualPath);

             $individualPath = $usersPath . strval($randID);
             // Create folder for new user
             mkdir($individualPath);

             $individualPath = $usersPath . $username . "/";
             // Create folder for new user
             mkdir($individualPath);

             $individualPath = $usersPath . $username;
             // Create folder for new user
             mkdir($individualPath);

             $message = "New user created succsessfully";
             popUp($message);
             redirectPage($loginPath);
             exit();
        } else {
            $message = "Unsuccsessful signup";
            popUp($message);  
            redirectPage($signupPath);
            exit();
        }
    }
}


$conn = connect();
signUpSQL();


?>
