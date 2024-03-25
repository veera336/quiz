<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html"); // Redirect to the login page if not logged in
    exit();
}

// Assuming you have already connected to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "javaboi";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user's progress
$user_id = $_SESSION['user_id']; // Replace with the actual user ID
$query = "SELECT * FROM user_info WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);

$userProgress = [];

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    // Populate the user progress array with relevant data from the user_info table
    $userProgress['level_1_points'] = $row['exp_level1'];
    $userProgress['level_2_points'] = $row['exp_level2'];
    $userProgress['level_3_points'] = $row['exp_level3'];
    $userProgress['level_4_points'] = $row['exp_level4'];
} else {
    // Handle the case when the user's progress record is not found
    echo "User progress not found.";
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problem Solving Quiz</title>
    <style>
        *{
margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-size: cover;
    background-position: center;
    box-sizing: border-box;
    background-color: white;
}

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
.logo {
    font-size: 2em;
    color:#fff;
    user-select: none;

}
.navigation a{
    position: relative;
    font-size: 1.1em;
    color:#fff;
    text-decoration: none;
    font-weight: 500;
    margin-left: 40px;
}

.navigation a::after {
    content:'';
    position: absolute;
    left: 0;
    bottom: -6px;
    width: 100%;
    height: 3px;
    background: #fff;
    border-radius: 5px;
    transform: scaleX(0);
    transform-origin: right;
    transition: transform .5s; 
}
.navigation a:hover::after {
    transform-origin: left;
    transform: scaleX(1);
}
.navigation .btnlogin-popup {
    width: 130px;
    height: 50px;
    background: transparent;
    border: 2px solid #fff;
    outline: none;
    cursor: pointer;
    font-size: 1.1em;
    color:#fff;
    font-weight: 500;
    margin-left: 40px;
}
.navigation .btnlogin-popup:hover {
    background:  #fff;
    color: #162938
}

.wrapper {
    position: relative;
    width: 400px;
    height: 400px;
    background: transparent;
    border: 2px solid rgba(225, 225, 225, 5);
    border-radius: 20px;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 30px rgba(0, 0, 0, 5);
    display: flex;
    justify-content: center;
    align-items: center;
}

 /******competency page starts*****/
 .competency_box .btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #808dff;
    color: white;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    margin: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.competency_box .btn:hover {
    background-color: #4EB33E;
}

/* Add the following CSS to style the logout button */

.btnlogout {
    display: inline-block;
    padding: 10px 20px;
    background-color: #808dff;
    color: white;
    text-decoration: none;
    border: 2px #fff;
    border-radius: 5px;
    margin: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.btnlogout:hover {
    background-color: #fff;
    color: #162938;
}

/*******competency page ebd here*****/

/******* TOPIC LEVEL PAGE ******/

.GO-box {
    display: inline-block;
    width: 100px; /* Adjust the width as needed */
    height: 30px; /* Adjust the height as needed */
    background-color: #008b;
    color: white;
    border-radius: 5px;
    text-align: left;
    line-height: 30px;
    text-decoration: none;
    padding-left: 26px; /* Adjust the left padding for indentation */
}
.level-box {
    display: inline-block;
    width: 100px; /* Adjust the width as needed */
    height: 30px;  /* Adjust the height as needed */
    background-color: #008b;
    color: white;
    border-radius: 5px;
    text-align: left;
    line-height: 30px;
    text-decoration: none;
    padding-left: 25px; /* Adjust the left padding for indentation */
}
.level2-box {
    margin-left: 10px;
    display: inline-block;
    width: 100px;
    height: 30px;
    background-color: #008b;
    color: white;
    border-radius: 5px;
    text-align: left;
    line-height: 30px;
    text-decoration: none;
    padding-left: 25px;
}
.level3-box {
    margin-left: 10px;
    display: inline-block;
    width: 100px;
    height: 30px;
    background-color: #008b;
    color: white;
    border-radius: 5px;
    text-align: left;
    line-height: 30px;
    text-decoration: none;
    padding-left: 25px;
}
.level4-box {
    margin-left: 10px;
    display: inline-block;
    width: 100px;
    height: 30px;
    background-color: #008b;
    color: white;
    border-radius: 5px;
    text-align: left;
    line-height: 30px;
    text-decoration: none;
    padding-left: 25px;
}
  /* Reduce the size of the image */
  img {
    max-width: 285px;
    max-height: 454px;
    width: auto;
    height: auto;
    margin-bottom: 3px;
    margin-right: 33px;
}
h3 {
    font-size: 36px; /* Adjust the font size as needed */
    color: black;
    text-align: center;
  }
  body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-size: cover;
    background-position: center;
    box-sizing: border-box;
    background-color: white;
}
    </style>
</head>
<body>
    <header>
        <h2 class="logo">Problem Solving Quiz</h2>
        <nav class="navigation">
        <a href="competency.php">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
            <a href="login.html" class="btnlogout">LOG OUT</a>
        </nav>
    </header>
   
    <div class="level-container">
        <div class="parrot">
            <img src="welcome.png" alt="pngkey.com-problem-png-9574728.png" />
        </div>

        <?php
        // Check conditions for each level and generate links or alert messages accordingly

        echo '<a href="topicexpert.php" class="level-box">Level 1</a>';
       

        if ($userProgress['level_1_points'] > 5) {
            echo '<a href="topicexpert1.php" class="level2-box">Level 2</a>';
        } else {
            echo "<script>alert('Complete Level 1 first.');</script>";
        }

        if ($userProgress['level_2_points'] > 5) {
            echo '<a href="topicexpert2.php" class="level3-box">Level 3</a>';
        } else {
            echo "<script>alert('Complete Level 2 first.');</script>";
        }

        if ($userProgress['level_3_points'] > 5) {
            echo '<a href="topicexpert3.php" class="level4-box">Level 4</a>';
        } else {
            echo "<script>alert('Complete Level 3 first.');</script>";
        }
        ?>
        <!-- Add more level boxes as needed -->
    </div>
<a href="learnexp2.php" class="GO-box">GO =></a>
</body>
</html>
