<!DOCTYPE html>
<html>
  <style>
    div.relative {
    position: relative;
    top:260px;
    left: 400px;
    }
  </style>
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
          <div class="relative">
              <h2>Sign In</h2>
              <form action="signup.php" method="post">
                <label for="username">Create Username:</label><br>
                <input type="text" id="username" name="username" value=""><br>
                <label for="email">Enter Email:</label><br>
                <input type="text" id="email" name="email" value=""><br>
                <label for="password">Create Password:</label><br>
                <input type="text" id="password" name="password" value=""><br><br>
                <label for="confirm_password">Confirm Password:</label><br>
                <input type="text" id="confirm_password" name="confirm_password" value=""><br><br>
                <a href="{{ url_for('login') }}">
                  <input type="submit" value=signup>
                </a>
            </form>
          </div>
      </div>
    </div>
  </body>
</html>
