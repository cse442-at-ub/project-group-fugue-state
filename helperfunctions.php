<?php 

//These functions retrieve the username and password from the html form. For login and signup scripts.

function getInfo($input){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $info = $_POST[$input];
        return $info;
    }
}

//This function creates a popup message with a custom message and then redirects to another page

function popUp($message){
    echo '<script type="text/javascript">'; 
    echo 'alert("'.$message.'");';
    echo '</script>';
}

function redirectPage($redirect){
    echo '<script type="text/javascript">'; 
    echo 'window.location.href = "'.$redirect.'";';
    echo '</script>';
}

$loginPath = "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/login.php";
$signupPath = "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/signup.php";
$homePath = "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/homepage.php";
$profilePath = "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/profile.php";
$usersPath = "../Users/";
//$usersPath = "./Users/";

?>