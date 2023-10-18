<?php 

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

//This function will take in a username, password, email, and alt_email and create a new user 
//in the database. If the user already exists, it will return false, it will not create a new user.


function signUpSQL($username,$password,$email){
    global $conn;
    $sql = "SELECT username FROM logins WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        echo "Username is taken || \n";
        return false;
    }
    if (strlen($username) == 0 || strlen($password) == 0 || strlen($email) == 0){
        echo "Please fill out all fields || \n";
        return false;
    }
    $sql = "SELECT email FROM logins WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        echo "An account has already been registered with this email || \n";
        return false;
    }
    $randID = generateID();
    $sql = "INSERT INTO logins (username, password, email, account_id) VALUES ('$username', '$password', '$email', '$randID')";
    $result = $conn->query($sql);
    if ($result === TRUE) {
        echo "New user created successfully || \n";
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error . " || \n";
        return false;
    }
}

?>