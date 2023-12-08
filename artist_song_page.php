<?php
require_once "connect.php";
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/globals.css">
        <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/styleguide.css">
        <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/style.css">
        <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/image.css">
    </head>
    <body>
        <div class="top">
            <div class="yo">
                <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/homepage.php" class="logo-icon">
                    <img class="logo" src="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/img/logo.png">
                </a>
            </div>
            <div class="to">
                <form action="../../search.php" method="get" id="search-bar" data-gtm-form-interact-id="0"> 
                    <input type="search" class="search-bar" id="query" name="q" placeholder="Search..." aria-label="Search through site content" data-gtm-form-interact-field-id="0">
                    <button type="submit" class="search-button">Search</button>
                    <label for="genres">
                        <input type="radio" name="searchType" value="genres" id="genres" data-gtm-form-interact-field-id="0"> Genres
                    </label>
                    <label for="songwriter">
                        <input type="radio" name="searchType" value="songwriter" id="songwriter" data-gtm-form-interact-field-id="2"> Songwriter
                    </label>
                    <label for="title">
                        <input type="radio" name="searchType" value="title" id="title" data-gtm-form-interact-field-id="1"> Title
                    </label>
                </form>
            </div>
            <div class="uo">
                <a href="<?php echo $_SESSION["redirect3"]; ?>" class='profile-icon'>
                    <div class="overlap-4">
                        <div class="ellipse-3"></div>
                        <img class="img" src= "/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/img/ellipse-4-2.svg" />              
                    </div>
                </a>
                <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/login.php" id="inoroutlink" class='sign-in'>
                    <div class="text-wrapper-2"><?php echo $_SESSION["button"]; ?></div>
                </a>
                <form action=<?php echo $_SESSION["redirect2"]; ?> method="post" id="inoroutform">
                    <input class="text-wrapper-2" type="hidden" name="logout" value="true">
                </form> 
                <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/tbd.php" class="settings">
                    <div class="ellipse-wrapper">
                        <div class="ellipse"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="desktop-home-page">
            <div class="div">
                <?php
                //if(isset($_GET['artist'])){
                    global $conn;
                    $artist_name = urldecode($_GET['artist']);
                    $songs = "SELECT * FROM songs WHERE LOWER(TRIM(songwriter)) = LOWER(TRIM('$artist_name'))";
                    $result = $conn->query($songs);
                    if ($result->num_rows > 0){
                        echo "<h2 class = 'title'>Songs by $artist_name</h2>";
                        echo "<ul class = 'list'>";
                        while ($row = $result->fetch_assoc()) {
                            $song_id = $row['song_id'];
                            $title = $row['title'];
                            $songwriter = $row['songwriter'];
                            echo "<li><a href='songView.php?song_id=$song_id'>$title</a></li>";
                            echo "<div>$songwriter</div>";

                        }
                        echo "</ul>";
                    }
                //}
                $conn->close();
                ?>
            </div>
        </div>
    </body>
</html>