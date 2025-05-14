<?php
$dbname = "ql_nha_hang";
$driver = "mysql:host=localhost;dbname=$dbname";
$username = "root";
$password = "";

try {
    $pdo = new PDO($driver, $username, $password);
    $stmt = $pdo->query("SELECT ten_mon, noi_dung_tom_tat, don_gia, hinh FROM mon_an");
    $dishes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách món ăn</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: red;
            text-align: center;
            margin-bottom: 30px;
        }

        .menu-container {
            max-width: 800px;
            margin: 0 auto;
        }

        .menu-item {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding: 15px;
            display: flex;
            gap: 20px;
        }

        .menu-item img {
            width: 200px;
            height: 150px;
            object-fit: cover;
        }

        .menu-info {
            flex: 1;
        }

        .menu-info h2 {
            color: #000;
            margin: 0 0 10px 0;
        }

        .menu-info p {
            color: #666;
            margin: 0 0 10px 0;
            line-height: 1.5;
        }

        .price {
            font-weight: bold;
            color: #000;
        }
    </style>
</head>

<body>
    <div class="menu-container">
        <h1>DANH SÁCH MÓN ĂN</h1>

        <?php foreach ($dishes as $dish): ?>
            <div class="menu-item">
                <img src="images/mon_an/<?php echo $dish['hinh']; ?>" alt="<?php echo $dish['ten_mon']; ?>">
                <div class="menu-info">
                    <h2><?php echo $dish['ten_mon']; ?></h2>
                    <p><?php echo $dish['noi_dung_tom_tat']; ?></p>
                    <p class="price">Đơn giá: <?php echo number_format($dish['don_gia'], 0, ',', '.'); ?> VND</p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>