<?php
session_start();

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

// Check if user is logged in
if (!isset($_SESSION["sponsor_id"])) {
    die("You must be logged in to donate a gift.");
}

// Retrieve form data
$gift_name = $conn->real_escape_string($_POST["gift_name"]);
$gift_description = $conn->real_escape_string($_POST["gift_description"]);
$gift_quantity = (int)$_POST["gift_quantity"];
$gift_value = (float)$_POST["gift_value"];
$gift_date = $_POST["gift_date"];
$sponsor_id = $_SESSION["sponsor_id"];

// Insert gift donation into database
$sql = "INSERT INTO gifts (gift_name, gift_description, gift_quantity, gift_value, gift_date, sponsor_id) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssiisi", $gift_name, $gift_description, $gift_quantity, $gift_value, $gift_date, $sponsor_id);

if ($stmt->execute()) {
    header("Location: send-gifts.php");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
