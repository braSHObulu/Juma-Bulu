<?php
// Include database connection
include 'db_connect.php';

// Start session
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get credentials from form
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate input
    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        exit();
    }

    // Prepare and execute SQL statement
    $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if a matching record was found
        if ($result->num_rows == 1) {
            // Store user information in session
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;

            // Regenerate session ID for security
            session_regenerate_id(true);

            // Redirect to admin dashboard
            header("Location: admin.html");
            exit();
        } else {
            // Invalid credentials
            echo "Invalid username or password.";
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
