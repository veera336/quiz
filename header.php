<?php
// Include your database connection code here
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "javaboi";

$db_connection = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($db_connection->connect_error) {
    die("Connection failed: " . $db_connection->connect_error);
}

// Query to retrieve user scores
$query = "SELECT username, points FROM user_info ORDER BY points DESC";
$result = $db_connection->query($query);

if ($result->num_rows > 0) {
    $scoreboardData = array();
    while ($row = $result->fetch_assoc()) {
        $scoreboardData[] = $row;
    }
} else {
    $scoreboardData = array();
}

// Close the database connection
$db_connection->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="styles1.css">
    <style>
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
            padding: 58px;
    margin-top: 37px;
    margin-left: 586px;
        }
        th, td {
    border: 3px solid #808dff;
    padding: 8px;
    text-align: left;
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
body {
    margin: 0;
    background-color: white;
    /* margin-top:10% !important; */
}
    </style>
</head>
<header>
        <h2 class="logo" >Problem Solving Quiz</h2>
            <nav class="navigation">
                  <a href="choose.php">Home</a>                
                  
                  <a href="login.html" class="btnlogout">LOG OUT</a> 
 
             </nav>
   </header>
<body>
    
   
</body>
</html>
