<?php
include 'db_connect.php';

// Fetch sponsorships from the database
$sql = "SELECT * FROM sponsorships";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Sponsorships</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="admin.html">Dashboard</a></li>
                <li><a href="manage_sponsorships.php">Manage Sponsorships</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Manage Sponsorships</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Sponsor Name</th>
                    <th>Sponsor Email</th>
                    <th>Amount</th>
                    <th>Sponsorship Date</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['sponsor_name']; ?></td>
                            <td><?php echo $row['sponsor_email']; ?></td>
                            <td><?php echo $row['amount']; ?></td>
                            <td><?php echo $row['sponsorship_date']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <a href="edit_sponsorship.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                                <a href="delete_sponsorship.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this sponsorship?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No sponsorships found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>

<?php $conn->close(); ?>
