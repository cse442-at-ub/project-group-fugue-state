<?php
session_start():

if (isset($_GET['q'])) {
    $search_query = strtolower($_GET['q']);

    $artist_pages = [
        'taylor swift' => 'TaylorSwift.php',
        'ed sheeran' => 'EdSheeran.php',
        'lady gaga' => 'LadyGaga.php',
        'justin bieber' => 'JustinBieber.php',
        // Add more artists as needed
    ];

    if (array_key_exists($search_query, $artist_pages)) {
        $artist_page = $artist_pages[$search_query];
        // Redirect to the artist's page
        header("Location: $artist_page");
        exit();

        // Add page to user's recent searches list
        $user_id = $_SESSION['user_id'];
        $artist_name = $search_query;

        // Create a database connection (you need to replace this with your database connection code)
        //$pdo = new PDO('mysql:host=your_database_host;dbname=your_database_name', 'your_username', 'your_password');

        // Prepare and execute the SQL query to insert the recent search record
        //$stmt = $pdo->prepare("INSERT INTO recent_searches (user_id, artist_name) VALUES (?, ?)");
        //$stmt->execute([$user_id, $artist_name]);
    } else {
    }
}
?>