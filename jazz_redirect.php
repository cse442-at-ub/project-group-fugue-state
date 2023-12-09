<?php
require_once "connect.php";

<!DOCTYPE html>
<html>
    <form action="../../search.php" method="get" id="genre_redirect">
        <input type="hidden" name="q" value="jazz">
        <input type="hidden" name="searchType" value="genres">
        <input type="submit" value="Submit">
    </form> 

    <script>
        document.getElementById('myForm').submit(); 
    </script>
</html>
?>