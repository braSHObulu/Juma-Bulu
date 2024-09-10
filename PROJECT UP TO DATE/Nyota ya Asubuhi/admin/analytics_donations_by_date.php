<?php
include 'db_connect.php';

// Query to get donations grouped by date
$sql = "SELECT donation_date, SUM(amount) AS total_amount FROM donations GROUP BY donation_date ORDER BY donation_date";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donations by Date</title>
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
        <h2>Donations by Date</h2>
        <table>
            <tr>
                <th>Date</th>
                <th>Total Donations</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['donation_date']; ?></td>
                <td><?php echo number_format($row['total_amount'], 2); ?></td>
            </tr>
            <?php } ?>
        </table>
    </main>
</body>
</html>

<?php $conn->close(); ?>
