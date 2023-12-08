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

// This function will read a song id and genre then return TRUE if song is in specified genre
function isGenre(int $songID, string $genre){
    global $conn;
    $genre = strtolower($genre);
    switch ($genre) {
        case "rock":
            $sql = "SELECT rock_genre FROM songs WHERE song_id = '$songID'";
            $result = $conn->query($sql);
            if($result->num_rows > 0 && $result->fetch_assoc()["rock_genre"]){
                return true;
            }
            break;
        case "pop":
            $sql = "SELECT pop_genre FROM songs WHERE song_id = '$songID'";
            $result = $conn->query($sql);
            if($result->num_rows > 0 && $result->fetch_assoc()["pop_genre"]){
                return true;
            }
            break;
        case "country":
            $sql = "SELECT country_genre FROM songs WHERE song_id = '$songID'";
            $result = $conn->query($sql);
            if($result->num_rows > 0 && $result->fetch_assoc()["country_genre"]){
                return true;
            }
            break;
        case "jazz":
            $sql = "SELECT jazz_genre FROM songs WHERE song_id = '$songID'";
            $result = $conn->query($sql);
            if($result->num_rows > 0 && $result->fetch_assoc()["jazz_genre"]){
                return true;
            }
            break;
        case "classical":
            $sql = "SELECT classical_genre FROM songs WHERE song_id = '$songID'";
            $result = $conn->query($sql);
            if($result->num_rows > 0 && $result->fetch_assoc()["classical_genre"]){
                return true;
            }
            break;
        case "folk":
            $sql = "SELECT folk_genre FROM songs WHERE song_id = '$songID'";
            $result = $conn->query($sql);
            if($result->num_rows > 0 && $result->fetch_assoc()["folk_genre"]){
                return true;
            }
            break;
        case "indie":
            $sql = "SELECT indie_genre FROM songs WHERE song_id = '$songID'";
            $result = $conn->query($sql);
            if($result->num_rows > 0 && $result->fetch_assoc()["indie_genre"]){
                return true;
            }
            break;
        case "metal":
            $sql = "SELECT metal_genre FROM songs WHERE song_id = '$songID'";
            $result = $conn->query($sql);
            if($result->num_rows > 0 && $result->fetch_assoc()["metal_genre"]){
                return true;
            }
            break;
        default:
            return false;
    }   
}

$conn = connect();
?>