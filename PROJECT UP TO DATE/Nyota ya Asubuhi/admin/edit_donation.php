<?php
include 'db_connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM donations WHERE id = $id";
$result = $conn->query($sql);
$donation = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donation</title>
    <style>
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    line-height: 1.6;
    margin: 0;
    padding: 0;
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
    border-radius: 5px;
}

h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
}

form div {
    margin-bottom: 15px;
}

label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="number"],
input[type="date"],
textarea,
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
}

textarea {
    height: 100px;
    resize: vertical;
}

button {
    width: 100%;
    padding: 10px;
    background-color: #3498db;
    color: white;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
}

button:hover {
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
        <h2>Edit Donation</h2>
        <form action="edit_donation_process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $donation['id']; ?>">

            <div>
                <label for="donor_name">Donor Name:</label>
                <input type="text" id="donor_name" name="donor_name" value="<?php echo $donation['donor_name']; ?>" required>
            </div>
            <div>
                <label for="donor_email">Donor Email:</label>
                <input type="email" id="donor_email" name="donor_email" value="<?php echo $donation['donor_email']; ?>" required>
            </div>
            <div>
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" step="0.01" value="<?php echo $donation['amount']; ?>" required>
            </div>
            <div>
                <label for="donation_date">Donation Date:</label>
                <input type="date" id="donation_date" name="donation_date" value="<?php echo $donation['donation_date']; ?>" required>
            </div>
            <div>
                <label for="message">Message:</label>
                <textarea id="message" name="message"><?php echo $donation['message']; ?></textarea>
            </div>
            <div>
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="Pending" <?php if ($donation['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                    <option value="Completed" <?php if ($donation['status'] == 'Completed') echo 'selected'; ?>>Completed</option>
                    <option value="Canceled" <?php if ($donation['status'] == 'Canceled') echo 'selected'; ?>>Canceled</option>
                </select>
            </div>
            <button type="submit">Update Donation</button>
        </form>
    </main>
</body>
</html>

<?php $conn->close(); ?>
