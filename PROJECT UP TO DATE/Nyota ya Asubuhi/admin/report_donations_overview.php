<?php
include 'db_connect.php';

// Fetch total donations
$result = $conn->query("SELECT COUNT(*) AS total_donations, SUM(amount) AS total_amount FROM donations");
$data = $result->fetch_assoc();

$total_donations = $data['total_donations'];
$total_amount = $data['total_amount'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donations Overview Report</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="admin.html">Dashboard</a></li>
                <!-- <li><a href="report_donations_overview.php">Donations Overview Report</a></li> -->
            </ul>
        </nav>
    </header>

    <main>
        <h2>Donations Overview Report</h2>
        <p>Total Donations: <?php echo $total_donations; ?></p>
        <p>Total Amount Donated: $<?php echo number_format($total_amount, 2); ?></p>
    </main>
</body>
</html>

<?php $conn->close(); ?>
