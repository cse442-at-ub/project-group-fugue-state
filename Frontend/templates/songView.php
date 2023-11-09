<?php
session_start();

if ($_SESSION["logged_in"] == false){
  $_SESSION["username"] = "No one is logged in";
}

if (isset($_GET['song_id']) && is_numeric($_GET['song_id'])) {
    $selectedSongID = $_GET['song_id'];

    $_SESSION['selected_song_id'] = $selectedSongID;

}
include '../../readSong.php';
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
    /*test code
    var sections = ["verse", "chorus", "bridge"];
    var keys = ["D", "minor"];
    var chords = ["a   b", "something else", "test", "drive  her", "more testws", "afdklahfka"];
    var lyrics = ["here comes the sun", "dodododod", "here comes the sun", "and I say", "It's alright", "done"];
    var lines = [2, 2, 2];
    */
    var keys = ["",""]
    var title = getTitle($_GET['song_id'])
    var artist = getArtist($_GET['song_id'])
    keys[0]  = getKey($_GET['song_id'])
    var arrangment = getArrangement($_GET['song_id'])
    var chords = getChords($_GET['song_id'])
    var lyrics = getLyrics($_GET['song_id'])

    var songContainer = document.getElementById("song");

    songContainer.textContent = title;
    songContainer.textContent = "by: " + artist;


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
