<?php
include_once 'includes/header.php';
?>

<div class="container mt-5">
    <!-- Hero Section với hiệu ứng shadow và gradient -->
    <div class="jumbotron bg-light p-5 shadow-lg rounded"
        style="background: linear-gradient(to right, rgba(255,255,255,0.9), rgba(255,255,255,0.8));">
        <div class="row align-items-center">
            <div class="col-lg-8 text-center text-lg-start">
                <h1 class="display-4 fw-bold" style="color:rgb(135, 8, 93);">
                    <span class="text-primary"></span> Welcome <span class="text-primary"></span>
                </h1>
                <p class="lead text-secondary my-4" style="font-size: 1.3rem;">
                    Nơi mang đến cho bạn những bông hoa đẹp nhất, tươi mới nhất mỗi ngày!
                </p>
                <hr class="my-4 text-primary" style="opacity: 0.5; height: 2px;">
                <p class="text-muted fs-5 mb-4">Khám phá ngay những loài hoa đẹp nhất của chúng tôi.</p>
                <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start">
                    <a class="btn btn-primary btn-lg shadow-sm" href="hoa_tieu_bieu.php" role="button">
                        <i class="bi bi-star-fill me-2"></i>Xem Hoa Tiêu Biểu
                    </a>
                    <a class="btn btn-success btn-lg shadow-sm" href="danh_sach_hoa.php" role="button">
                        <i class="bi bi-cart-fill me-2"></i>Xem Danh Sách Hoa
                    </a>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block">
                <div class="text-center p-4">
                    <img src="https://images.unsplash.com/photo-1530092285049-1c42085fd395?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        class="img-fluid  shadow" alt="Hoa" </div>
                </div>
            </div>
        </div>

        <!-- Phần giới thiệu ngắn -->
        <div class="row mt-5 g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <div class="card-body text-center p-4">
                        <div class="display-5 mb-3 text-primary"></div>
                        <h3 class="card-title h4 mb-3">Hoa Tươi Mỗi Ngày</h3>
                        <p class="card-text">Chúng tôi cam kết cung cấp những bông hoa tươi nhất, được chọn lọc mỗi
                            ngày.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <div class="card-body text-center p-4">
                        <div class="display-5 mb-3 text-success"></div>
                        <h3 class="card-title h4 mb-3">Giao Hàng Nhanh Chóng</h3>
                        <p class="card-text">Dịch vụ giao hàng trong ngày đảm bảo hoa đến tay bạn trong tình trạng tốt
                            nhất.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm hover-card">
                    <div class="card-body text-center p-4">
                        <div class="display-5 mb-3 text-danger"></div>
                        <h3 class="card-title h4 mb-3">Thiết Kế Độc Đáo</h3>
                        <p class="card-text">Đội ngũ thiết kế giàu kinh nghiệm sẽ tạo ra những bó hoa tuyệt đẹp cho mọi
                            dịp.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>
        .hover-card:hover {
            transform: translateY(-5px);
            transition: transform 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        @media (max-width: 768px) {
            .jumbotron {
                text-align: center;
            }
        }
    </style>

    <br>
    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h4>Cửa Hàng Hoa</h4>
                    <p>Chuyên cung cấp các loại hoa tươi, hoa cưới, hoa sinh nhật với chất lượng tốt nhất.</p>
                </div>
                <div class="col-md-4">
                    <h4>Liên hệ</h4>
                    <p>Địa chỉ: 123 Đường Hoa, Quận 1, TP.HCM</p>
                    <p>Điện thoại: (84) 123 456 789</p>
                    <p>Email: info@hoatuoi.com</p>
                </div>
                <div class="col-md-4">
                    <h4>Giờ làm việc</h4>
                    <p>Thứ Hai - Chủ Nhật: 7:00 AM - 9:00 PM</p>
                </div>
            </div>
            <hr class="bg-light">
            <p class="text-center mb-0">© 2025 Cửa Hàng Hoa. All rights reserved.</p>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    </body>