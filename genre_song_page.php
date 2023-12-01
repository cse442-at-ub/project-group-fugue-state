<?php
require_once "connect.php";
require_once "readSong.php";
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/static/globals.css">
        <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/static/styleguide.css">
        <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/static/style.css">
        <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/static/image.css">
    </head>
    <body>
        <div class="desktop-home-page">
            <div class="div">
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