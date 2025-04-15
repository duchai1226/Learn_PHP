<?php
include 'xl_Tap_tin.php';
include 'xl_Mang.php';
include 'xl_Tintuc.php';

$duongDanFile = "Tin_tuc.txt";
$noiDungFile = readNews($duongDanFile);

if (strpos($noiDungFile, "Không tìm thấy") !== false) {
    $noiDungFile = "Chính phủ điện tử hướng tới Chính phủ số|Chính phủ điện tử giúp nâng cao hiệu quả công việc.|images/chinh-phu-dien-tu.jpg|https://example.com/chinh-phu*AI thay đổi cuộc sống|Trí tuệ nhân tạo đang làm thay đổi thế giới.|images/ai-tech.jpg|https://example.com/ai*Blockchain 2023|Blockchain không chỉ giới hạn trong tiền điện tử.|images/blockchain.jpg|https://example.com/blockchain";
}

$mangTinTuc = Tach_chuoi_thanh_mang("*", $noiDungFile);

$arrNews = [];
foreach ($mangTinTuc as $News) {
    if (!empty($News)) {
        $chiTietTin = Tach_chuoi_thanh_mang("|", $News);
        if (count($chiTietTin) >= 4) {
            $arrNews[] = new Tin_tuc($chiTietTin[0], $chiTietTin[1], $chiTietTin[2], $chiTietTin[3]);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Tin Tức</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-weight: 600;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .header {
            background-color: #003366;
            color: white;
            padding: 20px 0;
            margin-bottom: 30px;
        }

        .footer {
            background-color: #003366;
            color: white;
            padding: 20px 0;
            margin-top: 50px;
        }

        body {
            background-color: #f8f9fa;
            padding-bottom: 0;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1>TIN TỨC CÔNG NGHỆ</h1>
                <nav>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link text-white" href="#">Trang chủ</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Tin mới</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="#">Liên hệ</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="mb-4">
            <h2 class="text-center position-relative mb-4">
                <span class="bg-primary text-white px-4 py-2 rounded-pill">TIN NỔI BẬT</span>
            </h2>
        </div>

        <!-- Tin tức -->
        <div class="row">
            <?php
            // Hiển thị các tin tức
            if (count($arrNews) > 0) {
                foreach ($arrNews as $News) {
                    $News->hienThi();
                }
            } else {
                echo '<div class="col-12 text-center py-5">';
                echo '<div class="alert alert-info">Không có tin tức nào để hiển thị</div>';
                echo '</div>';
            }
            ?>
        </div>

    </div>

    <!-- Footer -->
    <div class="footer mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4>Trang Tin Tức Công Nghệ</h4>
                    <p>Cập nhật những tin tức mới nhất về công nghệ, khoa học và đời sống số.</p>
                </div>
                <div class="col-md-3">
                    <h5>Liên hệ</h5>
                    <address class="text-white">
                        <p>Email: info@tintuc.vn</p>
                        <p>Điện thoại: (84) 123 456 789</p>
                    </address>
                </div>
            </div>
            <hr class="bg-white">
            <p class="text-center mb-0">© 2025 Trang Tin Tức Công Nghệ. All rights reserved.</p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>