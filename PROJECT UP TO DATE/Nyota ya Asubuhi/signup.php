<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nyota"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape and sanitize user inputs
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $role = mysqli_real_escape_string($conn, $_POST["role"]);

    // Prepare insert statement using parameterized query
    $sql = "INSERT INTO user (name, email, role) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters and execute query
    $stmt->bind_param("sss", $name, $email, $role);
    if ($stmt->execute()) {
        // Redirect to the login page after successful signup
        header("Location: login.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
