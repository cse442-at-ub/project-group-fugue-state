<?php

//Importing all necessary files

require "connect.php";
require "login.php";
require "signup.php";
require "forgotpwd.php";

$conn = connect();

//Theses are tests for the functions in the files. They will be removed once the app is complete.

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

//All tests successful so far 



//remove this so file can always run on server

$conn->close();

?>