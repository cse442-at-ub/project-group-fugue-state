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
        <div class="top">
            <div class="yo">
                <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/homepage.php" class="logo-icon">
                    <img class="logo" src="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/img/logo.png">
                </a>
            </div>
            <div class="to">
                <form action="../../search.php" method="get" id="search-bar" data-gtm-form-interact-id="0"> 
                    <input type="search" class="search-bar" id="query" name="q" placeholder="Search..." aria-label="Search through site content" data-gtm-form-interact-field-id="0">
                    <button type="submit" class="search-button">Search</button>
                    <div class = "radio">
                        <label for="genres">
                            <input type="radio" name="searchType" value="genres" id="genres" data-gtm-form-interact-field-id="0"> Genres
                        </label>
                        <label for="songwriter">
                            <input type="radio" name="searchType" value="songwriter" id="songwriter" data-gtm-form-interact-field-id="2"> Songwriter
                        </label>
                        <label for="title">
                            <input type="radio" name="searchType" value="title" id="title" data-gtm-form-interact-field-id="1"> Title
                        </label>
                    </div>
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
                    div.editor {
                        position: relative;
                        top: 100px;
                        left: 42%;
                        width: 400px;
                        display: flex;
                        flex-direction: column;
                        transform: translate(-35%, -1%);
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

                        <label for="folk">Folk:</label>
                        <input type="checkbox" name="genres" id="folk" value="folk">

                        <label for="indie">Indie:</label>
                        <input type="checkbox" name="genres" id="indie" value="indie">

                        <label for="metal">Metal:</label>
                        <input type="checkbox" name="genres" id="metal" value="metal">
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
