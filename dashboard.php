<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

// Include the QR Code library (requires PHP QR Code Library)
require_once('phpqrcode/qrlib.php');

// Database connection
$host = "localhost";
$username = "root";
$password = "barclays4448";
$dbname = "product_management";

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Create QR Code directory if it doesn't exist
if (!is_dir('qrcodes')) {
    mkdir('qrcodes', 0755, true);
}
?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #27ae60;
            color: white;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        form {
            margin-bottom: 30px;
        }

        label {
            display: block;
            font-weight: bold;
            margin: 10px 0 5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #27ae60;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #219150;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <header>
        <h1>Xush kelibsiz, <?php echo htmlspecialchars($_SESSION['user']); ?>!</h1>
        <p>Mahsulotingizni boshqarish uchun quyidagi formadan foydalaning.</p>
    </header>

    <div class="container">
        <!-- QR Code Generation Form -->
        <form method="POST" action="">
            <h2>QR Kod Yaratish</h2>
            <label for="product_link">Mahsulot havolasi:</label>
            <input type="text" id="product_link" name="product_link" placeholder="Mahsulot haqida ma'lumot havolasi" required>
            <button type="submit" name="generate_qr">QR Kodni Yaratish</button>
        </form>

        <?php
        if (isset($_POST['generate_qr'])) {
            $productLink = $_POST['product_link'];
            $qrCodeFile = 'qrcodes/' . md5($productLink) . '.png';
            QRcode::png($productLink, $qrCodeFile, QR_ECLEVEL_L, 10);

            echo "<h3>QR Kod yaratildi:</h3>";
            echo "<img src='$qrCodeFile' alt='QR Code'>";
        }
        ?>

        <!-- Product Information Form -->
        <form method="POST" action="">
            <h2>Mahsulot haqida ma'lumot qo'shish</h2>
            <!-- Form Fields -->
            <label for="material">Xom-ashyo tarkibi:</label>
            <textarea id="material" name="material" required></textarea>

            <label for="product_name">Mahsulot nomi:</label>
            <input type="text" id="product_name" name="product_name" required>

            <label for="brand">Brendi:</label>
            <input type="text" id="brand" name="brand" required>

            <label for="barcode">Shtrix kodi:</label>
            <input type="text" id="barcode" name="barcode" required>

            <label for="size">O'lchami:</label>
            <input type="text" id="size" name="size" required>

            <label for="color">Rangi:</label>
            <input type="text" id="color" name="color" required>

            <label for="year">Ishlab chiqarilgan yili:</label>
            <input type="number" id="year" name="year" required>

            <label for="price">Narxi:</label>
            <input type="number" id="price" name="price" step="0.01" required>

            <label for="care_instructions">Parvarishlash yo'riqnomasi:</label>
            <textarea id="care_instructions" name="care_instructions"></textarea>

            <label for="supplier">Ta'minotchi nomi:</label>
            <input type="text" id="supplier" name="supplier" required>

            <label for="supplier_address">Ta'minotchi manzili:</label>
            <textarea id="supplier_address" name="supplier_address" required></textarea>

            <label for="manufactured_in">Mahsulot ishlab chiqarilgan joyi:</label>
            <input type="text" id="manufactured_in" name="manufactured_in" required>

            <label for="recycling_info">Qayta qabul yo'riqnomasi:</label>
            <textarea id="recycling_info" name="recycling_info"></textarea>

            <label for="certificates">Sertifikatlar:</label>
            <textarea id="certificates" name="certificates"></textarea>

            <button type="submit" name="add_product">Mahsulotni Qo'shish</button>
        </form>

        <?php
        if (isset($_POST['add_product'])) {
            // Collect form data
            $material = $_POST['material'];
            $productName = $_POST['product_name'];
            $brand = $_POST['brand'];
            $barcode = $_POST['barcode'];
            $size = $_POST['size'];
            $color = $_POST['color'];
            $year = $_POST['year'];
            $price = $_POST['price'];
            $careInstructions = $_POST['care_instructions'];
            $supplier = $_POST['supplier'];
            $supplierAddress = $_POST['supplier_address'];
            $manufacturedIn = $_POST['manufactured_in'];
            $recyclingInfo = $_POST['recycling_info'];
            $certificates = $_POST['certificates'];

            // Generate QR Code
            $productLink = "Product Name: $productName, Brand: $brand, Barcode: $barcode"; // Customize the QR content
            $qrCodeFile = 'qrcodes/' . md5($productLink) . '.png';
            QRcode::png($productLink, $qrCodeFile, QR_ECLEVEL_L, 10);

            // Insert product data into the database
            $stmt = $conn->prepare("INSERT INTO products (material, product_name, brand, barcode, size, color, year, price, care_instructions, supplier, supplier_address, manufactured_in, recycling_info, certificates, qr_code_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param(
                "ssssssidsisssss",
                $material,
                $productName,
                $brand,
                $barcode,
                $size,
                $color,
                $year,
                $price,
                $careInstructions,
                $supplier,
                $supplierAddress,
                $manufacturedIn,
                $recyclingInfo,
                $certificates,
                $qrCodeFile // Store the path in the database
            );

            if ($stmt->execute()) {
                echo "<h3>Mahsulot muvaffaqiyatli qo'shildi va QR Kod yaratildi!</h3>";
            } else {
                echo "<h3>Xato yuz berdi: " . $stmt->error . "</h3>";
            }

            $stmt->close();
        }
        ?>

        }

        // Display Existing Products
        $result = $conn->query("SELECT * FROM products");
        if ($result->num_rows > 0) {
            echo "<h2>Mavjud Mahsulotlar</h2>";
            echo "<table><tr><th>ID</th><th>Material</th><th>Nomi</th><th>Brendi</th><th>Narxi</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>{$row['id']}</td><td>{$row['material']}</td><td>{$row['product_name']}</td><td>{$row['brand']}</td><td>{$row['price']}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Hozircha mahsulotlar mavjud emas.</p>";
        }
        ?>
    </div>
</body>
</html>
