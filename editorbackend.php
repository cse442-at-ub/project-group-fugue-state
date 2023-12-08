<?php
// Retrieve info from song editor submission
// Parse the info
// Send each value as a JSON string
// Return to the database in the correct format
require_once 'connect.php';
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Retrieve form data
$title = $_POST['formTitle'];
$key = $_POST['key'];

// JSON array of JSON objects containing strings: name, page, line
// $chords = array(
//     'col1' => $_POST['col1'],
//     'col2' => $_POST['col2'],
//     'col3' => $_POST['col3'],
//     'col4' => $_POST['col4'],
//     'col5' => $_POST['col5'],
//     'col6' => $_POST['col6'],
//     'col7' => $_POST['col7'],
//     'col8' => $_POST['col8'],
//     'col9' => $_POST['col9'],
//     'col10' => $_POST['col10']
// );

// // Convert each value in the array to a JSON object
// foreach ($chords as &$value) {
//     $value = json_encode(['value' => $value]);
// }

// Convert the whole list of JSON objects to a JSON array
// $chordsList = json_encode($chords);

// Lyrics is a JSON array of strings
// $lyrics = $_POST['lyrics'];

$unique = false;
while (!$unique) {
    $song_id = mt_rand(0, 1000000);
    echo "1";
    $result = $conn->query("SELECT `song_id` FROM `songs` WHERE `song_id` = '$song_id'");
    if ($result->num_rows == 0) {
        $unique = true;
    }
}

$created_date = date('Y-m-d');
$song_writer = $_SESSION["username"];
$pages = 1;
echo "2";

echo "Title: $title, Song ID: $song_id, Pages: $pages";


// Insert data into the database (replace 'your_table_name' with your actual table name)
$sql = "INSERT INTO `songs` (`title`, `song_id`, `pages`) VALUES ('$title', '$song_id', '$pages')";
// $sql = "INSERT INTO `songs` (`title`, `song_id`, `pages`) VALUES ('TEMP FROM WEBSERVER', 5, 5)";
$conn->query($sql);
echo " number 3";
// $stmt = $conn->prepare("INSERT INTO `songs` (`song_id`, `title`, `songwriter`, `created_date`, `keysig`, `chord_progression`, `lyrics`, `pages`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
// $stmt->bind_param("sssssssi", '$song_id', '$title', '$song_writer', '$created_date', '$key', '$chordsList', '$lyrics', '$pages');

// if ($stmt->execute()) {
//     header("Location: /CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/homepage.php");
// } else {
//     echo "Error: " . $stmt->error;
// }

// $stmt->close();
// $conn->close();
?>
