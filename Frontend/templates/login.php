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
          <style>
            div.relative {
            position: relative;
            top:260px;
            left: 400px;
            box-sizing: border-box;
            border: 3px solid #FFFFFFFF;
            }
          </style>
          <div class="relative">
            <h2>Sign In</h2>
            <form action="../../login.php" method="post">
              <label for="username">Username:</label><br>
              <input type="text" id="username" name="username" value=""><br>
              <label for="password">Password:</label><br>
              <input type="text" id="password" name="password" value=""><br><br>
              <a href="{{ url_for('home') }}">
                <input type="submit" value="login">
              </a>
            </form>
            <form action="../../signup.php" method="post">
              <a href="{{ url_for('sign_up') }}">
                <input type="submit" value="signup">
              </a>
            </form>
        </div>
      </div>
    </div>
  </body>
</html>
