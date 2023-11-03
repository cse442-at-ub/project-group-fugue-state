<?php

/**
 * This function will write html form data to a text file
 * in the song format. Data sent to this function should be in the form:
 *  string $title, string $author, string $key, 
 *      array $subsection1, array $subsection2, ...
 *  Note: the (...$songInfo) format passes a variable number of arguments
 *  as an array
 */
function writeSong(...$songInfo) {
    // Create song file
    // Open it in write mode
    // Write $title in "song title"; format
    // Write $author in A:"author name"; format
    // Write $key in K:$key; format 
    /**
     * Write data line by line in subsection format:
     *  subsectionName&# optionalKey {
     *  Chord Progression lines->Crow#:column#[$key] with additional $keys seperated by comma column#[$key] and line terminated by ;
     *  Lryic lines->Lrow#:"lyrics on this line";    
     *  };
     * 
     *  */ 
}

?>