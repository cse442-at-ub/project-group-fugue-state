<?php 

require "connect.php";
require "helperfunctions.php";



//This function checks if any of the fields are empty and returns false if they are


function missingFields($username){
    if (strlen($username) == 0){
        $message = "Please fill out all fields";
        popUp($message);
        return false;
    }  
    return true;
}



//This function gets the account_id of the user from the database

function accountIDlookup($username){
    global $conn;
    $sql = "SELECT account_id FROM logins WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
    	$row = $result->fetch_assoc();
        $account_id = $row["account_id"];
        return $account_id;
    }
}

//This function updates the preferences in the database for the user when UPDATES is specified or 
//adds the account id of the user and their preferences to the database when ADD is specified

function updatePreferences($rock,$pop,$country,$jazz,$classical,$folk,$indie,$alt,$metal,$account_id,$type){
    global $conn;
    if ($type == "ADD"){
        $sql = "INSERT INTO preferences (account_id, rock, pop, country, jazz, classical, folk, indie, alt, metal) 
        VALUES ('$account_id', '$rock', '$pop', '$country', '$jazz', '$classical', '$folk', '$indie', '$alt', '$metal')";
        $conn->query($sql);
    }
    if ($type == "UPDATES"){
        $sql = "UPDATE preferences SET rock='$rock' WHERE account_id='$account_id'";
        $conn->query($sql);

        $sql = "UPDATE preferences SET pop='$pop' WHERE account_id='$account_id'";
        $conn->query($sql);

        $sql = "UPDATE preferences SET country='$country' WHERE account_id='$account_id'";
        $conn->query($sql);

        $sql = "UPDATE preferences SET jazz='$jazz' WHERE account_id='$account_id'";
        $conn->query($sql);

        $sql = "UPDATE preferences SET classical='$classical' WHERE account_id='$account_id'";
        $conn->query($sql);

        $sql = "UPDATE preferences SET folk='$folk' WHERE account_id='$account_id'";
        $conn->query($sql);

        $sql = "UPDATE preferences SET indie='$indie' WHERE account_id='$account_id'";
        $conn->query($sql);

        $sql = "UPDATE preferences SET alt='$alt' WHERE account_id='$account_id'";
        $conn->query($sql);

        $sql = "UPDATE preferences SET metal='$metal' WHERE account_id='$account_id'";
        $conn->query($sql);
    }

}



//This function will take in a username, password, email, and alt_email and create a new user 
//in the database. If the user already exists, it will return false, it will not create a new user.


function profileAddPrefPSQL(){
    global $profilePath;
    global $conn;
    if ($_SESSION["logged_in"] == false){
        $message = "Please login to access this page";
        popUp($message);
        redirectPage($profilePath);
        //exit();
    }
    $username = $_SESSION["username"];
    if (missingFields($username) == false) {
        redirectPage($profilePath);
    }
    
    $rock = getInfo("Rock");
    $pop = getInfo("Pop");
    $country = getInfo("Country");
    $jazz = getInfo("Jazz");
    $classical = getInfo("Classical");
    $folk = getInfo("Folk");
    $indie = getInfo("Indie");
    $alt = getInfo("Alt");
    $metal = getInfo("Metal");
    $account_id = accountIDlookup($username);

    $sql = "SELECT account_id FROM preferences WHERE account_id = '$account_id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        updatePreferences($rock,$pop,$country,$jazz,$classical, $folk,$indie,$alt,$metal,$account_id,"UPDATES"); 
    }else{
        updatePreferences($rock,$pop,$country,$jazz,$classical,$folk,$indie,$alt,$metal,$account_id,"ADD");
    }

    $message = "Preferences Updated";
    popUp($message);
    redirectPage($profilePath);
}


profileAddPrefPSQL();


?>
