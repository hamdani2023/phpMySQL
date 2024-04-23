<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial</title>
    <link rel="stylesheet" href="css/tutorial..css">


</head>

<body>
    <?php
    require_once 'src/config.php';

    $db = new Database();
    $conn = $db->connect(); // Connect to the database
    ?>

    <div class="page">
        <fieldset class="example">
            <legend>Examples</legend>

            <h5>Create Table</h5>
            <pre>
 CREATE TABLE IF NOT EXISTS users2024 ( <br>
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,<br>
            username VARCHAR(30) NOT NULL,<br>
            email VARCHAR(50) NOT NULL,<br>
            password VARCHAR(30) NOT NULL
 )
</pre>

            <h5>Delete Table</h5>
            <pre>
DROP TABLE IF EXISTS users2024
</pre>

            <h5>Update Table</h5>
            <pre>
ALTER TABLE  users2024  ADD COLUMN age INT(3)

ALTER TABLE  users2024  MODIFY COLUMN  age  INT(4)
</pre>


            <h5>Insert a new USER</h5>
            <pre>
INSERT INTO  users2024 (username, email, password) 
                       VALUES ("isil", "isil@isil.com", "isil")
</pre>

            <h5>Delete a USER</h5>
            <pre>
DELETE FROM users2024 WHERE id = 1
</pre>

            <h5>Update a USER</h5>
            <pre>
UPDATE  users2024 SET username = 'NewUsername', 
                    email = 'newemail@example.com' 
                    WHERE id = 1
</pre>
        </fieldset>

        <fieldset class="grid-container">





            <legend>Querry Execution</legend>

            <form method="post" class="flex-container">
                <textarea name="table_query" id="table_query" placeholder="Insert your query here ..."></textarea>

                <fieldset class="flex-button">
                    <button type=" submit" name="submit">Execute SQL</button>
                    <button type="submit" name="test_connection">Test Connection</button>
                </fieldset>
            </form>


            <?php

            if (isset($_POST['test_connection'])) {
                echo $db->testConnection();
            }

            // Check if "Execute SQL" button is clicked
            if (isset($_POST['submit'])) {
                // Get SQL query from textarea
                $table_query = $_POST['table_query'];


                if ($conn->query($table_query) === TRUE) {
                    echo "SQL query executed successfully";
                } else {
                    echo "Error executing SQL query: " . $conn->error;
                }
                $db->disconnect();
            }
            ?>
        </fieldset>
    </div>



    <div class="page">
        <fieldset class="signup">
            <legend>Example- SQL</legend>
            <h5>Select USERS</h5> <br>
            <pre>
SELECT * FROM  users2024 
WHERE id = 1
</pre>


            <a href="login.php" target="_blank">
                <button>Sign up</button>
            </a>

        </fieldset>

        <fieldset class="grid-container">
            <legend>Querry Execution</legend>

            <form method="post" class="flex-container">
                <textarea name="sql_query" id="sql_query" placeholder="Insert your query here ..."></textarea>

                <fieldset class="flex-button">
                    <button type=" submit" name="submit1">Execute SQL</button>
                    <button type="submit" name="test_connection1">Test Connection</button>
                </fieldset>
            </form>

            <div>
                <?php

                if (isset($_POST['test_connection1'])) {
                    echo $db->testConnection();
                }
                // Check if "Execute SQL" button is clicked
                if (isset($_POST['submit1'])) {
                    // Get SQL query from textarea
                    $sql_query = $_POST['sql_query'];

                    if (empty(trim($sql_query))) {
                        die("SQL query is empty");
                    }

                    // Execute SQL query
                    $result = $conn->query($sql_query);

                    if ($result) {
                        if ($result->num_rows > 0) {
                            echo "<table>";
                            echo "<tr><th>ID</th><th>Username</th><th>Email</th> <th>Password</th></tr>";
                            // Output data of the selected user
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["username"] . "</td><td>" . $row["email"] . "</td><td>" . $row["password"] . "</td></tr>";
                            }
                            echo "</table>";
                        } else {
                            echo "No records found";
                        }
                    } else {
                        echo "Error executing SQL query: " . $conn->error;
                    }

                    // Close connection
                    $db->disconnect();
                }
                ?>
            </div>
        </fieldset>
    </div>



</body>

</html>