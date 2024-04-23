<?php
require_once 'config.php'; // Include the Database class

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Instantiate Database class
    $db = new Database();
    $conn = $db->connect(); // Connect to the database

    // Check if email already exists
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo "Email already exists";
    } else {
        // Email does not exist, insert into database
        $insertQuery = "INSERT INTO users2024 (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($insertQuery) === TRUE) {
            echo "Registration successful";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}
