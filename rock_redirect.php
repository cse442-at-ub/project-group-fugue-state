<?php
require_once "connect.php";
session_start();
?>

<!DOCTYPE html>
<html>
    <form action="../../search.php" method="get" id="genre_redirect">
        <input type="hidden" name="q" value="rock">
        <input type="hidden" name="searchType" value="genres">
        <input type="submit" value="Submit">
    </form> 

    <script>
        window.onload = function() {
            document.getElementById('genre_redirect').submit(); 
        };
    </script>
</html>
