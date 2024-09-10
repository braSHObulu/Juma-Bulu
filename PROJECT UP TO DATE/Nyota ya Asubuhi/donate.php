<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donate Now</title>
    <style>
        /* Add your existing styles here */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background-color: #333;
    color: #fff;
    padding: 10px 0;
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
}

nav ul li {
    margin: 0 15px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

main {
    padding: 20px;
    max-width: 800px;
    margin: 20px auto;
    background: #fff;
    border-radius: 5px;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

form {
    display: flex;
    flex-direction: column;
}

form div {
    margin-bottom: 15px;
}

form label {
    margin-bottom: 5px;
    display: block;
}

form input, form textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

form button {
    padding: 10px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

form button:hover {
    background-color: #555;
}
        .back-link {
            display: block;
            margin: 15px 0;
            padding: 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            width: fit-content;
        }

        .back-link:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <!-- Back to Donor Dashboard Link -->
    <a href="donor-dashboard.html" class="back-link">Back to Donor Dashboard</a>

    <header>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="donate.php">Make a Donation</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Make a Donation</h2>
        <form action="process_donation.php" method="POST">
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
            <button type="submit">Donate Now</button>
        </form>
    </main>

</body>
</html>
