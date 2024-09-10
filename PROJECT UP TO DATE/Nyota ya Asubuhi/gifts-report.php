<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gifts Report</title>
    <style>
        /* Same internal CSS as used in sponsor-dashboard.html */
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Donated Gifts</h1>
        <?php
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "nyota";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_SESSION["sponsor_id"])) {
            $sponsor_id = $_SESSION["sponsor_id"];

            // Fetch donated gifts
            $sql = "SELECT gift_name, gift_description, gift_quantity, gift_value, gift_date FROM gifts WHERE sponsor_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $sponsor_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo '<table>';
                echo '<tr><th>Gift Name</th><th>Description</th><th>Quantity</th><th>Value (USD)</th><th>Date</th></tr>';

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row["gift_name"]) . '</td>';
                    echo '<td>' . htmlspecialchars($row["gift_description"]) . '</td>';
                    echo '<td>' . htmlspecialchars($row["gift_quantity"]) . '</td>';
                    echo '<td>' . htmlspecialchars($row["gift_value"]) . '</td>';
                    echo '<td>' . htmlspecialchars($row["gift_date"]) . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
            } else {
                echo "<p>You haven't donated any gifts yet.</p>";
            }

            $stmt->close();
        } else {
            echo "<p>Please log in to view your donated gifts.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
