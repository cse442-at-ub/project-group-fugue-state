<?php 

require "connect.php";
require "helperfunctions.php";

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




//This function checks if any of the fields are empty and returns false if they are


function missingFields($oldpassword,$password){
    if (strlen($oldpassword) == 0 || strlen($password) == 0){
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

//This function makes sure that the old password matches in the database for the users email 

function passwordMatch($oldpassword){
    global $conn;
    $username = $_SESSION["username"];
    $sql = "SELECT username, password FROM logins WHERE username = '$username' AND password = '$oldpassword'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        $message = "Incorrect information";
        popUp($message);
        return false;
    }

}


//This function makes sure the new password doesnt match the old password 

function redundantPassword($oldpassword,$password){
    $message = "New password cannot be the same as old password";
    if ($oldpassword == $password){
        popUp($message);
        return false;
    }
    return true;
}

//This function will take in a username, password, email, and alt_email and create a new user 
//in the database. If the user already exists, it will return false, it will not create a new user.


function profileNewPSQL(){
    global $profilePath;
    global $conn;

    if ($_SESSION["logged_in"] == false){
        $message = "Please login to access this page";
        popUp($message);
        redirectPage($profilePath);
        //exit();
    }
    $username = $_SESSION["username"];

    $oldpassword = getInfo("oldpassword");
    $password = getInfo("password");
    $hashed_oldpassword = hash("sha256",$oldpassword);
    $hashed_password = hash("sha256",$password);
    if (missingFields($oldpassword,$password) == false || passwordStrength($password) == false
    || passwordMatch($hashed_oldpassword) == false || redundantPassword($oldpassword,$password) == false){
        redirectPage($profilePath);
        //exit();
    }else{
        $sql = "UPDATE logins SET password='$hashed_password' WHERE username='$username' AND password='$hashed_oldpassword'";
        $result = $conn->query($sql);
        if ($result === TRUE) {
            $message = "Password Updated";
            popUp($message);
            redirectPage($profilePath);
            //exit();
        } else {
            $message = "Unsuccsessful";
            popUp($message);  
            redirectPage($profilePath);
            exit();
        }
    }
}


profileNewPSQL();


?>

