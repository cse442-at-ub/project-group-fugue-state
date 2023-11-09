<?php
// require "connect.php";
session_start();

if (isset($_SESSION["logged_in"])){
    $_SESSION["button"] = "Sign Out";
    $_SESSION["redirect"] = "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/homepage.php";
    $_SESSION["redirect2"] = "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/logoutbackend.php";

    $username = $_SESSION["username"];
    // $sql = "SELECT song_1, song_2, song_3 FROM recent_songs WHERE account_id = '$username'";
    // $result = $conn->query($sql);
    // $row = $result->fetch_assoc();
    // $song_1 = $row["song_1"];
    // $song_2 = $row["song_2"];
    // $song_3 = $row["song_3"];

}else{
    $_SESSION["button"] = "Sign In";
    $_SESSION["redirect"] = "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/login.php"; #replace with global filepath not relative
    $_SESSION["redirect2"] = "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/login.php";

    $song_1 = "None";
    $song_2 = "None";
    $song_3 = "None";
}
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/static/globals.css">
        <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/static/styleguide.css">
        <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/static/style.css">
        <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/static/profile.css">
    </head>
        <body>
        <div class="desktop-home-page">
            <div class="div">
                <!-- <a href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/homepage.php" class='sign-in'>
                    <div class="text-wrapper-2"><?php echo $_SESSION["button"]; ?></div>
                </a> -->

                <div class="sign-in">
                    <form action=<?php echo $_SESSION["redirect2"]; ?> method="post">
                        <input class="text-wrapper-2" type="submit" id="true" name = "true" value=<?php echo $_SESSION["button"]; ?> />
                        <input class="text-wrapper-2" type="hidden" name="logout" value="true">
                    </form>
                </div>


                <a href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/tbd.php" class='settings'>
                    <div class="ellipse-wrapper">
                        <div class="ellipse"></div>
                    </div>
                </a>
                <a href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/profile.php" class='profile-icon'>
                    <div class="overlap-4">
                        <div class="ellipse-3"></div>
                        <img class="img" src= "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/static/img/ellipse-4-2.svg" />
                    </div>
                </a>
                <a href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/homepage.php" class='logo-icon'>
                    <img class="logo" src = "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/static/img/logo.png" />
                </a>
                <div class="rectangle-4"></div>
                <div class="profile-tab">
                    <div class="font">Profile</div>
                    <div class="font2">Your usename will be displayed to other users</div>
                </div>
                <div class="info-tab">
                    <div class="font">Personal Information</div>
                </div>
                <div class="interests-tab">
                    <div class="font">Preferences</div>
                </div>
                <!-- Updates the Username for the user -->
                <!-- Displays Username -->
                <form action="../../profilebackendnewU.php" method="post">
                    <!-- PlaceHolder Displays Username-->
                    <div class="profile-box">
                        <div class="font">New Username: </div>
                        <input class="text-box" type="text" id="username" name="username" placeholder="User123">
                        <div class="username-button">
                            <a href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/profile.php">
                                    <input type="submit" value="Save" />
                                </a>
                        </div>
                    </div>
                </form>
                <!-- Displays the Email and Password -->
                <!-- Password Checks for Old Password -->
                <form action="../../profilebackendnewP.php" method="post">
                    <div class="info-box">
                        <div class="Email">
                            <!-- Placehodler displays email -->
                        </div>
                        <div class="Password">
                            <div class="font">Current Password: 
                                <input class="text-box" type="password" id="password" name="oldpassword" placeholder="">
                            </div>
                            
                            <div class="font">New Password:
                                <input class="text-box" type="password" id="password" name="password" placeholder="">
                            </div>
                            <div class="password-button">
                                <a href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/profile.php">
                                    <input class="font3" type="submit" value="Save" />
                                </a>
                            </div>
                        </div>
                    </div>
                </form >
                <!--if you add the word checked in the <input ..... checked> it would show up as if the box was checked -->
                <form action="../../profilebackendaddPref.php" method="post">
                    <div class="interests-box">
                        <div class="font">Music Type</div>
                        <div class="first-row">
                            <div>
                                <input type="checkbox" id="Rock" name="Rock" value="Yes"/>
                                <label class="font" for="Rock">Rock</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Pop" name="Pop" value="Yes" />
                                <label class="font" for="Pop">Pop</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Country" name="Country" value="Yes"/>
                                <label class="font" for="Country">Country</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Jazz" name="Jazz" value="Yes"/>
                                <label class="font" for="Jazz">Jazz</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Classical" name="Classical" value="Yes"/>
                                <label class="font" for="Classical">Classical</label>
                            </div>
                        </div>
                        <div class="second-row">
                            <div>
                                <input type="checkbox" id="Folk" name="Folk" value="Yes"/>
                                <label class="font" for="Folk">Folk</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Indie" name="Indie" value="Yes"/>
                                <label class="font" for="Indie">Indie</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Alt" name="Alt" value="Yes"/>
                                <label class="font" for="Alt">Alt</label>
                            </div>
                            <div>
                                <input type="checkbox" id="Metal" name="Metal" value="Yes"/>
                                <label class="font" for="Metal">Metal</label>
                            </div>
                        </div>
                        <div class="submit-row">
                            <div>
                                <a href= "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/profile.php">
                                    <input class="font3" type="submit" value="Submit" />
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="recent-searches-tab">
                    <div class="font">Recent Songs</div>
                </div>
                    <div class="recent-searches-box">
                      <!-- <div class="font"><?php echo $song_1; ?> </div>
                      <div class="font"><?php echo $song_2; ?> </div>
                      <div class="font"><?php echo $song_3; ?> </div> -->
                    </div>
            </div>
        </div>
    </body>
</html>




<!-- GIG APP links back to homepage
<!DOCTYPE html>
<html>
    <head>
        <link href= "{{url_for('static', filename='profile.css')}}" rel = "stylesheet">
    </head>
    <body>
        <div class = "header"> 
            <div class = "logo">
                GIG APP links back to homepage
                <a href="{{ url_for('home') }}" class='logo-icon'>
                    <img src= "{{url_for('static', filename='img/logo.png')}}" />
                </a>
                
            </div>

            <div class = "profile-icon">  
                icon
            </div>

            <div class = "sign-out">
                sign-out
            </div>
        </div>
        <div class = "sidebar">
            <div class = "sidebar-link">
                profile
            </div>
            <div class = "sidebar-link">
                personal info
            </div>
            <div class = "sidebar-link">
                Interests
            </div>
        </div>
        
    </body>
</html> 
-->