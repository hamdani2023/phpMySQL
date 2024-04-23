<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management</title>
    <link rel="stylesheet" href="css/usersManag.css">

</head>

<body>
    <form action="src/register.php" method="post" id="registerForm">
        <fieldset>
            <legend> Create new user</legend>
            <div class="form-container">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Username" required />
            </div>

            <div class="form-container">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Email" required />
            </div>

            <div class="form-container">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Password" required />
            </div>

            <div class="form-container">
                <button type="submit">Register</button>
            </div>
        </fieldset>
    </form>


    <form action="src/update_user.php" method="post" id="updateForm">
        <fieldset>
            <legend>Update User Information</legend>
            <div class="form-container">
                <label for="email">Enter Email:</label>
                <input type="email" id="email" name="email" placeholder="Email" required />
            </div>

            <div class="form-container">
                <label for="newUsername">New Username:</label>
                <input type="text" id="newUsername" name="newUsername" placeholder="New Username" />
            </div>

            <div class="form-container">
                <label for="newPassword">New Password:</label>
                <input type="password" id="newPassword" name="newPassword" placeholder="New Password" />
            </div>

            <div class="form-container">
                <button type="submit">Update</button>
            </div>
        </fieldset>
    </form>

    <form action="src/delete_user.php" method="post" id="deleteForm">
        <fieldset>
            <legend>Delete User</legend>
            <div class="form-container">
                <label for="email">Enter Email:</label>
                <input type="email" id="email" name="email" placeholder="Email" required />
            </div>

            <div class="form-container">
                <button type="submit">Delete</button>
            </div>
        </fieldset>
    </form>

    <form action="src/find_user.php" method="post" id="findForm" target="_blank">
        <fieldset>
            <legend>Find User</legend>
            <div class="form-container">
                <label for="email">Enter Email:</label>
                <input type="email" id="email" name="email" placeholder="Email" required />
            </div>

            <div class="form-container">
                <button type="submit">Find</button>
            </div>
        </fieldset>
    </form>

    <form action="src/list_users.php" method="post" target="_blank">
        <fieldset>
            <legend>List All Users</legend>
            <div class="form-container">
                <button type="submit" name="list_users">List All Users</button>
            </div>
        </fieldset>
    </form>

    <fieldset>
        <a href="tutorial.php" target="_blank">
            <button>Tutorial PHP and MySQL</button>
        </a>
    </fieldset>

</body>

</html>