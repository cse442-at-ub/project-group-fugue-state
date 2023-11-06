<?php 

require "connect.php";



//This function checks if any of the fields are empty and returns false if they are


function missingFields($oldusername,$username){
    if (strlen($oldusername) == 0 || strlen($username) == 0){
        $message = "Please fill out all fields";
        popUp($message);
        return false;
    }  
    return true;
}


//This function checks if the desired new username already is taken 

function usernameMatch($username){
    global $conn;
    $sql = "SELECT username FROM logins WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $message = "Username already taken";
        popUp($message);
        return false;
    } else {
        return true;
    }
    
}


//This function will take in a username, password, email, and alt_email and create a new user 
//in the database. If the user already exists, it will return false, it will not create a new user.


function profileNewUserSQL(){
    global $profilePath;
    global $conn;
    if ($_SESSION["logged_in"] == false){
        $message = "Please login to access this page";
        popUp($message);
        redirectPage($profilePath);
        //exit();
    }
    $oldusername = $_SESSION["username"];
    $username = getInfo("username");
    if (missingFields($oldusername,$username) == false || usernameMatch($username) == false){
        redirectPage($profilePath);
        //exit();
    }else{
        $sql = "UPDATE logins SET username='$username' WHERE username='$oldusername'";
        $result = $conn->query($sql);
        if ($result === TRUE) {
            $message = "Username Updated";
            popUp($message);
            redirectPage($profilePath);
            //exit();
        } else {
            $message = "Unsuccsessful";
            popUp($message);  
            redirectPage($profilePath);
            //exit();
        }
    }
}


$conn = connect();
profileNewUserSQL();


?>
