
<?php
include 'db_connect.php';

// Check if sponsor_id is set and not empty
if (isset($_POST['sponsor_id']) && !empty($_POST['sponsor_id'])) {
    $sponsor_id = $_POST['sponsor_id'];
    $message = $_POST['message'];

    // Check if sponsor_id exists in the sponsors table
    $checkSponsor = $conn->prepare("SELECT sponsor_id FROM sponsors WHERE sponsor_id = ?");
    $checkSponsor->bind_param("i", $sponsor_id);
    $checkSponsor->execute();
    $checkSponsor->store_result();

    if ($checkSponsor->num_rows > 0) {
        // Sponsor ID exists, proceed with inserting the gift
        $stmt = $conn->prepare("INSERT INTO gifts (sponsor_id, message) VALUES (?, ?)");
        $stmt->bind_param("is", $sponsor_id, $message);
        if ($stmt->execute()) {
            echo "Gift sent successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: Invalid sponsor ID.";
    }

    $checkSponsor->close();
} else {
    echo "Error: sponsor_id not provided.";
}

$conn->close();
?>
