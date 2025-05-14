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
            color: blue;
            text-align: center;
            margin-bottom: 30px;
        }

        .menu-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .menu-item {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        .menu-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .menu-info h2 {
            color: #000;
            margin: 10px 0;
            font-size: 18px;
        }

        .menu-info p {
            color: #666;
            margin: 10px 0;
            font-size: 14px;
            line-height: 1.4;
        }

        .price {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="menu-container">
        <h1>DANH SÁCH MÓN ĂN</h1>

        <div class="menu-grid">
            <?php foreach ($dishes as $dish): ?>
                <div class="menu-item">
                    <img src="images/mon_an/<?php echo $dish['hinh']; ?>" alt="<?php echo $dish['ten_mon']; ?>">
                    <div class="menu-info">
                        <h2><?php echo $dish['ten_mon']; ?></h2>
                        <p><?php echo $dish['noi_dung_tom_tat']; ?></p>
                        <p class="price"><?php echo number_format($dish['don_gia'], 0, ',', '.'); ?> VND</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>