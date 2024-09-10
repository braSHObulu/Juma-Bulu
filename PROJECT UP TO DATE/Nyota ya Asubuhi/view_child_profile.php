<?php
include 'db_connect.php'; // Include your database connection file

if (isset($_GET['child_id'])) {
    $child_id = $_GET['child_id'];

    // Prepare a statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT name, age, bio FROM children WHERE child_id = ?");
    $stmt->bind_param("i", $child_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $child = $result->fetch_assoc();
            echo "<h2>" . htmlspecialchars($child['name']) . "</h2>";
            echo "<p>Age: " . htmlspecialchars($child['age']) . "</p>";
            echo "<p>Bio: " . nl2br(htmlspecialchars($child['bio'])) . "</p>";
        } else {
            echo "Child profile not found";
        }
    } else {
        echo "Error executing query";
    }

    $stmt->close(); // Close the prepared statement
} else {
    echo "No child ID provided";
}

$conn->close(); // Close the database connection
?>
