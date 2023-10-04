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
    $sql = "SELECT username, sneaky FROM logins WHERE username = '$username' AND sneaky = '$password'";
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

function signUpSQL($username,$password,$email,$alt_email){
    global $conn;
    if (loginSQL($username,$password) == true){
        echo "User already exists || \n";
        return false;
    }else{
        $randID = FLOOR(RAND()) + 1000;
        $sql = "INSERT INTO logins (account_id, username, email, alt_email, sneaky) VALUES ('$randID','$username', '$email', '$alt_email', '$password')";
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

//Theses are tests for the functions above. They will be removed once the app is complete.

loginSQL("testuser","testsneaky");
signUpSQL("testuser","testsneaky","testemail","testemail");
signUpSQL("testuser2","testsneaky2","testemail2","testemail3");
signUpSQL("testuser3","testsneaky3","testemail3","testemail3");
signUpSQL("testuser4","testsneaky4","testemail4","testemail4");

?>

