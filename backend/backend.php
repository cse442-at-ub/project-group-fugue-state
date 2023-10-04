<?php

$server = "oceanus.cse.buffalo.edu";
$username = "breckenm";
$password = "50301442";
$db = "cse442_2023_fall_team_o_db";

//$conn = new mysqli("127.0.0.1", "breckenm", "50301442", "database", 3306);
$conn = new mysqli($server, $username, $password, $db);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

echo "Database Connection Status: Online || \n";


function jsonToSQL($json){
    $sql = json_decode($json);
    return $sql;
}

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


loginSQL("testuser","testsneaky");
signUpSQL("testuser","testsneaky","testemail","testemail");
signUpSQL("testuser2","testsneaky2","testemail2","testemail3");
signUpSQL("testuser3","testsneaky3","testemail3","testemail3");
signUpSQL("testuser4","testsneaky4","testemail4","testemail4");

?>

