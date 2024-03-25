<?php
// Start the session (if not already started)
session_start();

// Record the start time
$start_time = microtime(true);

// Database connection settings
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

// Get user input from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute the SQL query to retrieve user information
$stmt = $conn->prepare("SELECT user_id, username, password FROM user_info WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($user_id, $db_username, $db_password);
$stmt->fetch();
$stmt->close();




// Check if a user with the provided username exists
if ($db_username) {
    // Verify the provided password against the stored plaintext password in the database
    if ($password === $db_password) {
        // Store user information in session variables
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $db_username;

        // Redirect to a page after successful login
        header("Location: choose.php");
        // You can implement session management or other authentication mechanisms here

        // Record the end time
$end_time = microtime(true);
// Calculate the response time
$response_time = ($end_time - $start_time) * 1000;


// Log the response time (you can adjust this based on your preferred logging method)
error_log("Login Response Time: " . $response_time . "ms");


    } else {
        echo "Incorrect password. Please try again.";
    }
} else {
    echo "User not found. Please check your username or <a href='signup.html'>create a new account</a>.";
}

// Close the database connection
$conn->close();
?>