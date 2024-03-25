<?php
include('session.php');
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate</title>
    <link rel="stylesheet" href="styles1.css">
    <style>
        body {
    margin: 0;
    background-color: white;
    padding: 123px;
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
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
            border: 3px solid #4EB33E;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            padding: 15px;
            margin-left: 500px;
        }
        th, td {
    border: 3px solid #008b;
    padding: 8px;
    text-align: left;
}
    </style>
</head>
<header>
        <h2 class="logo">Problrm Solving Quiz</h2>
            <nav class="navigation">
                  <a href="competency.php">competency</a>                
                  <a href="atopic.php">Level</a>
                  <a href="login.html" class="btnlogout">LOGOUT</a> 
             </nav>
</header>
<body>
<h1>APTITUDE CERTIFICATE</h1>
<?php

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

if (isset($_POST['get_certificate'])) {
    // SQL query to fetch the overall points and certificate for the logged-in user
    $sql = "SELECT  user_id ,username, allpoints,a_aptitudeallpoints FROM user_info  ORDER BY allpoints,a_aptitudeallpoints DESC";
    $result = $conn->query($sql);

    if ($result !== false && $result->num_rows > 0) {
        // Output data for the logged-in user
        echo "<table border='1'><tr><th>Username</th><th>Overall Points</th><th>Certificate</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["allpoints"] . "</td>
                    <td>";

            // Check if overall points are greater than 10 and display the appropriate certificate image
            if ($row["allpoints"] > 30) {
                echo "<img src='certificate_3.png' alt='Certificate 3'>";
            } elseif ($row["allpoints"] > 20) {
                echo "<img src='certificate_2.png' alt='Certificate 2'>";
            } elseif ($row["allpoints"] > 10) {
                echo "<img src='certificate_1.png' alt='Certificate 1'>";
            } else {
                echo "No certificate";
            }

            echo "</td>";
            
            // Add download link for the certificate if points are greater than 0
            if ($row["allpoints"] > 0) {
                echo "<td><a href='download_certificate.php?name=" . $row["username"] . "'>Download Certificate</a></td>";
            } else {
                echo "<td></td>"; // Empty cell if no certificate available
            }
            
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No certificate found for the logged-in user";
    }
}
// Close the database connection
$conn->close();
?>

</body>
</html>
