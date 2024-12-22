<?php
// Database credentials
$host = "localhost";
$username = "root"; // Replace with your DB username
$password = ""; // Replace with your DB password
$dbname = "company_db";

// Connect to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$registration_id = $_POST['registration_id'] ?? '';
$password = $_POST['password'] ?? '';

// Check if the registration ID and password match a record in the database
$sql = "SELECT * FROM companies WHERE registration_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $registration_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    
    // Verify the password
    if (md5($password) === $row['password']) { // Use password_verify() for bcrypt
        echo "<h1>Login Successful</h1>";
        echo "<p>Welcome to the company dashboard.</p>";
    } else {
        echo "<h1>Login Failed</h1>";
        echo "<p>Invalid password. Please try again.</p>";
    }
} else {
    echo "<h1>Login Failed</h1>";
    echo "<p>Invalid Registration ID. Please try again.</p>";
}

// Close the connection
$stmt->close();
$conn->close();
?>
