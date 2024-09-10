<?php
session_start();
if (!isset($_SESSION["user_id"]) || $_SESSION["role"] != "sponsor") {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sponsor Dashboard</title>
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
        <h1>Welcome, Sponsor!</h1>
        <p>This is the sponsor dashboard.</p>
        <!-- Add sponsor-specific content here -->
    </main>

    <footer>
        <div class="social-media">
            <p>Follow us on:</p>
            <a href="https://facebook.com">Facebook</a>
            <a href="https://twitter.com">Twitter</a>
            <a href="https://instagram.com">Instagram</a>
        </div>
    </footer>
</body>
</html>
