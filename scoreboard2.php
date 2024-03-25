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
$query = "SELECT username, quiz_score FROM user_info ORDER BY level3 DESC";
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
    <title>Scoreboard</title>
    <link rel="stylesheet" href="styles1.css">
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
        }
        th, td {
    border: 3px solid #808dff;
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
    </style>
</head>
<header>
        <h2 class="logo">Problem solving Quiz</h2>
            <nav class="navigation">
                  <a href="competency.php">Home</a>                
                  <a href="topic.php">Levels</a>
                  <a href="login.html" class="btnlogout">LOG OUT</a> 
 
             </nav>
   </header>
<body>
    <h1>Scoreboard</h1>
    <?php if (!empty($scoreboardData)) : ?>
        <table>
            <tr>
                <th>Username</th>
                <th>Score</th>
            </tr>
            <?php foreach ($scoreboardData as $row) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['username']); ?></td>
                    <td><?php echo $row['quiz_score']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>No scores found.</p>
    <?php endif; ?>
<style>
        /* Style for the form */
        form {
            text-align: center;
            margin-top: 20px;
        }

        /* Style for the submit button */
        input[type="submit"] {
    background-color: #008b;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
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
}
    </style>
    <form method="post" action="overall_scoreboard.php">
        <input type="submit"  name="update_allpoints" value="overall scoreboard">
    </form>
</body>
</html>
