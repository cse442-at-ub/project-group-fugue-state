<?php

/**
 * This function will read a song .txt file and return location data
 * for displaying chord progressions and lyrics correctly.
 */
function readSong($song){
    // Check if filename passed is a directory and returns error if true
    if (is_dir($song)) {
        // Error message
        echo "Error: song doesn't exist!";
        return -1;
    } else {
        $fp = fopen($song, 'r');
        if ($fp) {
            // Extract song title
            $title = fgets($fp);

            // Extract song author
            $author = fgets($fp);

            // Extract song key
            $songKey = fgets($fp);

            // Extract remaining song info
            while(!feof($fp)) {
                // Extract subsection info
            }
        }
        fclose($fp);
        return 1;
    }
}
?>