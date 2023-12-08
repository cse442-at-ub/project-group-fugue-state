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
    </div>
    <div class="desktop-home-page">
      <div class="div">
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
          <style>
            h1 {
                font-size: 32px;
            }
            h2{
            	font-size: 16px;
                margin:	2.5% 25%;
            }

            div.relative {
            text-align: center;
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
            input[id=signup]{
            width: 50%;
            background-color: white;
            color: black;
            padding: 14px 20px;
            margin: 8px 0;
            border: black;
            border-radius: 8px;
            cursor: pointer;
            }
          </style>
          <div class="relative">
            <h1>Reset Code:</h1>
            <form action="../../resetcodebackend.php" method="post">
              <input type="username" id="email" name="email" placeholder="Email" value=""><br><br>
              <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/login.php">
                <input type="submit" value="Send Code">
              </a>
            <h2>or</h2>
            </form>
            <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/login.php">
              <input type="submit" id="signup" value="Login">
            </a>
      </div>
    </div>
  </body>
</html>