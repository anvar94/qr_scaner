<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahsulot Egasi Ro'yxatdan O'tish</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Ro'yxatdan O'tish</h1>
        <p>Mahsulotingizni ro'yxatga olish uchun quyidagi formani to'ldiring</p>
    </header>

    <div class="container">
        <form action="submit_registration.php" method="POST">
            <label for="name">Ism:</label>
            <input type="text" id="name" name="name" placeholder="Ism" required>

            <label for="surname">Familiya:</label>
            <input type="text" id="surname" name="surname" placeholder="Familiya" required>

            <label for="email">Email manzilingiz:</label>
            <input type="email" id="email" name="email" placeholder="Email" required>

            <label for="company">Kompaniya nomi:</label>
            <input type="text" id="company" name="company" placeholder="Kompaniya nomi" required>

            <label for="phone">Telefon raqamingiz:</label>
            <input type="tel" id="phone" name="phone" placeholder="Telefon raqam" required>

            <label for="password">Parol:</label>
            <input type="password" id="password" name="password" placeholder="Parol" required>

            <label for="confirm_password">Parolni tasdiqlash:</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Parolni qaytadan kiriting" required>

            <button type="submit">Ro'yxatdan o'tish</button>
        </form>
        <p>Siz allaqachon ro'yxatdan o'tganmisiz? <a href="login.php">Login qiling</a>.</p>
    </div>

    <footer>
        <p>Yashil Kiyimlar | Mahsulot egalari uchun tizim</p>
    </footer>
</body>
</html>
<script>
    const form = document.querySelector('form');
    const password = document.getElementById('password');
    const confirmPassword = document.getElementById('confirm_password');

    form.addEventListener('submit', function (e) {
        if (password.value !== confirmPassword.value) {
            e.preventDefault();
            alert('Parollar bir xil emas. Iltimos, qaytadan urinib ko\'ring.');
        }
    });
</script>
