<?php

 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include "config.php";
$error = $_GET["error"];

$song = json_decode($_POST['song'], true); 
    $songTitle = $song['title'];
    $songArtist = $song['artist'];
    $songMusic = $song['music'];
    $songDuration = $song['duration'];
    $songImg = $song['img'];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>StepMania!!!</title>
  </head>
  <body class="d-flex flex-column min-vh-100" style="background-image: url('/img/bg.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">  
  
  <nav class="navbar navbar-dark justify-content-md-center" style="background-color: #E6E6E6; border: 3px solid black; padding: 20px 0;">
    <div class="d-flex">
    <a href="/index.html" class="navbar-brand mb-0 h1" style="color: black; border-right: 2px solid black; padding-right: 10px; margin-right: 10px;">Pagina Principal</a>
    <a href="/mvc/songform.php" class="navbar-brand mb-0 h1" style="color: black; border-right: 2px solid black; padding-right: 10px; margin-right: 10px;">Añadir Cancion</a>
    <a href="/mvc/songlist.php" class="navbar-brand mb-0 h1" style="color: black; border-right: 2px solid black; padding-right: 10px; margin-right: 10px;">Jugar</a>
    <a href="/mvc/clasif.php" class="navbar-brand mb-0 h1" style="color: black;">Clasificaciones</a>
    </div>
  </nav>

  <div class="container mt-4 flex-grow-1">
    <div class="row justify-content-center">
      <div class="col-12 text-center p-5" style="border: 2px solid black; background-color: #e6e6e6c2; border-radius: 10px;">
      <div class="d-flex flex-column flex-md-row align-items-center justify-content-between text-center text-md-start">
        <div class="mb-3 mb-md-0" style="max-width: 200px;">
          <h1 class="display-4 mb-1"><?php echo $songTitle; ?></h1>
          <h3 class="mb-1"><?php echo $songArtist; ?></h3>
        </div>
        <div class="mx-md-5">
          <img src="<?php echo $songImg; ?>" alt="SongImg" style="border: 2px solid black; width: 500px; height: 250px; border-radius: 10px;">       
        </div>
        <div class="mb-3 mb-md-0" style="max-width: 200px;">
          <h1 class="display-4 mb-1">Puntos: 1000000</h1>
        </div>
      </div> 
      <h2 class="mb-1">Pulsa las teclas cuando brillen!!!</h2>
      <div>
                <span id="current-time">0:00</span> / <span id="cancion-duration">0:00</span>
            </div>
            <div style="width:80%; height: 6px; background-color: #a3e6ff; margin-left: 10%; border: 1px solid blue;" id="cancion-progress-conten">
                <div style="height: 100%; background-color: #0044ff; width: 0;" id="cancion-progress"></div>
            </div>
      </div>
    </div>
  </div>

  <footer class="p-3 text-center" style="border: 2px solid black; background-color: rgba(255, 255, 255, 0);">
    <p class="mb-0" style="color: rgb(255, 255, 255);"> 
      correu@gmail.com
      Instagram
      Facebook
      Youtube</p>
  </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
<script>

  var audio = new Audio("<?php echo $songMusic; ?>");
  audio.play();

  audio.addEventListener('timeupdate', () => {
    const currentTime = audio.currentTime;
    const duration = audio.duration;
    const progress = (currentTime / duration) * 100;

    const progressBar = document.getElementById('cancion-progress');
    progressBar.style.width = progress + '%';

    const currentTimeDisplay = document.getElementById('current-time');
    const durationDisplay = document.getElementById('cancion-duration');
    currentTimeDisplay.textContent = formatTime(currentTime);
    durationDisplay.textContent = formatTime(duration);
});

function formatTime(timeInSeconds) {
    const minutes = Math.floor(timeInSeconds / 60);
    const seconds = Math.floor(timeInSeconds % 60);
    return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
}

</script>