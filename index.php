<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yashil Kiyimlar</title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            color: #2c3e50;
            background-color: #eafaf1;
            line-height: 1.6;
        }

        header {
            background-color: #27ae60;
            color: white;
            padding: 20px 10%;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        header p {
            margin: 5px 0 0;
            font-size: 1.2em;
        }

        nav {
            text-align: center;
            margin: 20px 0;
        }

        nav a {
            text-decoration: none;
            color: white;
            background-color: #27ae60;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 0 10px;
            font-size: 1em;
            display: inline-block;
        }

        nav a:hover {
            background-color: #219150;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.03);
        }

        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-content {
            padding: 15px;
        }

        .card-content h2 {
            margin: 0;
            color: #27ae60;
            font-size: 1.5em;
        }

        .card-content p {
            margin: 10px 0;
        }

        footer {
            text-align: center;
            padding: 20px 10%;
            background-color: #27ae60;
            color: white;
            margin-top: 20px;
        }

        footer p {
            margin: 0;
        }

        footer a {
            color: white;
            text-decoration: underline;
        }

        footer a:hover {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <h1>Yashil Kiyimlar</h1>
        <p>Barqaror moda uchun ekologik kiyimlar</p>
    </header>

    <nav>
        <a href="#products">Mahsulotlarimiz</a>
        <a href="#about">Biz haqimizda</a>
        <a href="#contact">Bog'lanish</a>
        <a href="qr_code_scanner.php" target="_blank">QR Kodni skanerlash</a>
        <a href="login.php" target="_blank">Mahsulot egalari</a>

    </nav>

    <section class="container" id="products">
        <div class="card">
            <img src="img/organic_tshirt.jpg" alt="Organik futbolkalar">
            <div class="card-content">
                <h2>Organik futbolkalar</h2>
                <p>100% organik paxtadan tayyorlangan, teriga qulay futbolkalar.</p>
            </div>
        </div>

        <div class="card">
            <img src="img/recycled_denim.jpg" alt="Qayta ishlangan denim">
            <div class="card-content">
                <h2>Qayta ishlangan denim</h2>
                <p>Barqaror moda uchun qayta ishlangan jinsilar.</p>
            </div>
        </div>

        <div class="card">
            <img src="img/eco_friendly_dresses.jpg" alt="Ekologik ko'ylaklar">
            <div class="card-content">
                <h2>Ekologik ko'ylaklar</h2>
                <p>Tabiiy materiallardan tayyorlangan, zamonaviy va barqaror ko'ylaklar.</p>
            </div>
        </div>

        <!-- Additional 9 Products -->
        <div class="card">
            <img src="img/recycled_socks.jpg" alt="Qayta ishlangan paypoqlar">
            <div class="card-content">
                <h2>Qayta ishlangan paypoqlar</h2>
                <p>Qayta ishlangan materiallardan tayyorlangan yumshoq va qulay paypoqlar.</p>
            </div>
        </div>

        <div class="card">
            <img src="img/hemp_bags.jpg" alt="Kanopdan sumkalar">
            <div class="card-content">
                <h2>Kanopdan sumkalar</h2>
                <p>Tabiiy kanopdan tayyorlangan bardoshli va uslubli sumkalar.</p>
            </div>
        </div>

        <div class="card">
            <img src="img/sustainable_jackets.jpg" alt="Barqaror kurtkalar">
            <div class="card-content">
                <h2>Barqaror kurtkalar</h2>
                <p>Barqaror materiallardan tikilgan issiq kurtkalar.</p>
            </div>
        </div>

        <div class="card">
            <img src="img/linen_pants.jpg" alt="Keten shimlar">
            <div class="card-content">
                <h2>Keten shimlar</h2>
                <p>Havodagi qulaylikni ta'minlovchi tabiiy keten shimlar.</p>
            </div>
        </div>

        <div class="card">
            <img src="img/bamboo_scarves.jpg" alt="Bambuk sharflar">
            <div class="card-content">
                <h2>Bambuk sharflar</h2>
                <p>Bambuk tolalaridan tayyorlangan qulay va yumshoq sharflar.</p>
            </div>
        </div>

        <div class="card">
            <img src="img/upcycled_hats.jpg" alt="Qayta ishlangan shlyapalar">
            <div class="card-content">
                <h2>Qayta ishlangan shlyapalar</h2>
                <p>Eski materiallardan qayta ishlangan, barqaror shlyapalar.</p>
            </div>
        </div>

        <div class="card">
            <img src="img/organic_underwear.jpg" alt="Organik ichki kiyimlar">
            <div class="card-content">
                <h2>Organik ichki kiyimlar</h2>
                <p>Tabiiy va ekologik xavfsiz ichki kiyimlar.</p>
            </div>
        </div>

        <div class="card">
            <img src="img/eco_yoga_pants.jpg" alt="Ekologik yoga shimlari">
            <div class="card-content">
                <h2>Ekologik yoga shimlari</h2>
                <p>Barqaror materiallardan tayyorlangan qulay yoga shimlari.</p>
            </div>
        </div>

        <div class="card">
            <img src="img/recycled_fleece.jpg" alt="Qayta ishlangan flislar">
            <div class="card-content">
                <h2>Qayta ishlangan flislar</h2>
                <p>Issiq va ekologik barqaror flis kiyimlar.</p>
            </div>
        </div>
    </section>

    <footer id="about">
        <p>Yashil Kiyimlar | Barqaror modaning manbai</p>
        <p>Savollaringiz bormi? <a href="#contact">Bog'laning</a>.</p>
    </footer>
</body>
</html>
