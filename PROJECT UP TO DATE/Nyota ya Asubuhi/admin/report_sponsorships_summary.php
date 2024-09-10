<?php
include 'db_connect.php';

// Fetch donation status
$sql = "SELECT status, COUNT(*) AS count, SUM(amount) AS total_amount
        FROM donations
        GROUP BY status";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Status Report</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="admin.html">Dashboard</a></li>
                <!-- <li><a href="report_donations_status.php">Donation Status Report</a></li> -->
            </ul>
        </nav>
    </header>

    <main>
        <h2>Donation Status Report</h2>
        <table>
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Count</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['status']; ?></td>
                        <td><?php echo $row['count']; ?></td>
                        <td>$<?php echo number_format($row['total_amount'], 2); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
</body>
</html>

<?php $conn->close(); ?>
