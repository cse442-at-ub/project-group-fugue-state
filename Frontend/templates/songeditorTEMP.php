<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/globals.css">
    <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/styleguide.css">
    <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/style.css">
    <style>
        /* Hide additional rows by default */
        .hidden-row {
            display: none; /* Remove this line to make the row visible */
        }

        /* Center the form on the screen */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Adjust as needed */
        }

        /* Style adjustments for better alignment */
        .form-container form {
            max-width: 600px; /* Adjust as needed */
            width: 100%;
        }

        .form-container .div {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="desktop-home-page">
        <div class="form-container">
            <div class="div">
                <div class="overlap"></div>
                <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/homepage.php" class='logo-icon'>
                    <img class="logo" src = "/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/img/logo.png" />
                </a>
                <form action="../../editorbackend.php" method="post">
                    <label for="Title">Title:</label>
                    <input type="text" name="formTitle" id="formTitle" required />
                    <label for="Key">Key:</label>
                    <input type="text" name="key" id="key" required />
                    <table id="songTable">
                        <!-- Row template for cloning -->
                        <tr class="hidden-row" id="rowTemplate">
                            <td>
                                <label for="line">Line:</label>
                            </td>
                            <td>
                                <select name="section_dropdown" class="section-dropdown">
                                    <option value="nothing"> </option>
                                    <option value="intro">intro</option>
                                    <option value="chorus">chorus</option>
                                    <option value="verse">verse</option>
                                    <option value="bridge">bridge</option>
                                </select>
                            </td>
                            <td></td>
                            <td>
                                <input type="text" name="line_text" class="line-text" />
                            </td>
                            <td>
                                <label>
                                    <input type="radio" name="line_option" value="chord" /> Chord
                                </label>
                                <label>
                                    <input type="radio" name="line_option" value="lyric" /> Lyric
                                </label>
                            </td>
                        </tr>
                    </table>
                    
                    <button type="button" onclick="addRows(10)">Add page</button>
                    <input type="submit" value="Submit">
                </form>

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
    </div>
</body>
</html>
