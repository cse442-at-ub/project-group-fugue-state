<?php
session_start():

if (isset($_GET['query'])) {
    $search_query = strtolower($_GET['query']);

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
    } else {
    }
}
?>