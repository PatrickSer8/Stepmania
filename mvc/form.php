<pre>
<?php

print_r($_POST);

print_r($_FILES);

 print_r(getcwd());

$musicFilePath = "../music/" . $_FILES["music"]["name"];
$imageFilePath = "../img/" . $_FILES["img"]["name"];
$gameFilePath = "../game/" . $_FILES["game"]["name"];

move_uploaded_file($_FILES["music"]["tmp_name"], "../music/" . $_FILES["music"]["name"]);
move_uploaded_file($_FILES["img"]["tmp_name"], "../img/" . $_FILES["img"]["name"]);
move_uploaded_file($_FILES["game"]["tmp_name"], "../game/" . $_FILES["game"]["name"]);

$songduration = $_POST["songduration"];

$data = array(
    "title" => $_POST["title"],
    "artist" => $_POST["artist"],
    "music" => $musicFilePath,
    "game" => $gameFilePath,
    "img" => $imageFilePath,
    "duration" => $songduration
);

$jsonData = json_decode(file_get_contents("playlist.json"), true);
$jsonData["songs"][] = $data;
file_put_contents("playlist.json", json_encode($jsonData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

header("Location: songlist.php");
exit;

?>
</pre>