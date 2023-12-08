<?php
session_start();

if (isset($_GET['song_id']) && is_numeric($_GET['song_id'])) {
    $selectedSongID = $_GET['song_id'];

    $_SESSION['selected_song_id'] = $selectedSongID;

} else {
}
?>
