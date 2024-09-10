<?php
include 'db_connect.php';

$id = $_GET['id'];

$sql = "DELETE FROM donations WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Donation deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('Location: manage_donations.php');
exit();
?>
