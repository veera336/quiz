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
  <style>
    header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 20px 100px;
    background: #008b;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 99;
}
.app h1 {
    font-weight: 25px;
    color: #008b;
    font-weight: 600;
    border-bottom: 1px solid #333;
    padding-bottom: 30px;
}
.custom-btn {
    background: #008b;
    color: #fff;
    font-weight: 500;
    width: 150px;
    border: 0;
    padding: 10px;
    margin: 20px auto 0;
    border-radius: 4px;
    cursor: pointer;
}
#next-btn {
    background: #008b;
    color: #fff;
    font-weight: 500;
    width: 150px;
    border: 0;
    padding: 10px;
    margin: 20px auto 0;
    border-radius: 4px;
    cursor: pointer;
    display: none;
}

body {
  background-size: cover;
    background-image:url(./qn1.jpg)
}
  </style>
</head>
<header>
  <h2 class="logo">Problem Solving Quiz</h2>
      <nav class="navigation"> <a href="Competency.php">Home</a>
            <a href="ftopic.php">Levels</a>                
            <a href="Scoreboard1.php">Scoreboard</a>
            <a href="login.html" class="btnlogout">LOGOUT</a>

       </nav>
</header>

<body>
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
  <script src="fscript1.js"></script>
</body>
</html>
