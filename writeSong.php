<?php
class ChordLine {
    public function __construct(int $line, array $chords) {
        $this->line = $line;
        $this->chords = $chords;
    }
}

class LyricLine {
    public function __construct(int $line, string $lyrics) {
        $this->line = $line;
        $this->lyrics = $lyrics;
    }
}

class SongSubSection {
    public function __construct(string $section, int $lines, array $chords, array $lyrics) {
        $this->section = $section;
        $this->lines = $lines;
        $this->chords = $chords;
        $this->lyrics = $lyrics;        
    }
}

class Arrangement {    
    public function __construct(array $subsections) {
        $this->subsections = $subsections;
    }
}

class Song {
    public function __construct(string $title, string $author, string $key = "C", Arrangement $arrangement) {
        $this->title = $title;
        $this->author = $author;
        $this->key = $key;
        $this->arrangement = $arrangement;
    }
}

/**
 * This function will write html form data to a text file
 * in the song format. 
 */
function writeSong(Song $song) {
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