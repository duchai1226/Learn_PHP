<?php
// hoa_tieu_bieu.php - Trang hiển thị hoa tiêu biểu
include_once 'includes/header.php';
include_once 'includes/functions.php';

$listHoa = readListHoa("data/hoa.txt");
?>
<!-- Banner riêng cho trang Hoa Tiêu Biểu -->
<div class="banner" style="background: url('data/assets/images/banner-hoa.jpg') center/cover no-repeat;">
    <div class="container" style="position: relative; z-index: 1; color: white; text-align: center; padding: 60px 0;">
        <h1 class="display-4">Hoa Tiêu Biểu</h1>
        <p class="lead">Những sản phẩm hoa được khách hàng yêu thích nhất</p>
    </div>
</div>
<div class="container">
    <h2 class="section-title">Sản Phẩm Hoa Tiêu Biểu</h2>
    <p class="mb-4">Dưới đây là những sản phẩm hoa tiêu biểu của cửa hàng chúng tôi.</p>
    <?php
    Hoa::ShowTieuBieu($listHoa);
    ?>
    <div class="mt-5">
        <h3>Vì sao nên chọn Hoa Tiêu Biểu?</h3>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Chất Lượng Đảm Bảo</h5>
                        <p class="card-text">Hoa tiêu biểu được chọn lọc từ các nguồn cung cấp uy tín, đảm bảo độ tươi
                            và thời gian sử dụng lâu dài.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Thiết Kế Độc Đáo</h5>
                        <p class="card-text">Mỗi bó hoa đều được thiết kế bởi các nghệ nhân chuyên nghiệp với nhiều năm
                            kinh nghiệm.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Giao Hàng Nhanh Chóng</h5>
                        <p class="card-text">Cam kết giao hàng nhanh chóng để đảm bảo độ tươi của hoa.</p>
                    </div>
                </div>
            </div>
        </div>
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