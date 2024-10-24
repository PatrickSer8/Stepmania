<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);
$error = $_GET["error"];

$song = json_decode($_POST['song'], true); 
    $songTitle = $song['title'];
    $songArtist = $song['artist'];
    $songMusic = $song['music'];
    $songGame = $song['game'];
    $songDuration = $song['duration'];
    $songImg = $song['img'];

    $songGameContent = "";
    $songGameContent = file_get_contents($songGame);

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
  <form id="clasif" action="clasifrequest.php" method="POST" style="display: none;">
    <input id="points-input" type="hidden" name="points">
    <input id="song-title" type="hidden" name="song">
    <input id="num-notes" type="hidden" name="numnotes">
  </form>
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
      <div class="mb-1 col-12 text-center p-5" style="border: 2px solid black; background-color: #e6e6e6c2; border-radius: 10px; max-height: 590px;">
      <div class="d-flex flex-column flex-md-row align-items-center justify-content-between text-center text-md-start">
        <div class="mb-3 mb-md-0" style="max-width: 200px;">
          <h1 class="display-4 mb-1"><?php echo $songTitle; ?></h1>
          <h3 class="mb-1"><?php echo $songArtist; ?></h3>
        </div>
        <div class="mx-md-5">
          <img src="<?php echo $songImg; ?>" alt="SongImg" style="border: 2px solid black; width: 500px; height: 250px; border-radius: 10px;">       
        </div>
        <div class="mb-3 mb-md-0" style="max-width: 200px;">
          <h1 class="display-4 mb-1">Puntos: <span id="points-display"></span></h1>
        </div>
      </div> 
      <h2 class="mb-1">Pulsa las teclas que brillen!</h2>
      <div class="d-flex flex-column flex-md-row align-items-center justify-content-between text-center text-md-start">
        <div class="mb-3 mb-md-0" style="max-width: 200px;">
          <img id="left-on" onkeypress="left()" src="../img/left.png" alt="arrow" style="width: 200px; height: 200px;">       
        </div>
        <div class="mx-md-0">
          <img id="up-on" onkeypress="up()" src="../img/up.png" alt="arrow" style="width: 200px; height: 200px;">       
        </div>
        <div class="mb-md-0">
          <img id="down-on" onkeypress="down()" src="../img/down.png" alt="arrow" style="width: 200px; height: 200px;">       
        </div>
        <div class="mb-3 mb-md-0" style="max-width: 200px;">
          <img id="right-on" onkeypress="right()" src="../img/right.png" alt="arrow" style="width: 200px; height: 200px;">       
        </div>
      </div>
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
  var playrepeat = "yes";
  //function to play the song when the user clicks(browser dont allow for the song to start automatically)
  function playsong() {
    if(playrepeat == "yes") {
    audio.play();
    startgame();
    playrepeat = "no";}}

  document.addEventListener('click',playsong)
  //function to turn off notes when they are scored or missed
  var keypressed = "non";
  function non() {
    keypressed = "non";
  }
  //function to update point in real time
  var points = 0;
  document.getElementById('points-display').textContent = points; 
  function updatePoints() {
    document.getElementById('points-input').value = points;
    document.getElementById('points-display').textContent = points;
  }
  //function for each of the keys to know if the user correctly pressed or if they missed
  let leftPressed = false;
  function left() {
    if (keypressed == "left") {
      points += 100;
      updatePoints();
      non();    
    } else if (keypressed != "non") {
      points -= 50;
      updatePoints();
      document.getElementById('left-on').src = '../img/left.png';    
      document.getElementById('up-on').src = '../img/up.png';
      document.getElementById('right-on').src = '../img/right.png';
      document.getElementById('down-on').src = '../img/down.png';
      non();
    }
    const leftImage = document.getElementById('left-on');
    if (leftPressed) {
      leftImage.src = '../img/left.png'; 
    } else {
      leftImage.src = '../img/LeftHit.png'; 
    }
    leftPressed = !leftPressed;
  }

  let upPressed = false;
  function up() {
    if (keypressed == "up") {
      points += 100;
      updatePoints();
      non();    
    } else if (keypressed != "non") {
      points -= 50;
      updatePoints();
      document.getElementById('left-on').src = '../img/left.png';    
      document.getElementById('up-on').src = '../img/up.png';
      document.getElementById('right-on').src = '../img/right.png';
      document.getElementById('down-on').src = '../img/down.png';
      non();
    }
    const upImage = document.getElementById('up-on');
    if (upPressed) {
      upImage.src = '../img/up.png'; 
    } else {
      upImage.src = '../img/UpHit.png'; 
    }
    upPressed = !upPressed;
  }

  let downPressed = false;
  function down() {
    if (keypressed == "down") {
      points += 100;
      updatePoints();
      non();    
    } else if (keypressed != "non") {
      points -= 50;
      updatePoints();
      document.getElementById('left-on').src = '../img/left.png';    
      document.getElementById('up-on').src = '../img/up.png';
      document.getElementById('right-on').src = '../img/right.png';
      document.getElementById('down-on').src = '../img/down.png';
      non();
    }
    const downImage = document.getElementById('down-on');
    if (downPressed) {
      downImage.src = '../img/down.png'; 
    } else {
      downImage.src = '../img/DownHit.png'; 
    }
    downPressed = !downPressed;
  }

  let rightPressed = false;
  function right() {
    if (keypressed == "right") {
      points += 100;
      updatePoints();
      non();    
    } else if (keypressed != "non") {
      points -= 50;
      updatePoints();
      document.getElementById('left-on').src = '../img/left.png';    
      document.getElementById('up-on').src = '../img/up.png';
      document.getElementById('right-on').src = '../img/right.png';
      document.getElementById('down-on').src = '../img/down.png';
      non();
    }
    const rightImage = document.getElementById('right-on');
    if (rightPressed) {
      rightImage.src = '../img/right.png'; 
    } else {
      rightImage.src = '../img/RightHit.png'; 
    }
    rightPressed = !rightPressed;
  }

  //functions to turn on notes to be pressed
  function leftnote() {
    document.getElementById('left-on').src = '../img/ArrowLeftPress.png';
    keypressed = 'left';
  }
  function upnote() {
    document.getElementById('up-on').src = '../img/ArrowUpPress.png';
    keypressed = 'up';
  }
  function downnote() {
    document.getElementById('down-on').src = '../img/ArrowDownPress.png';
    keypressed = 'down';
  }
  function rightnote() {
    document.getElementById('right-on').src = '../img/ArrowRightPress.png';
    keypressed = 'right';
  }
  //function to turn off notes if the window time ended
  function leftnotemiss() {
    document.getElementById('left-on').src = '../img/left.png';
    non();
  }
  function upnotemiss() {
    document.getElementById('up-on').src = '../img/up.png';
    non();
  }
  function downnotemiss() {
    document.getElementById('down-on').src = '../img/down.png';
    non();
  }
  function rightnotemiss() {
    document.getElementById('right-on').src = '../img/right.png';
    non();
  }
  //functions to identify the numbers from the game file to notes
  function NoteOnIdent(note) {
      switch(note) {
        case 99:
          leftnote();
          break;
        case 97:
          upnote();
          break;
        case 114:
          downnote();
          break;
        case 100:
          rightnote();
          break;
      }
    }
    function NoteOffIdent(note) {
      switch(note) {
        case 99:
          leftnotemiss();
          break;
        case 97:
          upnotemiss();
          break;
        case 114:
          downnotemiss();
          break;
        case 100:
          rightnotemiss();
          break;
      }
    }
  //function to process the text from the game file
  var gameContent = `<?php echo $songGameContent; ?>`.trim();
  let gameLines = gameContent.split('\n');  
  let numberOfNotes = parseInt(gameLines[0]);
  let notes = [];
  for (let i = 1; i <= numberOfNotes; i++) {
      let [note, on, off] = gameLines[i].split('#').map(value => parseFloat(value.trim()));
      notes.push({ note: note, on: on, off: off });
  }
  //function to activate each note from the game file
  function startgame() {
      notes.forEach((noteObj) => {
        setTimeout(() => NoteOnIdent(noteObj.note), noteObj.on * 1000);
        setTimeout(() => NoteOffIdent(noteObj.note), noteObj.off * 1000);
      });
    }
  //function to identify when you press and when you let go a notes
  document.addEventListener('keydown', (event) => {
    switch (event.key) {
      case 'ArrowLeft':
      case 'a':  
        left();
        break;
      case 'ArrowUp':
      case 'w':
        up();
        break;
      case 'ArrowDown':
      case 's':
        down();
        break;
      case 'ArrowRight':
      case 'd':
        right();
        break;
    }
  });

  document.addEventListener('keyup', (event) => {
    switch (event.key) {
      case 'ArrowLeft':
      case 'a':  
        left();
        break;
      case 'ArrowUp':
      case 'w':
        up();
        break;
      case 'ArrowDown':
      case 's':
        down();
        break;
      case 'ArrowRight':
      case 'd':
        right();
        break;
    }
  });
  //progress bar
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
    //when the song ends it sends the info to clasifrequest
    if (currentTime >= duration) {
    document.getElementById('song-title').value = "<?php echo $songTitle; ?>";
    document.getElementById('num-notes').value = numberOfNotes;
    event.preventDefault(); 
    document.getElementById('clasif').submit();    
  }
});
//format the duration in minutes
function formatTime(timeInSeconds) {
    const minutes = Math.floor(timeInSeconds / 60);
    const seconds = Math.floor(timeInSeconds % 60);
    return `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
}

</script>