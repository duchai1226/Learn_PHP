<?php
$dbname = "ql_nha_hang";
$driver = "mysql:host=localhost;dbname=$dbname";
$username = "root";
$password = "";

try {
    $pdo = new PDO($driver, $username, $password);

    // Số món ăn trên mỗi trang
    $items_per_page = 3;

    // Lấy trang hiện tại
    $current_page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

    // Tính offset
    $offset = ($current_page - 1) * $items_per_page;

    // Lấy tổng số món ăn
    $total_stmt = $pdo->query("SELECT COUNT(*) FROM mon_an");
    $total_items = $total_stmt->fetchColumn();

    // Tính tổng số trang
    $total_pages = ceil($total_items / $items_per_page);

    // Lấy món ăn cho trang hiện tại
    $stmt = $pdo->prepare("SELECT ten_mon, noi_dung_tom_tat, don_gia, hinh FROM mon_an LIMIT ? OFFSET ?");
    $stmt->bindValue(1, $items_per_page, PDO::PARAM_INT);
    $stmt->bindValue(2, $offset, PDO::PARAM_INT);
    $stmt->execute();
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
            max-width: 1200px;
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

        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .pagination a {
            padding: 8px 12px;
            border: 1px solid #ccc;
            text-decoration: none;
            color: #333;
            border-radius: 4px;
        }

        .pagination a:hover {
            background-color: #f0f0f0;
        }

        .pagination .active {
            background-color: #007bff;
            color: white;
            border-color: #007bff;
        }

        .pagination .disabled {
            color: #ccc;
            pointer-events: none;
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
                        <p class="price">Đơn giá: <?php echo number_format($dish['don_gia'], 0, ',', '.'); ?> VND</p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="pagination">
            <?php if ($total_pages > 1): ?>
                <?php if ($current_page > 1): ?>
                    <a href="?page=<?php echo ($current_page - 1); ?>">&laquo; Previous</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="?page=<?php echo $i; ?>" class="<?php echo $i === $current_page ? 'active' : ''; ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>

                <?php if ($current_page < $total_pages): ?>
                    <a href="?page=<?php echo ($current_page + 1); ?>">Next &raquo;</a>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>