<?php
session_start();

// Mock database (replace this with actual database queries)
$users = [
    ['email' => 'test@example.com', 'password' => '12345'], // Example user
];

// Collect form data
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Authenticate user
foreach ($users as $user) {
    if ($user['email'] === $email && $user['password'] === $password) {
        // Successful login
        $_SESSION['user'] = $email;
        header('Location: dashboard.php');
        exit();
    }
}

// If authentication fails
echo "<h1>Xato!</h1>";
echo "<p>Email yoki parol noto'g'ri. <a href='login.php'>Qaytadan urinib ko'ring</a>.</p>";
?>
