<?php
session_start();

// Check if the user is logged in and is a donor
if (!isset($_SESSION["user_role"]) || $_SESSION["user_role"] !== "donor") {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donor Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?> (Donor)</h1>
        <p>This is your dashboard.</p>
        <!-- Add more content specific to donors -->
    </main>
</body>
</html>
