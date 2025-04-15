<?php
include_once 'includes/header.php';
include_once 'includes/functions.php';
$listHoa = readListHoa("data/hoa.txt");
?>
<div class="container">
    <?php
    if (isset($_GET['loai'])) {
        $loaiHoa = $_GET['loai'];
        echo "<h2 class='section-title'>Danh Sách {$loaiHoa}</h2>";
        Hoa::ShowByLoai($listHoa, $loaiHoa);
    } else {
        echo "<h2 class='section-title'>Tất Cả Sản Phẩm Hoa</h2>";
        Hoa::ShowALL($listHoa);
        echo "<h2 class='section-title mt-5'>Hoa Tiêu Biểu</h2>";
        Hoa::ShowTieuBieu($listHoa);
    }
    ?>


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

</html>