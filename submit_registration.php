<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $email = htmlspecialchars($_POST['email']);
    $company = htmlspecialchars($_POST['company']);
    $phone = htmlspecialchars($_POST['phone']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<h1>Xato!</h1>";
        echo "<p>Parollar bir xil emas. <a href='owners_registration.php'>Qaytadan urinib ko'ring</a>.</p>";
        exit();
    }

    // Simulate saving the user (replace with actual database insertion logic)
    $success = true;

    if ($success) {
        echo "<h1>Ro'yxatdan o'tdingiz, $name $surname!</h1>";
        echo "<p>Email: $email</p>";
        echo "<p>Kompaniya nomi: $company</p>";
        echo "<p>Telefon: $phone</p>";
        echo "<a href='login.php'>Tizimga kirish</a>";
    } else {
        echo "<h1>Uzr, xatolik yuz berdi.</h1>";
        echo "<a href='owners_registration.php'>Qaytadan urinib ko'ring</a>";
    }
}
?>
