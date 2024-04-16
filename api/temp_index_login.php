<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <h2>Login Form</h2>
    <form action="login.php" method="POST">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="type">User Type:</label><br>
        <select id="type" name="type" required>
            <option value="customer">Customer</option>
            <option value="admin">Admin</option>
            <!-- Add other user types here if needed -->
        </select><br><br>
        
        <input type="submit" value="Login">
    </form>
</body>
</html>
