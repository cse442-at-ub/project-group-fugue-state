<?php
//require "../../connect.php";

session_start();

if (isset($_SESSION["logged_in"]) == false){
  $_SESSION["username"] = "No one is logged in";
  $_SESSION["button"] = "Sign In";
  $_SESSION["redirect"] = "/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/login.php"; #replace with global filepath not relative
  $_SESSION["redirect2"] = "/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/login.php";
  // $song_1 = "None";
  // $song_2 = "None";
  // $song_3 = "None";
  $_SESSION["redirect3"] = "/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/login.php";

}
else{
    $_SESSION["button"] = "Sign Out";
    $_SESSION["redirect"] = "/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/homepage.php";
    $_SESSION["redirect2"] = "/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/logoutbackend.php";
    $username = $_SESSION["username"];
    // $sql = "SELECT song_1, song_2, song_3 FROM recent_songs WHERE account_id = '$username'";
    // $result = $conn->query($sql);
    // $row = $result->fetch_assoc();
    // $song_1 = $row["song_1"];
    // $song_2 = $row["song_2"];
    // $song_3 = $row["song_3"];

    $_SESSION["redirect3"] = "/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/profile.php";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/globals.css">
    <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/styleguide.css">
    <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/style.css"> 
    <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/profile.css"> 
  </head>
  <body>
    <p>Logged in As: <?php echo $_SESSION["username"]; ?> </p>
    <div class="desktop-home-page">
      <div class="div">
        <div class="overlap">
          <div class="explore-box">
            <div class="explore"></div>
            <div class="text-wrapper">Explore</div>
          </div>
          <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/genre_song_page.php" class='button-med'>
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Rock</div>
            </div>
          </a>          
          <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/genre_song_page.php" class='overlap-wrapper'>
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Pop</div>
            </div>
          </a>          
          <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/genre_song_page.php" class='overlap-group-wrapper'>
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Country</div>
            </div>
          </a>          
          <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/genre_song_page.php" class='div-wrapper'>
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Jazz</div>
            </div>
          </a>          
          <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/genre_song_page.php" class='button-med-2'>
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Classical</div>
            </div>
          </a>
          <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/tbd.php" class='button-med-3'>
            <div class="overlap-group">
              <div class="rectangle"></div>
              <div class="text">Other</div>
            </div>
          </a>          
          <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/tbd.php" class='button-lg'>
            <div class="overlap-2">
              <div class="rectangle-2"></div>
              <div class="text-2">Trending</div>
            </div>
          </a>          
          <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/tbd.php" class='button-lg-2'>
            <div class="overlap-2">
              <div class="rectangle-2"></div>
              <div class="text-2">Random</div>
            </div>
          </a>          
        </div>
        <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/login.php" id="inoroutlink" class='sign-in'>
          <div class="text-wrapper-2"><?php echo $_SESSION["button"]; ?></div>
        </a> 

        <form action=<?php echo $_SESSION["redirect2"]; ?> method="post" id="inoroutform">
          <input class="text-wrapper-2" type="hidden" name="logout" value="true">
        </form>    

        <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/songView.php" class='button-sm'>
          <div class="overlap-3">
            <div class="rectangle-3"></div>
            <div class="text-3">New Song</div>
          </div>
        </a>        
        <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/tbd.php" class='button-sm-2'>
          <div class="overlap-3">
            <div class="rectangle-3"></div>
            <div class="text-3">Practice</div>
          </div>
        </a>        
        <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/tbd.php" class='button-sm-3'>
          <div class="overlap-3">
            <div class="rectangle-3"></div>
            <div class="text-3">Song List</div>
          </div>
        </a>        
        <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/tbd.php" class='button-sm-4'>
          <div class="overlap-3">
            <div class="rectangle-3"></div>
            <div class="text-3">Progress</div>
          </div>
        </a>        
        <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/tbd.php" class='settings'>
          <div class="ellipse-wrapper">
            <div class="ellipse"></div>
          </div>
        </a>
        <style>
          form {
            position: relative;
            /*background-color: #d9d9d9;*/
            width: 820px;
            /*height: 53px;*/
            /*border-radius: 43px;*/
            /*border: 0.5px solid;*/
            border-color: #cbc2c2;
            top: 107px;
            left: 345px;
          }

          input {
            position: absolute;
            background-color: #d9d9d9;
            width: 820px;
            height: 53px;
            border-radius: 43px;
            border-color: #d9d9d9;
            top: 0px;
            left: 0px;
            box-shadow: 0px 4px 4px #00000040;
            padding: 20px;
          }

          button {
            position: absolute;
            top: 5px;
            left: 860px;
            background-color: #d9d9d9;
            border-radius: 43px;
            border: 0.5px solid;
            border-color: #cbc2c2;
            height: 53px;
          }

          radio {
            position: relative
            top: 25px;
            width: 5px;
            height: 5px;
          }
          
        </style>
        <form action = "../../search.php" method = "get"   id= "search-bar"> 
          <input type="search" id="query" name="q" 
          placeholder="Search..." 
          aria-label="Search through site content">
          <div>
            <label>
              <input type="radio" name="searchType" value="genres" checked>
              Genres
            </label>
      
            <label>
              <input type="radio" name="searchType" value="songwriter">
              Songwriter
            </label>
      
            <label>
              <input type="radio" name="searchType" value="title">
              Title
            </label>
          </div>
      
          <button type="submit">Search</button>
        </form>
        <a href="<?php echo $_SESSION["redirect3"]; ?>" class='profile-icon'>
          <div class="overlap-4">
            <div class="ellipse-3"></div>
            <img class="img" src= "/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/img/ellipse-4-2.svg" />              
          </div>
        </a>        
        <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/homepage.php" class='logo-icon'>
          <img class="logo" src = "/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/img/logo.png" />
        </a>        
        <div class="rectangle-4"></div>
      </div>
      <div class="recent-searches-tab-homepage">
                    <div class="font">Recent Songs</div>
                </div>
                    <div class="recent-searches-box-homepage">
                      <div class="font"><?php echo $_SESSION["song_1"]; ?> </div>
                      <div class="font"><?php echo $_SESSION["song_2"]; ?> </div>
                      <div class="font"><?php echo $_SESSION["song_3"]; ?> </div>
                    </div>
    </div>
    <script>
                    function submitForm(){
                        document.getElementById("inoroutform").submit();
                    }

                    document.getElementById("inoroutlink").addEventListener("click", function(event){
                        event.preventDefault();
                        submitForm();
                    });

        </script>
  </body>
</html>
