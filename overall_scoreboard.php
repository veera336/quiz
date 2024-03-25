<?php 
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scoreboard</title>
    <link rel="stylesheet" href="styles1.css">
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 3px solid #858C94;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            padding: 15px;
            padding-top:10%;
        }
    </style>
</head>
<body>
    <h1>Scoreboard</h1>
<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "javaboi";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to update the 'allpoints' column
$updateQuery = "UPDATE user_info SET allpoints = points + quiz_score + level3 + level4 + int_level1 + int_level2 + int_level3 + int_level4 + exp_level1 + exp_level2 + exp_level3 + exp_level4";
$updateQuery1 = "UPDATE user_info SET a_aptitudeallpoints = a_points + a_quiz_score + a_level3 + a_level4 +a_int_level1 + a_int_level2 + a_int_level3 + a_int_level4 + a_exp_level1 + a_exp_level2 + a_exp_level3 + a_exp_level4";
$updateQuery2 = "UPDATE user_info SET f_allpoints = f_points + f_quiz_score + f_level3 + f_level4 +f_int_level1 + f_int_level2 + f_int_level3 + f_int_level4 + f_exp_level1 + f_exp_level2 + f_exp_level3 + f_exp_level4";
if ($conn->query($updateQuery) === TRUE && $conn->query($updateQuery1) === TRUE && $conn->query($updateQuery2) === TRUE) {
    echo "";
} else {
    echo "Error updating points: " . $conn->error;
}

// SQL query to fetch the overall points and username
$sql = "SELECT username, allpoints, a_aptitudeallpoints, f_allpoints FROM user_info  ORDER BY allpoints DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table border='1'><tr><th>Username</th><th>Logical Points</th><th>APTITUDE POINTS</th><th>FRACTIONAL POINTS</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["username"] . "</td><td>" . $row["allpoints"] . "</td><td>" . $row["a_aptitudeallpoints"] . "</td><td>" . $row["f_allpoints"] . "</td></tr>";
    }
    echo "</table>";
} else {
    echo "No results found";
}

// Close the database connection
$conn->close();
?>
 <style>
    table {
        border-collapse: collapse;
        width: 90%;
        margin: 20px auto;
    }
    th, td {
        border: 3px solid #008b;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    h1 {
        padding: 15px;
    }

    /* Style for the form */
    form {
        text-align: center;
        margin-top: 20px;
        display: flex; /* Set display to flex */
        justify-content: center; /* Center align the items horizontally */
    }

    /* Style for the submit button */
    input[type="submit"] {
        background-color: #008b;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        margin: 0 10px; /* Add margin to separate buttons */
    }
</style>
 <form method="post" action="certificate.php" style="    margin-left: -37em;">
        <input type="submit" name="get_certificate" value="VIEW LOGICAL CERTIFICATE">
    </form>
    <form method="post" action="certificate1.php" style="        margin-top: -35px; margin-left: 7em;">
        <input type="submit" name="get_certificate" value="VIEW APTITUDE CERTIFICATE">
    </form>
    <form method="post" action="certificate2.php" style="       margin-top: -35px; margin-left: 56em;">
        <input type="submit" name="get_certificate" value="VIEW FRACTIONAL CERTIFICATE">
    </form>
   
</body>
</html>
