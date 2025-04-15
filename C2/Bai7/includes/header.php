<?php
session_start();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cửa Hàng Hoa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            background-color: rgb(124, 27, 7);
            color: white;
            padding: 20px 0;
            margin-bottom: 30px;
        }

        .navbar-nav .nav-link {
            padding: 10px 20px;
            transition: all 0.3s;
            color: white;
        }

        .navbar-nav .nav-link:hover {
            background-color: rgba(174, 123, 13, 0.1);
            border-radius: 5px;
        }

        .cart-icon {
            position: relative;
            display: inline-block;
        }

        .cart-badge {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: red;
            color: white;
            font-size: 12px;
            font-weight: bold;
            border-radius: 50%;
            padding: 3px 7px;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <a class="nav-link" href="index.php">
                        <h1 class="fw-bold">Flower Shop</h1>
                    </a>

                </div>
                <div class="col-md-8">
                    <nav class="navbar navbar-expand-lg navbar-dark">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav me-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.php">Trang chủ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="all_hoa.php">Tất Cả Hoa</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="hoa_tieu_bieu.php">Hoa Tiêu Biểu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="danh_sach_hoa.php?loai=Hoa Cưới">Hoa Cưới</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="danh_sach_hoa.php?loai=Hoa Cúc">Hoa Cúc</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</body>

</html>