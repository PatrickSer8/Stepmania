<pre>
<?php

$jsonData = json_decode(file_get_contents("playlist.json"), true);
$song = json_decode($_POST['song'], true); 
    $songTitle = $song['title'];
    $songArtist = $song['artist'];
    $songMusic = $song['music'];
    $songGame = $song['game'];
    $songDuration = $song['duration'];
    $songImg = $song['img'];


    foreach ($jsonData['songs'] as $index => $entry) {
        if (
            $entry['title'] === $songTitle &&
            $entry['artist'] === $songArtist &&
            $entry['music'] === $songMusic &&
            $entry['game'] === $songGame &&
            $entry['duration'] === $songDuration &&
            $entry['img'] === $songImg
        ) {
            unset($jsonData['songs'][$index]);
            break; 
        }
    }
    file_put_contents("playlist.json", json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
header("Location: songlist.php");
exit;

?>
</pre>