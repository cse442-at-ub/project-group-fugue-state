<!DOCTYPE html>
<html>
  <style>
    div.relative {
    position: relative;
    top:260px;
    left: 400px;
    }
    h1{
    font-size: 32px;
    }
    input[type=submit] {
            width: 25%;
            background-color: #0349fc;
            color: white;
            padding: 14px 20px;
            margin: 8px 12.5%;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            }
    input[type=username], select {
            width: 50%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            }

    input[type=password] {
            width: 50%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
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

            input[type=username]:focus {
              background-color: lightblue;
            }
            input[type=password]:focus {
              background-color: lightblue;
            }
            </style>
          <div class="relative">
              <h1>Sign Up:</h1>
              <form action="../../signupbackend.php" method="post">
                <label for="username">Create Username:</label><br>
                <input type="username" id="username" name="username" placeholder="Username" value=""><br>
                <label for="email">Enter Email:</label><br>
                <input type="username" id="email" name="email" placeholder="example@gmail.com" value=""><br>
                <label for="password">Create Password:</label><br>
                <input type="password" id="password" name="password" placeholder="Password" value=""><br><br>
                <label for="confirm_password">Confirm Password:</label><br>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Password" value=""><br><br>
                <a href="/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/login.php">
                  <input type="submit" value="Sign up">
                </a>
            </form>
          </div>
      </div>
    </div>
  </body>
</html>
