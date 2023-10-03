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

function executeSQL($sql){
    global $conn;
    $conn->query($sql);
}

function loginSQL($username, $password){
    global $conn;
    $sql = "SELECT username, sneaky FROM logins WHERE username = '$username' AND sneaky = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "Logged in Successfully as: ".$username."\n";
        return true;
    } else {
        echo "Incorrect username or password\n";
        return false;
    }
}

$sql = "SELECT username FROM logins";
$result = $conn->query($sql);

//echo $result->fetch_assoc()["username"];

loginSQL("testuser","testsneaky");

?>

