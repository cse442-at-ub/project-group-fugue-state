<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/globals.css">
    <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/styleguide.css">
    <link rel="stylesheet" type="text/css" href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .desktop-home-page {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .lineEditor {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 32px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label, input, select {
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="desktop-home-page">
        <a href="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/templates/homepage.php" class='logo-icon'>
            <img class="logo" src="/CSE442-542/2023-Fall/cse-442o/git_repo/project-group-fugue-state/Frontend/static/img/logo.png"" />
        </a>

        <div class="lineEditor">
            <h1>Song Editor</h1>
            <form action="../../editorbackend.php" method="post">
                <div class="title">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" placeholder="Song Title" required>
                </div>

                <div class="section">
                    <label for="section">Section:</label>
                    <select id="section" name="section">
                        <option value="chorus">Chorus</option>
                        <option value="verse">Verse</option>
                        <option value="bridge">Bridge</option>
                    </select>
                </div>

                <div class="key">
                    <label for="key">Key:</label>
                    <select id="key" name="key">
                        <option value="A">A</option>
                        <option value="C">C</option>
                    </select>
                </div>

                <div class="lineChords">
                    <label for="chord">Chords:</label>
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
                </div>

                <div class="lyrics">
                    <label for="lyrics">Lyrics:</label>
                    <input type="text" id="lyrics" name="lyrics" placeholder="Enter lyrics" required>
                </div>

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
