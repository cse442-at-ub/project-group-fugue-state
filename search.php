<?php
require_once "connect.php";

function recentlySearched($conn, $account_id, $song) {
    // Add page to user's recent searches list
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

session_start();

if (isset($_GET['q'])) {
    // global $conn;
    $search_query = strtolower($_GET['q']);
    $search_query = str_replace('"', '\"', $search_query); // Escape double quotes if needed
    
    $checkartist = "SELECT * FROM songs WHERE songwriter = '$search_query'";
    $resultartist = $conn->query($checkartist);
    
    if ($resultartist->num_rows > 0) {

        $artistpage = '/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/artist_song_page.php?artist=' . urlencode($search_query);
        if (isset($_SESSION["logged_in"]) == true){
            $account_id = $_SESSION['account_id'];
            $song = $search_query;
            recentlySearched($conn, $account_id, $song);
        }
        
        // Redirect to the artist's page
        header("Location: $artistpage");
        exit();
    }
        
    $checktitle = "SELECT * FROM songs WHERE LOWER(title) = '$search_query'";
    $resulttitle = $conn->query($checktitle);

    
    if ($resulttitle->num_rows > 0) {

        $row = $resulttitle->fetch_assoc();
        $song_id = $row['song_id'];
        $_SESSION['current_song_id'] = $song_id;
        
        if (isset($_SESSION["logged_in"]) == true){
            $account_id = $_SESSION['account_id'];
            $song = $search_query;
            recentlySearched($conn, $account_id, $song);
        }
        
        // Redirect to the songview's page
        $songViewPage = '/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/songView.php?song_id=' $song_id;
        header("Location: $songViewPage");
        exit();
    }

    } else {
        $homepage = '/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/homepage.php';
        header("Location: $homepage");
        exit();
    }

    
?>