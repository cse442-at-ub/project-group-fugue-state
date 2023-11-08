<?php 

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
//$usersPath = "./Users/";

function recentSearches($username, $song, $conn){
    $sql = "SELECT song_1, song_2, song_3 FROM recent_songs WHERE account_id = $username";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (empty($row["song_1"])) {
            // If song_1 is empty, add the new song to it
            $sql = "UPDATE recent_songs SET song_1 = '$song' WHERE account_id = $username";
        } elseif (empty($row["song_2"])) {
            // If song_1 is full but song_2 is empty, add the new song to song_2
            $sql = "UPDATE recent_songs SET song_2 = '$song' WHERE account_id = $username";
        } elseif (empty($row["song_3"])) {
            // If song_1 and song_2 are full but song_3 is empty, add the new song to song_3
            $sql = "UPDATE recent_songs SET song_3 = '$song' WHERE account_id = $username";
        } else {
            // If all song columns are full, overwrite the oldest song (song_1)
            $sql = "UPDATE recent_songs SET song_1 = '$song' WHERE account_id = $username";
        }
        $conn->query($sql);
}

?>