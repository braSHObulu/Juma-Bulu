<?php
session_start(); // Ensure session_start() is at the top of the script

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nyota";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST["email"]);

    $sql = "SELECT id, role FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION["sponsor_id"] = $user["id"]; // Set sponsor_id in session
        $_SESSION["role"] = $user["role"];

        if ($user["role"] == "donor") {
            header("Location: donor-dashboard.html");
        } else if ($user["role"] == "sponsor") {
            header("Location: sponsor-dashboard.html");
        } else {
            echo "Unauthorized role.";
        }
        exit();
    } else {
        echo "Invalid email address.";
    }

    $stmt->close();
}

$conn->close();
?>
