<?php
session_start();

if ($_SESSION["logged_in"] == false){
  $_SESSION["username"] = "No one is logged in";
}
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
      //set session variable of the song ID 
      
        //function call to create section divs
        //inside that section create divs of key, chords and lyrics from the variables recieved from displayBackend
        function generatekey(key,maj_min) {
          var keyDiv = document.createElement("div");
          keyDiv.textContent = "Key: "+key+maj_min;
          return keyDiv
        } 
        function generatechords(chords) {
          var chordsDiv = document.createElement("div");
          chordsDiv.textContent = chords;
          return chordsDiv
        }
        function generatelyrics(lyrics) {
          var lyricsDiv = document.createElement("div");
          lyricsDiv.textContent = chords;
          return lyricsDiv
        }      
        function generateSection(section,key,maj_min,chords,lyrics,lines) {
          var songContainer = document.getElementById("song");

          var sectionDiv = document.createElement("div");
          sectionDiv.textContent = section;
          var keyDiv = generatekey(key,maj_min);

          sectionDiv.appendChild(keyDiv);
            
          for (let i = 0; i < lines; i++) {
            var chordDiv = generatechords(chords[i])
            var lyricDiv = generatelyrics(lyrics[i])
            sectionDiv.appendChild(chordsDiv);
            sectionDiv.appendChild(lyricsDiv);
          }

          songContainer.appendChild(sectionDiv)

        }
        fetch('../../displayBackend.php')
        //get varaibles 
        generateSection(section,key,maj_min,chords,lyrics,lines)
    </script>

</body>
</html>


    </div>
  </body>
</html>
