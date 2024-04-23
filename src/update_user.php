<?php
require_once 'config.php'; // Include the Database class

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $newUsername = $_POST['newUsername'];
    $newPassword = $_POST['newPassword'];

    // Instantiate Database class
    $db = new Database();
    $conn = $db->connect(); // Connect to the database


    // Check if user exists
    $query = "SELECT * FROM users2024 WHERE email = '$email'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // User found, update information
        $updateQuery = "UPDATE users2024 SET ";
        if (!empty($newUsername)) {
            $updateQuery .= "username = '$newUsername'";
        }
        if (!empty($newPassword)) {
            $updateQuery .= ", password = '$newPassword'";
        }
        $updateQuery .= " WHERE email = '$email'";

        if ($conn->query($updateQuery) === TRUE) {
            echo "User information updated successfully";
        } else {
            echo "Error updating user information: " . $conn->error;
        }
    } else {
        // User not found
        echo "User not found";
    }
}
