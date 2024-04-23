<?php
require_once 'config.php'; // Include the Database class

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email from form
    $email = $_POST['email'];

    // Instantiate Database class
    $db = new Database();
    $conn = $db->connect(); // Connect to the database


    // Check if user exists
    $query = "SELECT * FROM users2024 WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // User found, delete user
        $deleteQuery = "DELETE FROM users2024 WHERE email = '$email'";
        if ($conn->query($deleteQuery) === TRUE) {
            echo "User deleted successfully";
        } else {
            echo "Error deleting user: " . $conn->error;
        }
    } else {
        // User not found
        echo "User not found";
    }
}
