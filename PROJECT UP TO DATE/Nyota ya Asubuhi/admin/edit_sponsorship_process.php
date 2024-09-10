<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $sponsor_name = $conn->real_escape_string($_POST['sponsor_name']);
    $sponsor_email = $conn->real_escape_string($_POST['sponsor_email']);
    $amount = $conn->real_escape_string($_POST['amount']);
    $sponsorship_date = $conn->real_escape_string($_POST['sponsorship_date']);
    $message = $conn->real_escape_string($_POST['message']);
    $status = $conn->real_escape_string($_POST['status']);
    
    $sql = "UPDATE sponsorships 
            SET sponsor_name = '$sponsor_name', 
                sponsor_email = '$sponsor_email', 
                amount = '$amount', 
                sponsorship_date = '$sponsorship_date', 
                message = '$message', 
                status = '$status' 
            WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Sponsorship updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    header('Location: manage_sponsorships.php');
    exit();
}
?>
