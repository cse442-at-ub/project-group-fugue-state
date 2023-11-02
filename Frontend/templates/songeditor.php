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

          </style>
          <div class="relative">
            <h1>TITLE</h1>
            <form action="editorbackend.php" method="post">
              <input type="input" id="title" name="title" placeholder="Title" value=""><br><br>
              <a href="">
                <input type="submit" value="submit">
              </a>
            </form>
            <h2>line editor</h2>
            <form action="editorbackend.php" method="post">
                <label for="section">Section:</label>
                <select id="section" name="section">
                  <option value="chorus">chorus</option>
                  <option value="verse">verse</option>
                  <option value="bridge">bridge</option>
                </select>
                <label for="key">Key:</label>
                <select id="key" name="key">
                  <option value="A">A</option>
                  <option value="C">C</option>
                </select>
                 <select id="mm" name="mm">
                  <option value="Major">Major</option>
                  <option value="Minor">Minor</option>
                </select>
                <label for="chord">chord:</label>
                <select id="col1" name="col1">
                  <option value="A">A</option>
                  <option value="C">C</option>
                </select>
                <select id="col2" name="col2">
                  <option value="A">A</option>
                  <option value="C">C</option>
                </select>
                <select id="col3" name="col3">
                  <option value="A">A</option>
                  <option value="C">C</option>
                </select>
                <select id="col4" name="col4">
                  <option value="A">A</option>
                  <option value="C">C</option>
                </select>
                <select id="col5" name="col5">
                  <option value="A">A</option>
                  <option value="C">C</option>
                </select>
                <select id="col6" name="col6">
                  <option value="A">A</option>
                  <option value="C">C</option>
                </select>
                <select id="col7" name="col7">
                  <option value="A">A</option>
                  <option value="C">C</option>
                </select>
                <select id="col8" name="col8">
                  <option value="A">A</option>
                  <option value="C">C</option>
                </select>
                <select id="col9" name="col9">
                  <option value="A">A</option>
                  <option value="C">C</option>
                </select>
                <select id="col10" name="col10">
                  <option value="A">A</option>
                  <option value="C">C</option>
                </select>
                <input type="input" id="title" name="title" placeholder="Title" value=""><br>
               <a href="">
                <input type="submit" value="submit">
               </a>
            </form>

            </a>
      </div>
    </div>
  </body>
</html>
