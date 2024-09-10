<?php
include 'db_connect.php';

// Fetch yearly donations
$sql = "SELECT YEAR(donation_date) AS year, 
               SUM(amount) AS total_amount, 
               COUNT(*) AS total_donations
        FROM donations
        GROUP BY YEAR(donation_date)";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yearly Donations Report</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="admin.html">Dashboard</a></li>
                <!-- <li><a href="report_yearly_donations.php">Yearly Donations Report</a></li> -->
            </ul>
        </nav>
    </header>

    <main>
        <h2>Yearly Donations Report</h2>
        <table>
            <thead>
                <tr>
                    <th>Year</th>
                    <th>Total Amount</th>
                    <th>Total Donations</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['year']; ?></td>
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
