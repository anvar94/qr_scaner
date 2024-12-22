<?php
$host = "localhost";
$username = "root";
$password = "barclays4448"; // Use your actual MySQL root password
$dbname = "company_db";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch data
$sql = "SELECT * FROM companies";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Registration ID: " . $row["registration_id"] . " - Password: " . $row["password"] . "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
