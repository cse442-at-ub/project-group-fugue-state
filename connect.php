<?php

//This function will read the database credentials from a csv file and return them as an array.

function readCSV($csvfile){
    $open = fopen($csvfile, 'r');
    $line1 = fgetcsv($open, 1000, ",");
    $line2 = fgetcsv($open, 1000, ",");
    return $line2;
}

//This function connects to the database and returns the connection object.

function connect(){
    $creds = readCSV("../credentials.csv"); // ../../credentials.csv if in templates folder
    $conn = new mysqli($creds[0], $creds[1], $creds[2], $creds[3]);
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    //echo "Database Connection Status... Online || \n";
    return $conn;
}

//These functions retrieve the username and password from the html form. For login and signup scripts.

function getInfo($input){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $info = $_POST[$input];
        return $info;
    }
}

//This function creates a popup message with a custom message and then redirects to another page

function popUp($message){
    echo '<script type="text/javascript">'; 
    echo 'alert("'.$message.'");';
    echo '</script>';
}

function redirectPage($redirect){
    echo '<script type="text/javascript">'; 
    echo 'window.location.href = "'.$redirect.'";';
    echo '</script>';
}

$loginPath = "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/login.php";
$signupPath = "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/signup.php";
$homePath = "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/homepage.php";
$profilePath = "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/profile.php";
$usersPath = "../Users/";
$forgotPath = "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/forgotpassword.php";
//$usersPath = "./Users/";


$conn = connect();

//session_start();
//$_SESSION["logged_in"] = false;
function recentSearches($account_id, $song){
    global $conn;

    // Check if the account_id exists
    $checkSql = "SELECT COUNT(*) as count FROM recent_songs WHERE account_id = $account_id";
    $resultCheck = $conn->query($checkSql);
    $row = $resultCheck->fetch_assoc();
    $exists = $row['count'];

    if ($exists > 0) {
        // If the account_id exists, update the recent songs
        $updateSql = "SELECT song_1, song_2, song_3 FROM recent_songs WHERE account_id = $account_id";
        $result = $conn->query($updateSql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row["song_1"] == "None") {
                $sql = "UPDATE recent_songs SET song_1 = '$song' WHERE account_id = $account_id";
            } elseif (($row["song_2"] == "None")) {
                $sql = "UPDATE recent_songs SET song_2 = '$song' WHERE account_id = $account_id";
            } elseif (($row["song_3"]) == "None") {
                $sql = "UPDATE recent_songs SET song_3 = '$song' WHERE account_id = $account_id";
            } else {
                $sql = "UPDATE recent_songs SET song_1 = '$song' WHERE account_id = $account_id";
            }
            $conn->query($sql);
        }
    } else {
        // If the account_id does not exist, insert a new record
        $insertSql = "INSERT INTO recent_songs (account_id, song_1, song_2, song_3) 
                      VALUES ('$account_id', '$song', 'None', 'None')";
        $conn->query($insertSql);
    }
}

// function recentSearches($account_id, $song){
//     global $conn;
//     $sql = "SELECT song_1, song_2, song_3 FROM recent_songs WHERE account_id = $account_id";
//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         if (empty($row["song_1"])) {
//             // If song_1 is empty, add the new song to it
//             $sql = "UPDATE recent_songs SET song_1 = '$song' WHERE account_id = $account_id";
//         } elseif (empty($row["song_2"])) {
//             // If song_1 is full but song_2 is empty, add the new song to song_2
//             $sql = "UPDATE recent_songs SET song_2 = '$song' WHERE account_id = $account_id";
//         } elseif (empty($row["song_3"])) {
//             // If song_1 and song_2 are full but song_3 is empty, add the new song to song_3
//             $sql = "UPDATE recent_songs SET song_3 = '$song' WHERE account_id = $account_id";
//         } else {
//             // If all song columns are full, overwrite the oldest song (song_1)
//             $sql = "UPDATE recent_songs SET song_1 = '$song' WHERE account_id = $account_id";
//         }
//         $conn->query($sql);
// }
// }

?>