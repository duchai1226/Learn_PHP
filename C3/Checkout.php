<?php
session_start();
$dbname = "ql_nha_hang";
$driver = "mysql:host=localhost;dbname=$dbname";
$username = "root";
$password = "";

try {
    $pdo = new PDO($driver, $username, $password);

    // Xử lý form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Lấy thông tin từ form
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        // Kiểm tra email có tồn tại
        $stmt = $pdo->prepare("SELECT email FROM khach_hang WHERE email = ?");
        $stmt->execute([$email]);
        $existingEmail = $stmt->fetch();

        if (!$existingEmail) {
            // Email chưa tồn tại, thêm khách hàng mới
            $stmt = $pdo->prepare("INSERT INTO khach_hang (ten_khach_hang, email, dia_chi) VALUES (?, ?, ?)");
            if ($stmt->execute([$fullname, $email, $address])) {
                $successMsg = "Đăng ký thành công!";
            } else {
                $errorMsg = "Có lỗi xảy ra khi đăng ký!";
            }
        } else {
            $infoMsg = "Email này đã được đăng ký!";
        }
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - Gánh Xưa Restaurant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: #f5f5f5;
        }

        .checkout-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .checkout-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .form-section {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .order-summary {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 4px;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .checkout-button {
            background: #8CC63F;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        .checkout-button:hover {
            background: #7ab32f;
        }

        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            text-align: center;
        }

        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .info {
            background: #cce5ff;
            color: #004085;
            border: 1px solid #b8daff;
        }
    </style>
</head>

<body>
    <div class="checkout-container">
        <h2>THÔNG TIN ĐƠN HÀNG</h2>

        <?php if (isset($successMsg)): ?>
            <div class="message success"><?php echo $successMsg; ?></div>
        <?php endif; ?>

        <?php if (isset($errorMsg)): ?>
            <div class="message error"><?php echo $errorMsg; ?></div>
        <?php endif; ?>

        <?php if (isset($infoMsg)): ?>
            <div class="message info"><?php echo $infoMsg; ?></div>
        <?php endif; ?>

        <div class="checkout-form">
            <div class="form-section">
                <h3>Địa chỉ đơn hàng</h3>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="fullname">Full name</label>
                        <input type="text" id="fullname" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" required>
                    </div>
                    <button type="submit" class="checkout-button">Tiếp tục thanh toán</button>
                </form>
            </div>

            <div class="form-section">
                <h3>Giỏ hàng</h3>
                <div class="order-summary">
                    <?php
                    $total = 0;
                    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $item) {
                            $subtotal = $item['don_gia'] * $item['quantity'];
                            $total += $subtotal;
                            ?>
                            <div class="order-item">
                                <span><?php echo $item['ten_mon']; ?></span>
                                <span>
                                    Quantity: <?php echo $item['quantity']; ?>
                                    Price: <?php echo number_format($subtotal, 0, ',', '.'); ?>đ
                                </span>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="order-item" style="font-weight: bold;">
                        <span>Total (USD)</span>
                        <span><?php echo number_format($total, 0, ',', '.'); ?>đ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>