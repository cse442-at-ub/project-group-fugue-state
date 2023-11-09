<?php
require "connect.php";
//This function will read a song id and return the title
function getTitle(int $songID){
    global $conn;
    $sql = "SELECT title FROM songs WHERE song_id = '$songID'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        return $result->fetch_assoc()["title"];
    }
    return "";
}

// This function will read a song id and return the songwriter
function getArtist(int $songID){
    global $conn;
    $sql = "SELECT songwriter FROM songs WHERE song_id = '$songID'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        return $result->fetch_assoc()["songwriter"];        
    }
    return "";
}

// This function will read a song id and return the keysignature
function getKey(int $songID){
    global $conn;
    $sql = "SELECT keysig FROM songs WHERE song_id = '$songID'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        return $result->fetch_assoc()["keysig"];
    }  
    return "";
}  

$conn = connect();
?>