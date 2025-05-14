<?php
$dbname = "ql_nha_hang";
$driver = "mysql:host=localhost;dbname=$dbname";
$username = "root";
$password = "";

try {
    $pdo = new PDO($driver, $username, $password);
    $stmt = $pdo->query("SELECT ma_loai, ten_loai, mo_ta FROM loai_mon_an");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
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
            <input type="text" placeholder="Search...">
            <button>Search</button>
        </div>
    </div>

    <div class="sidebar">
        <div class="sidebar-section">
            <h3>LOẠI MÓN</h3>
            <ul>
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
                <li><a href="#">15.000đ trở xuống</a></li>
                <li><a href="#">20.000đ - 30.000đ</a></li>
                <li><a href="#">31.000đ - 50.000đ</a></li>
                <li><a href="#">51.000đ - 100.000đ</a></li>
                <li><a href="#">Trên 100.000đ</a></li>
            </ul>
        </div>
    </div>

    <div class="footer">
        <p>© 2023 Gánh Xưa Restaurant. All rights reserved.</p>
    </div>
</body>

</html>