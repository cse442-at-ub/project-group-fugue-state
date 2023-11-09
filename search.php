<?php
require "connect.php";

session_start();

if (isset($_GET['q'])) {
    $search_query = strtolower($_GET['q']);

    $artist_pages = [
        'taylor swift' => '/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/TaylorSwift.php',
        'ed sheeran' => '/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/EdSheeran.php',
        'lady gaga' => '/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/LadyGaga.php',
        'justin bieber' => '/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/JustinBieber.php',
        // Add more artists as needed
    ];

    if (array_key_exists($search_query, $artist_pages)) {
        $artist_page = $artist_pages[$search_query];
        // Redirect to the artist's page
        header("Location: $artist_page");
        exit();

        // Add page to user's recent searches list
        $username = $_SESSION['username'];
        $songname = $search_query;
        recentSearches($username, $songname);
    } else {
        $homepage = '/CSE442-542/2023-Fall/cse-442o/project-group-fugue-state/Frontend/templates/homepage.php';
        header("Location: $homepage");
        exit();
    }
}
?>