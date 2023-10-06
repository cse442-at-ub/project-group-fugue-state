<?php

//This function will take in a JSON object and convert it to a SQL query.

function jsonToSQL($json){
    $sql = json_decode($json);
    return $sql;
}

//This function will take in a username and password string and check if it exists in the database. If it 
//does, it will return true, if not, it will return false.

function loginSQL($username, $password){
    global $conn;
    $sql = "SELECT username, password FROM logins WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "Logged in Successfully as: ".$username." || \n";
        return true;
    } else {
        echo "Incorrect username or password || \n";
        return false;
    }
}


?>