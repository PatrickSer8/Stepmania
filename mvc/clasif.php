<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
$error = $_GET["error"];

session_start();
//if so the page doesnt crash when the leaderboard is empty
if (isset($_SESSION['leaderboard']) && !empty($_SESSION['leaderboard'])) {

$recententry = end($_SESSION['leaderboard']);
$sortedLB = $_SESSION['leaderboard'];
//sorts the scores by higher points
usort($sortedLB, function($a, $b) {
  return $b['points'] - $a['points'];

}); 
} else {
  $recententry = null;
  $sortedLB = [];
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Tabla de clasificaciones</title>
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

  <div class="container mt-5 flex-grow-1">
    <div class="row justify-content-center">
      <div class="col-10 text-center p-5" style="border: 2px solid black; background-color: #e6e6e6c2; border-radius: 10px;">
        <h1 class="display-4 mb-1">Tabla de Clasificaciones</h1>
  
          <div class="list-group" style="max-height: 354px; overflow-y: auto; padding-right: 10px;">
            <!--lists the scores -->
            <?php foreach ($sortedLB as $entry): ?>
              <a class="list-group-item list-group-item-action" style="border: 1px solid black; margin-bottom: 10px; border-radius: 10px;">
                <strong style="font-size:x-large;"><?php echo $entry['score']; ?> <?php echo $entry['points']; ?></strong> Puntos por <?php echo $entry['name']; ?> en <?php echo $entry['song']; ?>
              </a>
            <?php endforeach; ?>
          </div>
          <!-- shows the most recent game-->
          <a class="list-group-item list-group-item-action" style=" border: 0px; margin-bottom: 0px; background-color:transparent; font-size: small;">
            Partida mas reciente: <strong style="font-size: small;"><?php echo $entry['score']; ?> <?php echo $recententry['points']; ?></strong> Puntos por <?php echo $recententry['name']; ?> en <?php echo $recententry['song']; ?>
          </a>

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