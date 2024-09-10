<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $donor_name = $conn->real_escape_string($_POST['donor_name']);
    $donor_email = $conn->real_escape_string($_POST['donor_email']);
    $amount = $conn->real_escape_string($_POST['amount']);
    $donation_date = $conn->real_escape_string($_POST['donation_date']);
    $message = $conn->real_escape_string($_POST['message']);
    $status = $conn->real_escape_string($_POST['status']);
    
    $sql = "UPDATE donations SET donor_name = '$donor_name', donor_email = '$donor_email', amount = '$amount', donation_date = '$donation_date', message = '$message', status = '$status' WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Donation updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    header('Location: manage_donations.php');
    exit();
}
?>
