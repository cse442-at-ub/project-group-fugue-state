<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/static/globals.css">
        <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/styleguide.css">
        <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/style.css">
        <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/profile.css">
    </head>
        <body>
        <div class="desktop-home-page">
            <div class="div">
                <a href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/homepage.php" class='sign-in'>
                    <div class="text-wrapper-2">Sign out</div>
                </a>
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
                <a href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/home.php" class='logo-icon'>
                    <img class="logo" src = "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/static/img/logo.png" />
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
                <div class="profile-box">
                    <div class="font">Username: </div>
                    <input class="text-box" type="email" id="user" name="user" placeholder="User123">
                    <div class="username-button">
                        <input class="font3" type="submit" value="Save" />
                    </div>
                </div>
                <div class="info-box">
                    <div class="Email">
                        <div class="font">Email: 
                            <input class="text-box" type="email" id="email" name="email" placeholder="example@gamil.com">
                        </div>
                            <div class="email-button">
                                <input class="font3" type="submit" value="Save" />
                            </div>
                    </div>
                    <div class="Password">
                        <div class="font">New Password: 
                            <input class="text-box" type="password" id="password" name="password" placeholder="">
                        </div>
                        
                        <div class="font">Confirm Password:
                            <input class="text-box" type="password" id="password" name="password" placeholder="">
                        </div>
                        <div class="password-button">
                            <input class="font3" type="submit" value="Save" />
                        </div>
                    </div>
                </div>
                <div class="interests-box">
                    <div class="font">Music Type</div>
                    <div class="first-row">
                        <div>
                            <input type="checkbox" id="Rock" name="Rock" />
                            <label class="font" for="Rock">Rock</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Pop" name="Pop" />
                            <label class="font" for="Pop">Pop</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Country" name="Country" />
                            <label class="font" for="Country">Country</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Jazz" name="Jazz" />
                            <label class="font" for="Jazz">Jazz</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Classical" name="Classical" />
                            <label class="font" for="Classical">Classical</label>
                        </div>
                    </div>
                    <div class="second-row">
                        <div>
                            <input type="checkbox" id="Folk" name="Folk" />
                            <label class="font" for="Folk">Folk</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Indie" name="Indie" />
                            <label class="font" for="Indie">Indie</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Alt" name="Alt" />
                            <label class="font" for="Alt">Alt</label>
                        </div>
                        <div>
                            <input type="checkbox" id="Metal" name="Metal" />
                            <label class="font" for="Metal">Metal</label>
                        </div>
                    </div>
                    <div class="submit-row">
                        <div>
                            <input class="font3" type="submit" value="Submit" />
                        </div>
                    </div>
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