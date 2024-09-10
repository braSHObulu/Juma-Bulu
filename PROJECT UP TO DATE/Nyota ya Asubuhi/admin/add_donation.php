<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $donor_name = $conn->real_escape_string($_POST['donor_name']);
    $amount = $conn->real_escape_string($_POST['amount']);
    $donation_date = $conn->real_escape_string($_POST['donation_date']);
    
    $sql = "INSERT INTO donations (donor_name, amount, donation_date) 
            VALUES ('$donor_name', '$amount', '$donation_date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New donation added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
    header('Location: manage_donations.php');
    exit();
}
?>
