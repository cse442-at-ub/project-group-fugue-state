<?php
require "connect.php"

session_start();

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
        global $conn;
        $username = $_SESSION['username'];
        $songname = $search_query;
        recentSearches($username, $songname, $conn);

        $sql = "INSERT INTO recent_songs (account_id, song_1) VALUES ($username, $songname)");
        $conn->query($sql);
    } else {
    }
}
?>