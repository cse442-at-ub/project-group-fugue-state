<?php
require '/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/connect.php';
require '/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/readSong.php';

session_start();

if ($_SESSION["logged_in"] == false){
  $_SESSION["username"] = "No one is logged in";
}

$song_id = $_GET['song_id'];

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/static/globals.css">
    <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/static/styleguide.css">
    <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/static/style.css">
    <!--
      <link rel="stylesheet" href="globals.css" />
      <link rel="stylesheet" href="styleguide.css" />
      <link rel="stylesheet" href="style.css" />
    -->
  </head>
  <body>
    <div class="desktop-home-page">
      <div class="div">
        <div class="overlap">

        </div>

        <a href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/homepage.php" class='logo-icon'>
          <img class="logo" src = "/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/static/img/logo.png" />
        </a>
        <!--<img class="logo" src="img/logo.png" />-->

      
    <div id="song"></div>

    <script>
    
    function generatekey(key, maj_min) {
      var keyDiv = document.createElement("div");
      keyDiv.textContent = "Key: " + key + maj_min;
      return keyDiv;
    } 

    function generatechords(chords) {
      var chordsDiv = document.createElement("div");
      chordsDiv.textContent = chords;
      return chordsDiv;
    }

    function generatelyrics(lyrics) {
      var lyricsDiv = document.createElement("div");
      lyricsDiv.textContent = lyrics;
      return lyricsDiv;
    }    

    function generateSection(section, chords, lyrics, lines) {
      var songContainer = document.getElementById("song");

      var sectionDiv = document.createElement("div");
      sectionDiv.textContent = section;

      for (let i = 0; i < lines; i++) {
        var chordDiv = generatechords(chords[i]);
        var lyricDiv = generatelyrics(lyrics[i]);
        sectionDiv.appendChild(chordDiv);
        sectionDiv.appendChild(lyricDiv);
      }

      songContainer.appendChild(sectionDiv);
    }
    
    var keys = ["",""];
    var title = "<?php echo json_decode(getTitle($song_id)); ?>";
    var artist = "<?php echo json_decode(getArtist($song_id)); ?>";
    keys[0]  = "<?php echo json_decode(getKey($song_id)); ?>";
    var arrangement = "<?php echo json_decode(getArrangement($song_id)); ?>";
    var chords = "<?php echo json_decode(getChords($song_id)); ?>";
    var lyrics = "<?php echo json_decode(getLyrics($song_id)); ?>";
    
    var sections = [];
    var lines = [];
    for(let i = 0; i < arrangement.length; i++){
      var obj = arrangement[i];
      lines.push(obj['Lines']);
      sections.push(obj['Name']);
    }
    
    var songContainer = document.getElementById("song");

    songContainer.textContent = title;
    songContainer.textContent += " by: " + artist;

    songContainer.appendChild(generatekey(keys[0], keys[1]));

    for (let i = 0; i < sections.length; i++) {
      var chunk = i > 0 ? lines[i - 1] : 0;
      var section_chords = chords.slice(chunk, chunk + lines[i]);
      var section_lyrics = lyrics.slice(chunk, chunk + lines[i]);

      generateSection(sections[i], section_chords, section_lyrics, lines[i]);
    }
  </script>
</body>
</html>
