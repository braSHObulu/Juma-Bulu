<?php
include 'db_connect.php';

// Fetch monthly donations
$sql = "SELECT DATE_FORMAT(donation_date, '%Y-%m') AS month, 
               SUM(amount) AS total_amount, 
               COUNT(*) AS total_donations
        FROM donations
        GROUP BY DATE_FORMAT(donation_date, '%Y-%m')";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Donations Report</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="admin.html">Dashboard</a></li>
                <!-- <li><a href="report_monthly_donations.php">Monthly Donations Report</a></li> -->
            </ul>
        </nav>
    </header>

    <main>
        <h2>Monthly Donations Report</h2>
        <table>
            <thead>
                <tr>
                    <th>Month</th>
                    <th>Total Amount</th>
                    <th>Total Donations</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['month']; ?></td>
                        <td>$<?php echo number_format($row['total_amount'], 2); ?></td>
                        <td><?php echo $row['total_donations']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
</body>
</html>

<?php $conn->close(); ?>
