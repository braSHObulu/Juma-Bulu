<?php
include 'db_connect.php';

// Retrieve form data
$sponsor_name = $_POST['sponsor_name'];
$sponsor_email = $_POST['sponsor_email'];
$amount = $_POST['amount'];
$sponsorship_date = $_POST['sponsorship_date'];
$message = $_POST['message'];

// Prepare and execute the SQL statement
$stmt = $conn->prepare("INSERT INTO sponsorships (sponsor_name, sponsor_email, amount, sponsorship_date, message, status) VALUES (?, ?, ?, ?, ?, 'Pending')");
$stmt->bind_param("ssdss", $sponsor_name, $sponsor_email, $amount, $sponsorship_date, $message);

if ($stmt->execute()) {
    echo "Sponsorship contribution recorded successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
