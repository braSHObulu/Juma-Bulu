<?php
include 'db_connect.php';

// Query to get sponsorships grouped by sponsor
$sql = "SELECT sponsor_name, SUM(amount) AS total_amount FROM sponsorships GROUP BY sponsor_name ORDER BY total_amount DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sponsorships by Sponsor</title>
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
        <h2>Sponsorships by Sponsor</h2>
        <table>
            <tr>
                <th>Sponsor Name</th>
                <th>Total Sponsorships</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['sponsor_name']; ?></td>
                <td><?php echo number_format($row['total_amount'], 2); ?></td>
            </tr>
            <?php } ?>
        </table>
    </main>
</body>
</html>

<?php $conn->close(); ?>
