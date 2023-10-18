<!DOCTYPE html>
<html>
  <head>
    <link href= "{{url_for('static', filename='globals.css')}}" rel = "stylesheet">
    <link href= "{{url_for('static', filename='styleguide.css')}}" rel = "stylesheet">
    <link href= "{{url_for('static', filename='style.css')}}" rel = "stylesheet">
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

        <img src= "{{url_for('static', filename='img/logo.png')}}" />
        <!--<img class="logo" src="img/logo.png" />-->

          <style>
              input[type=text] {
              width: 50%;
              padding: 12px 20px;
              margin: 8px 0;
              box-sizing: border-box;
              border: 1px solid #555;
              outline: none;
            }

            input[type=text]:focus {
              background-color: lightblue;
            }
          </style>
          <h2>Sign In</h2>
          <form action="../../loginbackend.php" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value=""><br>
            <label for="password">Password:</label><br>
            <input type="text" id="password" name="password" value=""><br><br>
            <a href="{{ url_for('home') }}">
              <input type="submit" value="login">
            </a>
          </form>
          <a href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/signup.php"> 
            <input type="submit" value="signup">
          </a>
      </div>
    </div>
  </body>
</html>