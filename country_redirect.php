<?php
require_once "connect.php";
session_start();
?>

<!DOCTYPE html>
<html>
    <form action="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/search.php" method="get" id="genre_redirect">
        <input type="hidden" name="q" value="country">
        <input type="hidden" name="searchType" value="genres">
        <input type="submit" value="Submit">
    </form> 

    <script>
        window.onload = function() {
            document.getElementById('genre_redirect').submit(); 
        };
    </script>
</html>
