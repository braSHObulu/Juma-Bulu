<?php
include 'db_connect.php';

// Query to get donations grouped by donor
$sql = "SELECT donor_name, SUM(amount) AS total_amount FROM donations GROUP BY donor_name ORDER BY total_amount DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donations by Donor</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="analytics.html">Back to Analytics</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Donations by Donor</h2>
        <table>
            <tr>
                <th>Donor Name</th>
                <th>Total Donations</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['donor_name']; ?></td>
                <td><?php echo number_format($row['total_amount'], 2); ?></td>
            </tr>
            <?php } ?>
        </table>
    </main>
</body>
</html>

<?php $conn->close(); ?>
