<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);

require "connect.php";

//This function will take in a JSON object and convert it to a SQL query.

//function jsonToSQL($json){
//    $sql = json_decode($json);
//    return $sql;
//}

//This function checks if any of the fields are empty and creates an error popup if any are

function missingFields($username,$password){
    global $loginPath;
    if (strlen($username) == 0 || strlen($password) == 0){
        $message = "Please fill out all fields";
        popUp($message);
        redirectPage($loginPath);
        //exit();
    }
}

//This function will take in a username and password string and check if it exists in the database. If it 
//does, it will return true, if not, it will return false.

function loginSQL(){
    global $homePath;
    global $loginPath;
    global $conn;
    $username = getInfo("username");
    $password = getInfo("password");
    missingFields($username,$password);

    $hashed_password = hash("sha256",$password);
    $sql = "SELECT username, password FROM logins WHERE username = '$username' AND password = '$hashed_password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $message = "Login succsessful";
        popUp($message);
        redirectPage($homePath);
        session_start();
        $_SESSION["username"] = $username;
        $sql = "SELECT account_id FROM logins WHERE username = '$username'";
        $result = $conn->query($sql);
        $account_id = $result->fetch_assoc()["account_id"];
        $_SESSION['account_id'] = $account_id;
        $_SESSION['logged_in'] = true;
        exit();
    } else {
        $message = "Incorrect login information";
        popUp($message);
        redirectPage($loginPath);
        //exit();
    }
}


$conn = connect();
loginSQL();

?>