<?php
require_once "connect.php";
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

// This function will read a song id and return the number of pages
function getPages(int $songID){
    global $conn;
    $sql = "SELECT pages FROM songs WHERE song_id = '$songID'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        return $result->fetch_assoc()["pages"];
    }
    return "";
}

// This function will read a song id and return the arrangment as an array of objects
function getArrangement(int $songID){
    global $conn;
    $sql = "SELECT arrangement FROM songs WHERE song_id = '$songID'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        return $result->fetch_assoc()["arrangement"];
    }  
    return "";
}

// This function will read a song id and return the chord progressions as an array of objects
function getChords(int $songID){
    global $conn;
    $sql = "SELECT chord_progression FROM songs WHERE song_id = '$songID'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        return $result->fetch_assoc()["chord_progression"];
    }  
    return "";
}


// This function will read a song id and return the lyrics as an array of objects
function getLyrics(int $songID){
    global $conn;
    $sql = "SELECT lyrics FROM songs WHERE song_id = '$songID'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        return $result->fetch_assoc()["lyrics"];
    }  
    return "";
}

$conn = connect();
?>