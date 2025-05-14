<?php
$dbname = "ql_nha_hang";
$driver = "mysql:host=localhost;dbname=$dbname";
$username = "root";
$password = "";

try {
    $pdo = new PDO($driver, $username, $password);

    // Lấy danh sách loại món ăn
    $stmt = $pdo->query("SELECT ma_loai, ten_loai, mo_ta FROM loai_mon_an");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Xử lý tìm kiếm
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = "%{$_GET['search']}%";
        $stmt = $pdo->prepare("SELECT * FROM mon_an WHERE ten_mon LIKE ?");
        $stmt->execute([$search]);
        $dishes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Xử lý lọc món ăn
    elseif (isset($_GET['show_all'])) {
        $stmt = $pdo->query("SELECT * FROM mon_an");
        $dishes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } elseif (isset($_GET['ma_loai'])) {
        $stmt = $pdo->prepare("SELECT * FROM mon_an WHERE ma_loai = ?");
        $stmt->execute([$_GET['ma_loai']]);
        $dishes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } elseif (isset($_GET['gia'])) {
        $price_range = $_GET['gia'];
        switch ($price_range) {
            case '1':
                $sql = "SELECT * FROM mon_an WHERE don_gia <= 15000";
                break;
            case '2':
                $sql = "SELECT * FROM mon_an WHERE don_gia BETWEEN 20000 AND 30000";
                break;
            case '3':
                $sql = "SELECT * FROM mon_an WHERE don_gia BETWEEN 31000 AND 50000";
                break;
            case '4':
                $sql = "SELECT * FROM mon_an WHERE don_gia BETWEEN 51000 AND 100000";
                break;
            case '5':
                $sql = "SELECT * FROM mon_an WHERE don_gia > 100000";
                break;
        }
        $stmt = $pdo->query($sql);
        $dishes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Xử lý hiển thị chi tiết món ăn
    if (isset($_GET['detail'])) {
        $stmt = $pdo->prepare("SELECT ten_mon, don_gia, don_gia_khuyen_mai, khuyen_mai,hinh FROM mon_an WHERE ma_mon = ?");
        $stmt->execute([$_GET['detail']]);
        $detail_dish = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <title>Gánh Xưa Restaurant</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }

        .logo {
            flex: 0 0 auto;
        }

        .logo img {
            max-width: 150px;
            height: auto;
        }

        .contact-info {
            flex: 0 0 auto;
            text-align: right;
        }

        .contact-info p {
            margin: 5px 0;
        }

        .navigation {
            background: #8CC63F;
            padding: 10px 0;
        }

        .navigation a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
        }

        .search-box {
            float: right;
            margin-right: 20px;
        }

        .search-box input[type="text"] {
            padding: 5px;
            margin-right: 5px;
            border: 1px solid #ddd;
            border-radius: 3px;
            width: 200px;
        }

        .search-box button {
            padding: 5px 15px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 3px;
            cursor: pointer;
        }

        .search-box button:hover {
            background: #f0f0f0;
        }

        .sidebar {
            width: 200px;
            background: #8CC63F;
            padding: 10px;
            float: left;
        }

        .sidebar-section {
            background: white;
            margin-bottom: 20px;
            padding: 10px;
        }

        .sidebar h3 {
            color: #333;
            margin-top: 0;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 5px 0;
        }

        .sidebar ul li a {
            color: #666;
            text-decoration: none;
        }

        .footer {
            clear: both;
            background: #8CC63F;
            color: white;
            text-align: center;
            padding: 5px;
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 40px;
        }

        .content-area {
            margin-left: 220px;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: calc(100% - 220px);
            margin-bottom: 70px;
        }

        .dish-item {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            text-align: center;
            box-sizing: border-box;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .dish-item a {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .dish-item:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }

        .dish-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 3px;
            margin-bottom: 10px;
        }

        .dish-item h4 {
            margin: 10px 0;
            font-size: 16px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .dish-item p {
            color: #8CC63F;
            font-weight: bold;
            margin: 10px 0 0 0;
        }

        .detail-button {
            position: absolute;
            bottom: 10px;
            right: 10px;
            padding: 5px 10px;
            background: #8CC63F;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .detail-button:hover {
            background: #7ab32f;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .modal-content {
            position: relative;
            background: white;
            width: 80%;
            max-width: 800px;
            margin: 50px auto;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .modal-header {
            color: #8CC63F;
            border-bottom: 2px solid #8CC63F;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .modal-body {
            display: flex;
            gap: 20px;
        }

        .modal-image {
            width: 350px;
            height: 350px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        .modal-info {
            flex: 1;
        }

        .close {
            position: absolute;
            right: 20px;
            top: 10px;
            font-size: 24px;
            cursor: pointer;
        }

        .dish-details {
            margin-bottom: 30px;
        }

        .dish-details h3 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .price,
        .discount-price,
        .promotion {
            color: #8CC63F;
            font-weight: bold;
            font-size: 18px;
        }

        .quantity-form {
            margin-top: 20px;
        }

        .quantity {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .quantity input[type="number"] {
            width: 70px;
            padding: 8px;
            border: 2px solid #8CC63F;
            border-radius: 4px;
            font-size: 16px;
            text-align: center;
        }

        .add-to-cart {
            background: #8CC63F;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .add-to-cart:hover {
            background: #7ab32f;
            transform: translateY(-2px);
        }

        .close a {
            font-size: 28px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .close a:hover {
            color: #7ab32f !important;
            transform: scale(1.1);
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">
            <img src="images/logo.png" alt="Gánh Xưa Logo">
        </div>
        <div class="contact-info">
            <p>Hà Nội: 024.7300.7068 - 093.6647.172</p>
            <p>TP.HCM: 028.7300.7068 - 094.7727.444</p>
        </div>
    </div>

    <div class="navigation">
        <a href="#">Trang Chủ</a>
        <a href="#">Đăng ký</a>
        <a href="#">Đăng Nhập</a>
        <a href="#">Liên hệ</a>
        <div class="search-box">
            <form method="GET" action="" style="display: inline-flex;">
                <input type="text" name="search" placeholder="Tìm món ăn..."
                    value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit">Tìm kiếm</button>
            </form>
        </div>
    </div>

    <div class="sidebar">
        <div class="sidebar-section">
            <h3>LOẠI MÓN</h3>
            <ul>
                <li><a href="?show_all=1">SHOW ALL</a></li>
                <?php foreach ($categories as $category): ?>
                    <li><a href="?ma_loai=<?php echo $category['ma_loai']; ?>" title="<?php echo $category['mo_ta']; ?>">
                            <?php echo $category['ten_loai']; ?>
                        </a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="sidebar-section">
            <h3>CHỌN THEO GIÁ</h3>
            <ul>
                <li><a href="?gia=1">15.000đ trở xuống</a></li>
                <li><a href="?gia=2">20.000đ - 30.000đ</a></li>
                <li><a href="?gia=3">31.000đ - 50.000đ</a></li>
                <li><a href="?gia=4">51.000đ - 100.000đ</a></li>
                <li><a href="?gia=5">Trên 100.000đ</a></li>
            </ul>
        </div>
    </div>

    <div class="content-area">
        <?php if (isset($dishes)): ?>
            <?php foreach ($dishes as $dish): ?>
                <div class="dish-item" style="position: relative;">
                    <img src="images/mon_an/<?php echo $dish['hinh']; ?>" alt="<?php echo $dish['ten_mon']; ?>">
                    <h4><?php echo $dish['ten_mon']; ?></h4>
                    <p>Giá: <?php echo number_format($dish['don_gia'], 0, ',', '.'); ?>đ</p>
                    <a href="?<?php echo http_build_query(array_merge($_GET, ['detail' => $dish['ma_mon']])); ?>"
                        class="detail-button">
                        Chi tiết
                    </a>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Modal for dish details -->
    <div id="detailModal" class="modal" style="display: <?php echo isset($_GET['detail']) ? 'block' : 'none'; ?>">
        <div class="modal-content">
            <span class="close">
                <a href="<?php
                $params = $_GET;
                unset($params['detail']);
                echo '?' . http_build_query($params);
                ?>" style="text-decoration: none; color: #8CC63F;">&times;</a>
            </span>
            <div class="modal-header">
                <h2>THÔNG TIN CHI TIẾT MÓN ĂN</h2>
            </div>
            <?php if (isset($_GET['detail']) && isset($detail_dish)): ?>
                <div class="modal-body">
                    <img class="modal-image" src="images/mon_an/<?php echo $detail_dish['hinh']; ?>"
                        alt="<?php echo $detail_dish['ten_mon']; ?>">
                    <div class="modal-info">
                        <div class="dish-details">
                            <h3><?php echo $detail_dish['ten_mon']; ?></h3>
                            <p>Giá: <span
                                    class="price"><?php echo number_format($detail_dish['don_gia'], 0, ',', '.'); ?>đ</span>
                            </p>
                            <p>Giá KM: <span
                                    class="discount-price"><?php echo number_format($detail_dish['don_gia_khuyen_mai'], 0, ',', '.'); ?>đ</span>
                            </p>
                            <p>Khuyến mãi: <span class="promotion"><?php echo $detail_dish['khuyen_mai']; ?></span></p>
                        </div>
                        <form method="POST" class="quantity-form">
                            <input type="hidden" name="ma_mon" value="<?php echo $_GET['detail']; ?>">
                            <div class="quantity">
                                <label for="quantity">Số lượng:</label>
                                <input type="number" id="quantity" name="quantity" min="1" value="1" max="99">
                                <button type="submit" name="add_to_cart" class="add-to-cart">CHO VÀO GIỎ</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="footer">
        <p>© 2023 Gánh Xưa Restaurant. All rights reserved.</p>
    </div>
</body>

</html>