<?php
require_once 'config.php'; // Include the Database class

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get email from form
    $email = $_POST['email'];


    // Instantiate Database class
    $db = new Database();
    $conn = $db->connect(); // Connect to the database


    // Query to find user by email
    $query = "SELECT * FROM users2024 WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // User found, display user information
        $user = $result->fetch_assoc();
        echo "User found:<br>";
        echo "Username: " . $user['username'] . "<br>";
        echo "Email: " . $user['email'] . "<br>";
        // Add more user information here if needed
    } else {
        // User not found
        echo "User not found";
    }
}
