<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Page</title>
</head>
<body>
    <h1>Welcome to the Company Page</h1>
    <form action="company_action.php" method="post">
        <label for="registration_id">Registration ID:</label>
        <input type="text" id="registration_id" name="registration_id" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
