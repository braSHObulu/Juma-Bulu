<?php
include 'db_connect.php';

// Fetch total donations
$donations_query = "SELECT SUM(amount) as total_donations FROM donations";
$donations_result = $conn->query($donations_query);
$donations_row = $donations_result->fetch_assoc();
$total_donations = $donations_row['total_donations'];

// Fetch total sponsorships
$sponsorships_query = "SELECT SUM(amount) as total_sponsorships FROM sponsorships";
$sponsorships_result = $conn->query($sponsorships_query);
$sponsorships_row = $sponsorships_result->fetch_assoc();
$total_sponsorships = $sponsorships_row['total_sponsorships'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Donations and Sponsorships</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="admin.html">Dashboard</a></li>
                <li><a href="index_reports.html">Reports</a></li>
                <li><a href="analytics.html">Analytics</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Total Donations and Sponsorships</h2>
        <p>Total Donations: $<?php echo number_format($total_donations, 2); ?></p>
        <p>Total Sponsorships: $<?php echo number_format($total_sponsorships, 2); ?></p>
    </main>
</body>
</html>
