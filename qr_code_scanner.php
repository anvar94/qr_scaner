
<?php
$servername = "localhost";
$username = "root";
$password = "barclays4448";
$dbname = "green_product_info";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("MySQL ulanishida xatolik: " . $conn->connect_error);
}

$product = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['qr_code'])) {
    $qr_code = $conn->real_escape_string($_POST['qr_code']);
    $sql = "SELECT * FROM product_info WHERE qr_code = '$qr_code'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "<script>alert('QR kodga mos mahsulot topilmadi!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Kodni Skanerlash</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        h1 {
            color: #2c3e50;
        }

        #camera {
            width: 300px;
            height: 300px;
            border: 2px solid #27ae60;
            border-radius: 10px;
            background-color: #eafaf1;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #2c3e50;
            margin-bottom: 20px;
            overflow: hidden;
        }

        video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        button {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1em;
            cursor: pointer;
        }

        button:hover {
            background-color: #219150;
        }

        .product {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            width: 80%;
            max-width: 400px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .product img {
            width: 100%;
            max-width: 200px;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .product h2 {
            margin: 0;
            color: #27ae60;
        }

        .product pre {
            white-space: pre-wrap;
            word-wrap: break-word;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <h1>QR Kodni Skanerlash</h1>
    <div id="camera">
        <video id="video" autoplay></video>
    </div>
    <form method="POST" action="">
        <input type="hidden" id="qr_code" name="qr_code">
        <button type="submit" id="captureButton">Rasmni olish</button>
    </form>

    <?php if ($product): ?>
        <div class="product">
            <img src="<?php echo $product['image_path']; ?>" alt="<?php echo $product['data_type']; ?>">
            <h2><?php echo $product['data_type']; ?></h2>
            <pre><?php echo $product['attributes']; ?></pre>
        </div>
    <?php endif; ?>

    <script>
        const video = document.getElementById('video');
        const qrCodeInput = document.getElementById('qr_code');

        // Access the camera
        navigator.mediaDevices.getUserMedia({ video: true })
            .then(stream => {
                video.srcObject = stream;
            })
            .catch(err => {
                console.error("Kamera ulanishida xatolik:", err);
                alert("Kameraga ulanish mumkin emas");
            });

        // Simulate QR code scanning
        // In a real application, integrate a QR scanning library like jsQR or QuaggaJS
        document.querySelector('form').addEventListener('submit', (e) => {
            e.preventDefault();
            qrCodeInput.value = 'qr123'; // Example QR code value
            e.target.submit();
        });
    </script>
</body>
</html>

