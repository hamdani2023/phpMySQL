<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List users</title>
    <style>
        /* Style the table */
        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            font-family: Arial, sans-serif;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Style the table header */
        th {
            background-color: #f2f2f2;
            padding: 12px 15px;
            text-align: left;
            font-weight: bold;
            color: #333;
            border-bottom: 2px solid #ddd;
            text-transform: uppercase;
            border-radius: 5px 5px 0 0;
        }

        /* Style the table rows */
        tr:nth-child(even) {
            background-color: #e5f8cc;
        }

        tr:nth-child(odd) {
            background-color: #edfaff9f;
        }

        /* Style table cells */
        td {
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
        }

        /* Hover effect on table rows */
        tr:hover {
            background-color: #fdb0b0;
        }

        /* Style the first column (for example, the ID column) */
        td:first-child {
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>

<body>
    <?php
    require_once 'config.php'; // Include the Database class

    // Check if the button to list users is clicked
    if (isset($_POST['list_users'])) {
        // Instantiate Database class
        $db = new Database();
        $conn = $db->connect(); // Connect to the database

        // Query to select all users
        $query = "SELECT * FROM users2024";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            // Display users in a table if there are any
            echo "<h2>All Users:</h2>";
            echo "<table>";
            echo "<tr><th>Username</th><th>Email</th><th>Password</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row['username'] . "</td><td>" . $row['email'] . "</td><td>" . $row['password'] . "</td></tr>";
                // Add more user information here if needed
            }
            echo "</table>";
        } else {
            // No users found
            echo "No users found";
        }
    }
    ?>
</body>

</html>