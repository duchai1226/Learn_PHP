<?php
session_start();

$dbname = "ql_nha_hang";
$driver = "mysql:host=localhost;dbname=$dbname";
$username = "root";
$password = "";

try {
    $pdo = new PDO($driver, $username, $password);

    // Initialize cart if not exists
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add to cart
    if (isset($_POST['add_to_cart'])) {
        $ma_mon = $_POST['ma_mon'];
        $quantity = $_POST['quantity'];

        $stmt = $pdo->prepare("SELECT * FROM mon_an WHERE ma_mon = ?");
        $stmt->execute([$ma_mon]);
        $dish = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($dish) {
            if (isset($_SESSION['cart'][$ma_mon])) {
                $_SESSION['cart'][$ma_mon]['quantity'] += $quantity;
            } else {
                $_SESSION['cart'][$ma_mon] = [
                    'ten_mon' => $dish['ten_mon'],
                    'don_gia' => $dish['don_gia'],
                    'hinh' => $dish['hinh'],
                    'quantity' => $quantity
                ];
            }
        }
        // Redirect back to previous page after adding to cart
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    // Clear cart
    if (isset($_GET['clear'])) {
        $_SESSION['cart'] = [];
        // Redirect back to cart page
        header('Location: Cart.php');
        exit();
    }

    // Remove specific item
    if (isset($_GET['remove'])) {
        unset($_SESSION['cart'][$_GET['remove']]);
        // Redirect back to cart page
        header('Location: Cart.php');
        exit();
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
    <title>Giỏ hàng - Gánh Xưa Restaurant</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .cart-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .cart-header {
            text-align: center;
            color: #8CC63F;
            margin-bottom: 30px;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .cart-table th,
        .cart-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .cart-table img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }

        .quantity-input {
            width: 60px;
            padding: 5px;
            text-align: center;
        }

        .clear-cart {
            background: #ff4444;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        .checkout {
            background: #8CC63F;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            float: right;
            text-decoration: none;
            display: inline-block;
        }

        .checkout:hover {
            background: #7ab32f;
        }

        .total {
            text-align: right;
            margin: 20px 0;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="cart-container">
        <h1 class="cart-header">THÔNG TIN GIỎ HÀNG CỦA BẠN</h1>

        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $ma_mon => $item):
                    $subtotal = $item['don_gia'] * $item['quantity'];
                    $total += $subtotal;
                    ?>
                    <tr>
                        <td>
                            <img src="images/mon_an/<?php echo $item['hinh']; ?>" alt="<?php echo $item['ten_mon']; ?>">
                            <?php echo $item['ten_mon']; ?>
                        </td>
                        <td><?php echo number_format($item['don_gia'], 0, ',', '.'); ?>đ</td>
                        <td>
                            <input type="number" class="quantity-input" value="<?php echo $item['quantity']; ?>" min="1"
                                max="99">
                        </td>
                        <td><?php echo number_format($subtotal, 0, ',', '.'); ?>đ</td>
                        <td>
                            <a href="?remove=<?php echo $ma_mon; ?>" style="color: #ff4444;">×</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div>
            <a href="?clear=1" class="clear-cart"
                onclick="return confirm('Bạn có chắc muốn xóa tất cả món ăn khỏi giỏ hàng?')">Clear Cart</a>
            <div class="total">
                Total: <?php echo number_format($total, 0, ',', '.'); ?>đ
            </div>
            <a href="Checkout.php" class="checkout">Checkout</a>
        </div>
    </div>
</body>

</html>