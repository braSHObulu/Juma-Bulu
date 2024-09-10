<?php
include 'db_connect.php';

// Sanitize and validate input
$donor_name = htmlspecialchars($_POST['donor_name']);
$donor_email = htmlspecialchars($_POST['donor_email']);
$amount = (float)$_POST['amount'];
$donation_date = htmlspecialchars($_POST['donation_date']);
$message = htmlspecialchars($_POST['message']);

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO donations (donor_name, donor_email, amount, donation_date, message, status) VALUES (?, ?, ?, ?, ?, 'Pending')");
$stmt->bind_param("ssdss", $donor_name, $donor_email, $amount, $donation_date, $message);

// Execute
if ($stmt->execute()) {
    echo "<h2>Thank you for your donation!</h2>";
    echo "<p>Your donation has been successfully processed.</p>";
} else {
    echo "<h2>Sorry, something went wrong.</h2>";
    echo "<p>Please try again later.</p>";
}

$stmt->close();
$conn->close();
?>
