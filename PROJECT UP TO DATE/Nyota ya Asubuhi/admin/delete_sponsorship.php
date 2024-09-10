<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM sponsorships WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Sponsorship deleted successfully.</p>";
    } else {
        echo "<p>Error deleting sponsorship: " . $conn->error . "</p>";
    }

    $conn->close();
    echo '<a href="manage_sponsorships.php">Back to Sponsorships</a>';
} else {
    echo "<p>No sponsorship ID provided.</p>";
}
?>
