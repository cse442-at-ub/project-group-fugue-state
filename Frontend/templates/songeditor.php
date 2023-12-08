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
    <style>
        /* Hide additional rows by default */
        .hidden-row {
            display: none; Remove this line to make the row visible */
        }
    </style>
  </head>
  <body>
    <div class="desktop-home-page">
        <div class="div">
            <div class="overlap"></div>
            <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/homepage.php" class='logo-icon'>
            <img class="logo" src = "/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/img/logo.png" />
            </a>
            <style>
                 div.editor {
                    position: relative;
                    top:260px;
                    left: 400px;
                    }
            </style>

            <div class="editor">
                <form action="../../editorbackend.php" method="post">
                    <label for="Title">Title:</label>
                    <input type="text" name="formTitle" id="formTitle" required />
                    <div>
                    <label for="Key">Key:</label>
                    <input type="text" name="key" id="key" required />
                    </div>
                    <div>
                    <label for="Key">Artist:</label>
                    <input type="text" name="artist" id="artist" required />
                    </div>
                    <div>
                    <label for="rock">Rock:</label>
                    <input type="checkbox" name="genres" id="rock" value="rock">

                    <label for="pop">Pop:</label>
                    <input type="checkbox" name="genres" id="pop" value="pop">

                    <label for="country">Country:</label>
                    <input type="checkbox" name="genres" id="country" value="country">

                    <label for="jazz">Jazz:</label>
                    <input type="checkbox" name="genres" id="jazz" value="jazz">
                    
                    <label for="classical">Classical:</label>
                    <input type="checkbox" name="genres" id="classical" value="classical">

                    <label for="other">other:</label>
                    <input type="checkbox" name="genres" id="other" value="other">
                    </div>

                    <table id="songTable">
                        <!-- Row template for cloning -->
                        <tr class="hidden-row" id="rowTemplate">
                            <td>
                                <label for="line">Line:</label>
                            </td>
                            <td>
                            <input type="text" name="line_section" class="line-section" placeholder="section" />
                            </td>
                            <td></td>
                            <td>
                                <input type="text" name="line_text" class="line-text" />
                            </td>
                            <td>
                            <select name="lyric_dropdown" class="lyric-dropdown">
                                    <option value="nothing"> </option>
                                    <option value="lyric">lyric</option>
                                    <option value="chord">chord</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    
                    <button type="button" onclick="addRows(10)">Add page</button>
                    <input type="submit" value="Submit">
                </form>
            </div>
            <script>
                function addRows(numRows) {
                    var table = document.getElementById("songTable");
                    var rowTemplate = document.getElementById("rowTemplate");

                    for (var i = 0; i < numRows; i++) {
                        // Clone the row template and append it to the table
                        var newRow = rowTemplate.cloneNode(true);
                        newRow.classList.remove("hidden-row");
                        table.appendChild(newRow);
                    }
                }
            </script>
        </div>
    </div>
</body>
</html>
