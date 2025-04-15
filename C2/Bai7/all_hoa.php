<?php
include_once 'includes/header.php';
include_once 'includes/xl_Hoa.php';
include_once 'includes/functions.php';

$path = "data/hoa.txt";
if (!file_exists($path)) {
    die("<div class='container text-center mt-5'><p class='alert alert-danger'>Lỗi: Không tìm thấy file dữ liệu hoa!</p></div>");
}

$listHoa = readListHoa($path);
?>

<div class="container mt-5">
    <h2 class="text-center text-primary"> Danh Sách Tất Cả Các Loại Hoa </h2>
    <div class="row">
        <?php if (!empty($listHoa)): ?>
            <?php foreach ($listHoa as $hoa): ?>
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg">
                        <img src="data/assets/images/<?php echo htmlspecialchars($hoa->HinhAnh); ?>" class="card-img-top"
                            alt="<?php echo htmlspecialchars($hoa->TenHoa); ?>">
                        <div class="card-body text-center">
                            <h5 class="card-title text-success"><?php echo htmlspecialchars($hoa->TenHoa); ?></h5>
                            <p class="card-text text-muted"><?php echo htmlspecialchars($hoa->MoTa); ?></p>
                            <p class="card-text fw-bold text-danger">
                                <?php echo number_format($hoa->GiaBan, 0, ',', '.'); ?> VND
                            </p>
                            <a href="#" class="btn btn-outline-success">🛒 Mua Ngay</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center text-danger fw-bold">Không có dữ liệu hoa!</p>
        <?php endif; ?>
    </div>
</div>
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