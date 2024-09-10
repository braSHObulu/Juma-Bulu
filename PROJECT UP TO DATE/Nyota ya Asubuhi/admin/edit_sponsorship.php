<?php
include 'db_connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM sponsorships WHERE id = $id";
$result = $conn->query($sql);
$sponsorship = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sponsorship</title>
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
        <style>
            /* General Styles */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background: #333;
    color: #fff;
    padding: 1rem;
    text-align: center;
}

nav ul {
    list-style: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 10px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
}

h1, h2 {
    color: #333;
}

main {
    padding: 20px;
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 8px;
    text-align: left;
}

th {
    background-color: #333;
    color: #fff;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

a {
    color: #007BFF;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Form Styles */
form {
    background: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    max-width: 600px;
    margin: auto;
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
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

textarea {
    height: 100px;
}

button {
    background-color: #333;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #555;
}
</style>
    </header>

    <main>
        <h2>Edit Sponsorship</h2>
        <form action="edit_sponsorship_process.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $sponsorship['id']; ?>">

            <div>
                <label for="sponsor_name">Sponsor Name:</label>
                <input type="text" id="sponsor_name" name="sponsor_name" value="<?php echo $sponsorship['sponsor_name']; ?>" required>
            </div>
            <div>
                <label for="sponsor_email">Sponsor Email:</label>
                <input type="email" id="sponsor_email" name="sponsor_email" value="<?php echo $sponsorship['sponsor_email']; ?>" required>
            </div>
            <div>
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" step="0.01" value="<?php echo $sponsorship['amount']; ?>" required>
            </div>
            <div>
                <label for="sponsorship_date">Sponsorship Date:</label>
                <input type="date" id="sponsorship_date" name="sponsorship_date" value="<?php echo $sponsorship['sponsorship_date']; ?>" required>
            </div>
            <div>
                <label for="message">Message:</label>
                <textarea id="message" name="message"><?php echo $sponsorship['message']; ?></textarea>
            </div>
            <div>
                <label for="status">Status:</label>
                <select id="status" name="status">
                    <option value="Pending" <?php if ($sponsorship['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                    <option value="Active" <?php if ($sponsorship['status'] == 'Active') echo 'selected'; ?>>Active</option>
                    <option value="Ended" <?php if ($sponsorship['status'] == 'Ended') echo 'selected'; ?>>Ended</option>
                </select>
            </div>
            <button type="submit">Update Sponsorship</button>
        </form>
    </main>
</body>
</html>

<?php $conn->close(); ?>
