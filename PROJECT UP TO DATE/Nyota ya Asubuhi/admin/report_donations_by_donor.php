<?php
include 'db_connect.php';

// Fetch top donors
$sql = "SELECT donor_name, SUM(amount) AS total_amount
        FROM donations
        GROUP BY donor_name
        ORDER BY total_amount DESC
        LIMIT 10";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Donors Report</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="admin.html">Dashboard</a></li>
                <!-- <li><a href="report_top_donors.php">Top Donors Report</a></li> -->
            </ul>
        </nav>
    </header>

    <main>
        <h2>Top Donors Report</h2>
        <table>
            <thead>
                <tr>
                    <th>Donor Name</th>
                    <th>Total Amount Donated</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['donor_name']; ?></td>
                        <td>$<?php echo number_format($row['total_amount'], 2); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>
</body>
</html>

<?php $conn->close(); ?>
