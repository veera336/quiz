<?php
// Include the session.php file to enforce session-based authentication
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz App</title>
  <link rel="stylesheet" href="style4.css">
</head>
<header>
  <h2 class="logo">Problem Solving Quiz</h2>
      <nav class="navigation"> <a href="competency.php">Home</a>
            <a href="ftopicinter.php">levels</a>                
            <a href="scoreboard2.php">scoreboard</a>
            <a href="login.html" class="btnlogout">LOGOUT</a>

       </nav>
</header>

<body style=" background-size: cover;
    background-image:url(./qn1.jpg)">
  <div class="app">
    <h1>Quiz</h1>
    <div class="quiz">
      <h2 id="question">Question goes here</h2>
      <div id="answer-buttons">
        <button class="btn">Answer 1</button>
        <button class="btn">Answer 2</button>
        <button class="btn">Answer 3</button>
        <button class="btn">Answer 4</button>
      </div>
      <button id="next-btn">Next</button>
      <button id="submit-btn" class="custom-btn">Submit</button>
      <button id="playagain-btn" class="custom-btn">play again</button>
    </div>
  </div>
  <script src="fscript_int2.js"></script>
</body>
</html>
