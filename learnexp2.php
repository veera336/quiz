<?php
// Include the session.php file to enforce session-based authentication
include('session.php');
?>
<DOCTYPE html> 
    <html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <meta name="viewport" content="width=device-width,initial-scale=1.0"> 
    <title>Problem Solving Quiz</title>
    <link rel="stylesheet" href="styles1.css">
    <style>
   .quizz {
    margin: 0;
    position: absolute;
    top: 70%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    gap: 3rem 6rem;
    word-wrap: none;
    white-space: nowrap;
    border: 1px solid #ccc;
    border-radius: 900px;
    background-color: #008b;
    padding: 0.6rem 10rem;
    font-size: inherit;
    cursor: pointer;
    color: white;
    transition: background-color 150ms;
}
    </style>
    </head>
    <header>
        <h2 class="logo">Problem Solving Quiz</h2>
            <nav class="navigation"> <a href="#">Home</a>
                  <a href="#">About</a>                
                  <a href="#">Contact</a>
                  <a href="login.html" class="btnlogout">LOGOUT</a> 
 
             </nav>
   </header>
    
    <body style=" background-size: cover;
 background-image:url(./plain.png)">
       
      <div class="video">
        <section class="video-section">

           
                <div class="video-bottom-section">
                    <a href="#">
                        <div class="video-detail">
                            <a href="#" class="video-title"></a>
                        </div>
                    </a>
                </div>
            </article>

            
                <div class="video-bottom-section">
                    <a href="#">
                        <div class="video-detail">
                            <a href="#" class="video-title"></a>
                        </div>
                    </a>
                </div>
            </article>

            
                <div class="video-bottom-section">
                    <a href="#">
                        <div class="video-detail">
                            <a href="#" class="video-title"></a>
                        </div>
                    </a>
                </div>
            </article>

            
                <div class="video-bottom-section">
                    <a href="#">
                        <div class="video-detail">
                            <a href="#" class="video-title"></a>
                        </div>
                    </a>
                </div>
            </article>

        </section>
      </div>
            <img src="welcome.png" alt="pngkey.com-problem-png-9574728" style="width: 268px;
    margin-left: 663px;
    margin-top: -100px;"/>
      <div class="quizz-section">
        <a href="index_exp2.php" class="quizz-button">
        <button class="quizz">START QUIZZ</button></a>
      </div>
    