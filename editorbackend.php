<?php
// retrieve info from song editor submission
// parse the info
// send each value as a json string
// return to database in correct format
require_once connect.php;
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);


// Retrieve form data
$title = $_POST['title'];
$section = $_POST['section'];
$key = $_POST['key'];
$mm = $_POST['mm'];

//json array of json objects containing strings: name, page, line
$chords = array(
    $_POST['col1'], $_POST['col2'], $_POST['col3'], $_POST['col4'], $_POST['col5'],
    $_POST['col6'], $_POST['col7'], $_POST['col8'], $_POST['col9'], $_POST['col10']
);
$chordsList = implode(',', $chords);

//lyrics is json array of strings
$lyrics = $_POST['lyrics'];



$unique = false;
while (!$unique) {
    $song_id = uniqid();
    $result = $conn->query("SELECT `song_id` FROM `songs` WHERE `song_id` = '$song_id'");
    if ($result->num_rows == 0) {
        $unique = true;
    }
}

$created_date = date('Y-m-d');
$song_writer = $_SESSION["username"];
$pages = 1;

// Insert data into the database (replace 'your_table_name' with your actual table name)
$sql = "INSERT INTO `songs` (`song_id`, `title`, `songwriter`, `created_date`, `keysig`, `chord_progression`, `lyrics`, `pages`) VALUES ('$song_id', '$title', '$song_writer', '$created_date', '$key', '$chordsList', '$lyrics', '$pages')";

if ($conn->query($sql) === TRUE) {
    header("Location: /CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/homepage.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

function parsePost(){
  global $conn;
}

?>