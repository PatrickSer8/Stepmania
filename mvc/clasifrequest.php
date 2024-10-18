<?php

session_start();
error_reporting(E_ERROR | E_WARNING | E_PARSE);
$error = $_GET["error"];
$points = $_POST['points'];
$song = $_POST['song'];
$numnotes = $_POST['numnotes'];
$percentage = 0;
if ($numnotes > 0) { 
  $percentage = ($points / ($numnotes * 100)) * 100;
}$score = "E";
if ($percentage < 25) {
  $score = "E";
  } elseif ($percentage < 50) {
    $score = "D";
  } elseif ($percentage < 70) {
    $score = "C";
  } elseif ($percentage < 90) {
    $score = "B";
  } else {
    $score = "A";
  }

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['name']) && !empty($_POST['name'])) {
  $name = $_POST['name'];

  $_SESSION['leaderboard'][] = [
      'name' => $name,
      'song' => $_POST['song'],
      'points' => $_POST['points'],
      'score' => $_POST['score']
  ];

  header("Location: songlist.php"); 
  exit;
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

    <title>Clasificaciones</title>
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
      <div class="col-10 text-center p-5 mb-5" style="border: 2px solid black; background-color: #e6e6e6c2; border-radius: 10px;">
        <h1 class="display-4 mb-0">Guarda Tu Puntuacion!</h1>
        <h2 class="display-4 mb-2"><?php echo $points; ?> Puntos en <?php echo $song; ?>!!!</h2> 
        <h1 class="display-4 mb-0" style="font-size: 5rem; color: gold; font-family: 'Arial', sans-serif; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);"><?php echo $score; ?></h1>
        <form action="" enctype="multipart/form-data" method="post">
          <div class="form-group">
            <input name="name" type="text" class="form-control" id="inputname" placeholder="Pon tu nombre">
          </div>

          <input type="hidden" id="points" name="points">
          <input type="hidden" id="song" name="song">
          <input type="hidden" id="score" name="score">
          <button href="/mvc/songlist.php" type="submit" class="btn btn-primary">Enviar</button>
        </form>

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
        document.getElementById('song').value = "<?php echo $song; ?>";
        document.getElementById('points').value = parseFloat("<?php echo $points; ?>");
        document.getElementById('score').value = "<?php echo $score; ?>";
</script>
