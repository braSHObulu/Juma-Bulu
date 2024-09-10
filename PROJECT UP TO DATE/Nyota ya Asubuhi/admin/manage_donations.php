<?php
// Include your database connection
include 'db_connect.php';

// Handle form submission for adding a donation
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $donor_name = $conn->real_escape_string($_POST['donor_name']);
    $donor_email = $conn->real_escape_string($_POST['donor_email']);
    $amount = $conn->real_escape_string($_POST['amount']);
    $donation_date = $conn->real_escape_string($_POST['donation_date']);
    $message = $conn->real_escape_string($_POST['message']);
    $status = $conn->real_escape_string($_POST['status']);
    
    $sql = "INSERT INTO donations (donor_name, donor_email, amount, donation_date, message, status) 
            VALUES ('$donor_name', '$donor_email', '$amount', '$donation_date', '$message', '$status')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New donation added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch donations from the database
$sql = "SELECT * FROM donations";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Donations</title>
    <style>
        /* General Styles */
body, h2, table, form {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    line-height: 1.6;
}

header {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
}

header nav ul {
    list-style: none;
    text-align: center;
    padding: 0;
}

header nav ul li {
    display: inline;
    margin: 0 15px;
}

header nav ul li a {
    color: #fff;
    text-decoration: none;
}

main {
    max-width: 900px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
    text-align: center;
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table thead {
    background-color: #333;
    color: #fff;
}

table th, table td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
}

table tr:nth-child(even) {
    background-color: #f4f4f4;
}

table tr:hover {
    background-color: #e9e9e9;
}

/* Form Styles */
form {
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    margin-bottom: 20px;
}

form div {
    margin-bottom: 15px;
}

form label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

form input, form select, form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

form button {
    width: 100%;
    padding: 10px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

form button:hover {
    background-color: #2980b9;
}

/* Button Styles */
a.button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #3498db;
    color: white;
    text-decoration: none;
    border-radius: 4px;
}

a.button:hover {
    background-color: #2980b9;
}
</style>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="../index.html">Home</a></li>
                <li><a href="admin.html">Dashboard</a></li>
                <li><a href="manage_donations.php">Manage Donations</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Manage Donations</h2>
        
        <!-- Add Donation Form -->
        <form action="manage_donations.php" method="POST">
            <div>
                <label for="donor_name">Donor Name:</label>
                <input type="text" id="donor_name" name="donor_name" required>
            </div>
            <div>
                <label for="donor_email">Donor Email:</label>
                <input type="email" id="donor_email" name="donor_email" required>
            </div>
            <div>
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" step="0.01" required>
            </div>
            <div>
                <label for="donation_date">Donation Date:</label>
                <input type="date" id="donation_date" name="donation_date" required>
            </div>
            <div>
                <label for="message">Message:</label>
                <textarea id="message" name="message"></textarea>
            </div>
            <div>
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                    <option value="Canceled">Canceled</option>
                </select>
            </div>
            <button type="submit">Add Donation</button>
        </form>

        <!-- Display Donations -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Donor Name</th>
                    <th>Donor Email</th>
                    <th>Amount</th>
                    <th>Donation Date</th>
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
                            <td><?php echo $row['donor_name']; ?></td>
                            <td><?php echo $row['donor_email']; ?></td>
                            <td><?php echo $row['amount']; ?></td>
                            <td><?php echo $row['donation_date']; ?></td>
                            <td><?php echo $row['message']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <a href="edit_donation.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                                <a href="delete_donation.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this donation?');">Delete</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">No donations found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>

<?php $conn->close(); ?>
