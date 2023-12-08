<?php

require_once "connect.php";
require_once "readSong.php";

session_start();

if ($_SESSION["logged_in"] == false){
  $_SESSION["username"] = "No one is logged in";
}

$song_id = $_GET['song_id'];
// $song_id = 711880;

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/globals.css">
    <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/styleguide.css">
    <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/style.css">
    <!--
      <link rel="stylesheet" href="globals.css" />
      <link rel="stylesheet" href="styleguide.css" />
      <link rel="stylesheet" href="style.css" />
    -->
  </head>
  <body>
    <div class="top">
      <div class="yo">
        <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/homepage.php" class="logo-icon">
          <img class="logo" src="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/img/logo.png">
        </a>
      </div>
      <div class="to">
        <form action="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/search.php" method="get" id="search-bar" data-gtm-form-interact-id="0"> 
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
    <style>
      #song {
    position: relative;
    top:260px;
    left: 400px;
    width: 400px;
    }
    </style>  
    <div id="song"></div>

    <script>
    
    function generatekey(key, maj_min) {
      var keyDiv = document.createElement("div");
      keyDiv.textContent = "Key: " + key + maj_min;
      return keyDiv;
    } 

    function generatechords(chords) {
      var chordsDiv = document.createElement("div");
  	  chordsDiv.innerHTML = chords.replace(/ /g, '&nbsp;');
      return chordsDiv;
    }

    function generatelyrics(lyrics) {
      var lyricsDiv = document.createElement("div");
      lyricsDiv.innerHTML = lyrics.replace(/ /g, '&nbsp;');
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
    var title = "<?php echo getTitle($song_id); ?>";
    var artist = "<?php echo getArtist($song_id); ?>";
    keys[0]  = <?php echo getKey($song_id); ?>;
    
    var arrangement = <?php echo getArrangement($song_id); ?>;
    var chords = <?php echo getChords($song_id); ?>;
    var lyrics = <?php echo getLyrics($song_id); ?>;


    var songContainer = document.getElementById("song");

    songContainer.innerHTML = title;
    var artistDiv = document.createElement("div");
    artistDiv.textContent = " by: " + artist;
    songContainer.appendChild(artistDiv);
    songContainer.appendChild(generatekey(keys[0], keys[1] || ""));

    var sections = [];
    var lines = [];
    for(let i = 0; i < arrangement.length; i++){
      var obj = arrangement[i];
      lines.push(obj['Lines']);
      sections.push(obj['Name']);
    }
    
    


    


    for (let i = 0; i < sections.length; i++) {
      var chunk = i > 0 ? lines[i - 1] : 0;
      var section_chords = chords.slice(chunk, chunk + lines[i]);
      var section_lyrics = lyrics.slice(chunk, chunk + lines[i]);

      generateSection(sections[i], section_chords, section_lyrics, lines[i]);
    }
  </script>
</body>
</html>
