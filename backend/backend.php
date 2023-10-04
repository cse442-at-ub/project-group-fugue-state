<?php

//This is the backend for the app. It will handle all of the database connections and queries.


//This function will read the database credentials from a csv file and return them as an array.

function readCSV($csvfile){
    $open = fopen($csvfile, 'r');
    $line1 = fgetcsv($open, 1000, ",");
    $line2 = fgetcsv($open, 1000, ",");
    return $line2;
}

$creds = readCSV("credentials.csv");

$conn = new mysqli($creds[0], $creds[1], $creds[2], $creds[3]);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

echo "Database Connection Status: Online || \n";

//This function will generate a random ID for the user. It will check if the ID already exists 
//in the database to make sure every user has a unique ID. If it already exists, it will recursively
//generate new ids until it finds one that doesn't exist.

function generateID(){
    global $conn;
    $randID = FLOOR(RAND()) + 1000;
    $sql = "SELECT account_id FROM Users WHERE account_id = '$randID'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        generateID();
    }else{
        return $randID;
    }
}

//This function will take in a JSON object and convert it to a SQL query.

function jsonToSQL($json){
    $sql = json_decode($json);
    return $sql;
}

//This function will take in a username and password string and check if it exists in the database. If it 
//does, it will return true, if not, it will return false.

function loginSQL($username, $password){
    global $conn;
    $sql = "SELECT username, password FROM Users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "Logged in Successfully as: ".$username." || \n";
        return true;
    } else {
        echo "Incorrect username or password || \n";
        return false;
    }
}

//This function will take in a username, password, email, and alt_email and create a new user 
//in the database. If the user already exists, it will return false, it will not create a new user.

//clean up code, too many conditionals. 2 nests max.

function signUpSQL($username,$password,$email){
    global $conn;
    $sql = "SELECT username FROM Users WHERE username = '$username'";
    $result = $conn->query($sql);
    if ($result->num_rows >0){
        echo "Username is taken || \n";
        return false;
    }else{
        $sql = "SELECT email FROM Users WHERE email = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows >0){
            echo "An account has already been registered with this email || \n";
            return false;
        }else{
            $randID = generateID();
            $sql = "INSERT INTO Users (username, password, email, account_id) VALUES ('$username', '$password', '$email', '$randID')";
            $result = $conn->query($sql);
            if ($result === TRUE) {
                echo "New user created successfully || \n";
                return true;
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error . " || \n";
                return false;
            }
        }
    }
}

//This function will send an email to the users email address containing a randomly generated code. They
//will use this code to reset their password. A helper function for forgotPassword().

function emailUser($username,$email){
    $randCode = FLOOR(RAND()) + 1005;
    $msg = "Hello ".$username.",\n\n your password reset code is ". $randCode ."\n\n Please do not share it with anyone. Thank you,\n The Gig App Team";
    if (strlen($msg) > 70){
        $msg = wordwrap($msg,70);
    }
    $mailSent = mail($email,"Gig App Password Reset",$msg);
    if ($mailSent == false){
        echo "Error sending email || \n";
    }else{
        echo "An email has been sent to your email address containing a password reset code || \n";
    }
    return $randCode;
}

//This function will email the user and add the code to the database so they can successfully
//reset their password with the code. 

function forgotPassword($email){
    global $conn;
    $sql = "SELECT username FROM Users WHERE email = '$email'";
    $result = $conn->query($sql);
    $username = $result->fetch_assoc()["username"];
    $randCode = emailUser($username, $email);
    $sql = "INSERT INTO resetCodes (username, email, code) VALUES ('$username', '$email', '$randCode')";
    $conn->query($sql);
}

//This function updates the users password in the database and removes the code from the database.

function resetPassword($username, $email, $code, $newpassword){
    global $conn;
    $sql = "SELECT code FROM resetCodes WHERE username = '$username' AND email = '$email'";
    $result = $conn->query($sql);
    $result = $result->fetch_assoc()["code"];
    if ($result == $code){
        $sql = "UPDATE Users SET password = '$newpassword' WHERE username = '$username' AND email = '$email'";
        $conn->query($sql);
        $sql = "DELETE FROM resetCodes WHERE username = '$username' AND email = '$email'";
        $conn->query($sql);
        echo "Password reset successfully || \n";
    }else{
        $sql = "DELETE FROM resetCodes WHERE username = '$username' AND email = '$email'";
        $conn->query($sql);
        echo "Incorrect reset code || \n";
    }
}

//Theses are tests for the functions above. They will be removed once the app is complete.

loginSQL("testuser","testpassword");
signUpSQL("testuser","testpassword","testemail");
signUpSQL("testuser","testpassword","testemail");
signUpSQL("testuser2","testpassword2","testemail2");
loginSQL("testuser2","testpassword2");
signUpSQL("testuser2","testpassword27","testemail27");
signUpSQL("testuser3","testpassword27","testemail27");
loginSQL("testuser3","testpassword27");
signUpSQL("testuser4","testpassword274","testemail2");
signUpSQL("testuser5","testpassword274","breckenmcg@gmail.com");
loginSQL("testuser5","testpassword274");
signUpSQL("testuser6","testpassword2745","testemail277");


forgotPassword("breckenmcg@gmail.com");
resetPassword("testuser5","breckenmcg@gmail.com","939688676","newpassword");


$conn->close();
//All tests successful so far 

?>

