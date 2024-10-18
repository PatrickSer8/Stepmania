<pre>
<?php

print_r($_POST);

print_r($_FILES);

 print_r(getcwd());

$ogmusic = $_POST["ogmusic"];
$ogimg = $_POST["ogimg"];
$oggame = $_POST["oggame"];
$ogduration = $_POST["ogduration"];

$musicFilePath = "../music/" . $_FILES["music"]["name"];
$imageFilePath = "../img/" . $_FILES["img"]["name"];
$gameFilePath = "../game/" . $_FILES["game"]["name"];
$songduration = $_POST["songduration"];

//checks if there was a new file added and that its not the same then uploads the new one or keeps the old one
if (!empty($_FILES["music"]["name"]) && $musicFilePath !== $ogmusic) {
    unlink($ogmusic);
    move_uploaded_file($_FILES["music"]["tmp_name"], "../music/" . $_FILES["music"]["name"]);
    } else {
    $musicFilePath = $ogmusic;
    $songduration = $ogduration;
}

if (!empty($_FILES["img"]["name"]) && $imageFilePath !== $ogimg) {
    unlink($ogimg);
    move_uploaded_file($_FILES["img"]["tmp_name"], "../img/" . $_FILES["img"]["name"]);
    } else {
    $imageFilePath = $ogimg;
}

if (!empty($_FILES["game"]["name"]) && $gameFilePath !== $oggame) {
    unlink($oggame);
    move_uploaded_file($_FILES["game"]["tmp_name"], "../game/" . $_FILES["game"]["name"]);
    } else {
    $gameFilePath = $oggame;
}

$data = array(
    "title" => $_POST["title"],
    "artist" => $_POST["artist"],
    "music" => $musicFilePath,
    "game" => $gameFilePath,
    "img" => $imageFilePath,
    "duration" => $songduration
);

$jsonData = json_decode(file_get_contents("playlist.json"), true);
//deletes the old data
foreach ($jsonData['songs'] as $index => $entry) {
    if (
        $entry['music'] === $ogmusic &&
        $entry['game'] === $oggame &&
        $entry['duration'] === $ogduration &&
        $entry['img'] === $ogimg
    ) {
        unset($jsonData['songs'][$index]);
        break; 
    }
}

$jsonData["songs"][] = $data;
file_put_contents("playlist.json", json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

header("Location: songlist.php");
exit;

?>
</pre>