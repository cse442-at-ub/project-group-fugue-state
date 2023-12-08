<?php 
require "connect.php";
session_start();

function retrieveAll($field,$table){
    global $conn;
    $sql = "SELECT '$field' FROM '$table'";
    $result = $conn->query($sql);

    $arr = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($arr,$row["username"]);
        } 
    } else {
        echo "0 results";
    }
    return $arr;
}

//$usernames = retrieveAll("username","logins");

//lets say that the music they create is being stored in the songs table of the database and it is
//associated with their account_id

function retrieveSongNames(){
    global $conn;
    $sql = "SELECT account_id,title,share FROM shared_songs WHERE share = 'Yes'";
    $result = $conn->query($sql);

    $arr = array();

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            array_push($arr,array($row["title"],$row["account_id"]));
        } 
    } else {
        echo "0 results";
    }
    return $arr;
}

$_SESSION["allsongs"] = retrieveSongNames(); //ex. = [["song1",10102],["song2",11002],["song3",1112]]

function searchSongs($search){
    $songs = $_SESSION["allsongs"];
    $arr = array();
    for ($i = 0; $i < count($songs); $i++){
        if (strpos($songs[$i][0],$search) !== false){
            array_push($arr,$songs[$i]);
        }
    }
    return $arr;
}

//this function will search for a song title in the array of songs and will show all results
//the results it will show first will be the ones that match the title exactly and then it will
//

$_SESSION["usernames"] = retrieveAll("username","logins");

function recursiveSearch($key,$container,$arr,$j){  //inital $arr=array() and $j=0
    $songs = $_SESSION[$container];
    if ($j == count($songs) || strlen($key) == 0){
        return $arr;
    }else{
        for ($i = 0; $i < count($songs); $i++){
            if (strpos($songs[$i][0],$key) !== false){
                array_push($songs[$i][0]);
            }
        }
        $newtitle = substr($key,0,strlen($key)-1);
        recursiveSearch($newtitle,$container,$arr,$j+1);
    }
}

//not efficient, time complexity is worst case O(n^2)
//can do better, potentially O(nlogn) or amortized O(n)

//ex. recursiveSearch("title1","allsongs",array(),0);

//given h get array of all songs that start with h 

function instanceArray($key,$container){
    $arr = array();
    for ($i = 0; $i < count($container); $i++){
        if (strpos($container[$i][0],$key) !== false){
            array_push($arr,$container[$i]);
        }
    }   
    return $arr;
}

function searchSubsets($key,$container,$arr,$fulllength){
    if (strlen($key) == $fulllength){
        return $arr;
    }else{
        $newtitle = substr($key,0,strlen($key)-1);
        $newarr = instanceArray($newtitle,$container);
        for ($i = 0; $i < count($newarr); $i++){
            array_push($arr,$newarr[$i]);
        }
        searchSubsets($newtitle,$newarr,$arr,$fulllength);
    }
}

//want to search hello
// first gets array of all songs that start with h
// then gets array of all songs that start with he
// then gets array of all songs that start with hel
// so on 






?>