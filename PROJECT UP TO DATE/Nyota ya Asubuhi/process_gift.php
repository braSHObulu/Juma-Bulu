<?php
include 'db_connect.php'; // Ensure this is the correct path
session_start(); // Ensure session_start() is at the top of the script

// Check if sponsor_id is set in the session
if (!isset($_SESSION['sponsor_id'])) {
    die("Error: Sponsor ID is not set in session.");
}

$sponsor_id = $_SESSION['sponsor_id']; // Retrieve sponsor_id from session

// Check if sponsorship_id is provided in POST data
if (!isset($_POST['sponsorship_id'])) {
    die("Error: Sponsorship ID is not provided.");
}

$sponsorship_id = $_POST['sponsorship_id'];

// Retrieve form data
$gift_preference = $_POST['gift_preference'];
$gift_value = $_POST['gift_value'];

// Check if the provided sponsorship_id exists in the sponsorships table
$sql_check = "SELECT * FROM sponsorships WHERE sponsorship_id = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("i", $sponsorship_id);
$stmt_check->execute();
$result = $stmt_check->get_result();

if ($result->num_rows == 0) {
    die("Error: Invalid sponsorship ID.");
}

$stmt_check->close();


// Prepare and execute SQL statement to insert gift
$stmt = $conn->prepare("INSERT INTO gifts (sponsorship_id, gift_preference, gift_value) VALUES (?, ?, ?)");
$stmt->bind_param("isd", $sponsorship_id, $gift_preference, $gift_value);

if ($stmt->execute()) {
    echo "Gift recorded successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
