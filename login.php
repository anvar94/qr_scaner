<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Mahsulot Egasi Login</h1>
        <p>Sistemaga kirish uchun login ma'lumotlarini kiriting</p>
    </header>

    <div class="container">
        <form action="authenticate.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Email" required>

            <label for="password">Parol:</label>
            <input type="password" id="password" name="password" placeholder="Parol" required>

            <button type="submit">Kirish</button>
        </form>
        <p>Ro'yxatdan o'tmaganmisiz? <a href="owners_registration.php">Ro'yxatdan o'ting</a>.</p>
    </div>

    <footer>
        <p>Yashil Kiyimlar | Mahsulot egalari tizimi</p>
    </footer>
</body>
</html>
