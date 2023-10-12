<?php

//This function will read the database credentials from a csv file and return them as an array.

function readCSV($csvfile){
    $open = fopen($csvfile, 'r');
    $line1 = fgetcsv($open, 1000, ",");
    $line2 = fgetcsv($open, 1000, ",");
    return $line2;
}

//This function connects to the database and returns the connection object.

function connect(){
    $creds = readCSV("credentials.csv");
    $conn = new mysqli($creds[0], $creds[1], $creds[2], $creds[3]);
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    echo "Database Connection Status... Online || \n";
    return $conn;
}

//These functions retrieve the username and password from the html form. For login and signup scripts.

function getInfo($input){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $info = $_POST[$input];
        return $info;
    }
}

//This function creates a popup message with a custom message and then redirects to another page

function popUp($message,$redirect){
    echo '<script type="text/javascript">'; 
    echo 'alert("'.$message.'");';
    echo 'window.location.href = "'.$redirect.'";';
    echo '</script>';
}



?>