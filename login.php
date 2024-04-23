<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="CSS/login.css" />
</head>

<body>
    <form method="post" id="loginForm">
        <fieldset>
            <div class="form-container">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" placeholder="email" required />
            </div>

            <div class="form-container">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="password" />
            </div>

            <div class="form-container">
                <button onclick="clearForm()">Cancel</button>
                <button type="submit">Enter</button>
            </div>
        </fieldset>
    </form>


    <?php
    require_once 'src/config.php'; // Assuming your Database class file is named Database.php

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get username and password from form
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Instantiate Database class
        $db = new Database();
        $conn = $db->connect(); // Connect to the database

        // Prepare SQL statement to select user with provided email
        $sql = "SELECT * FROM  users2024 WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        // Get result
        $result = $stmt->get_result();

        // Check if user exists and password matches
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (trim($password) === trim($user['password'])) {
                // Password matches, login successful
                header("Location: usersManag.php");
                exit(); // Make sure to exit after redirecting

            } else {
                // Password does not match
                echo "Invalid password";
            }
        } else {
            // User not found
            echo "User not found";
        }

        // Disconnect from the database
        $db->disconnect();
    }
    ?>



    <script>
        function clearForm() {
            document.getElementById("loginForm").reset();
        }
    </script>
</body>

</html>