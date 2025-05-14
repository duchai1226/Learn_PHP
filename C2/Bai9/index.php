<?php
require_once 'Schedule.php';
// Tạo đối tượng Schedule và đọc dữ liệu từ file XML
$schedule = new Schedule('schedule.xml');
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thời Khóa Biểu Giảng Viên</title>
    <link rel="stylesheet" href="styles/style.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;600&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body>
    <div class="page-wrapper">
        <header class="header">
            <div class="logo">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <h1>THỜI KHÓA BIỂU GIẢNG VIÊN</h1>
        </header>

        <main class="main-content">
            <div class="teacher-info">
                <div class="avatar">
                    <i class="fas fa-user-tie"></i>
                </div>
                <div class="info">
                    <h2>Giảng viên: Vũ Bá Nhật Khang</h2>
                    <p>Khoa Công nghệ thông tin</p>
                </div>
            </div>

            <div class="schedule-container">
                <div class="schedule-header">
                    <i class="fas fa-calendar-alt"></i>
                    <h3>Lịch giảng dạy tuần</h3>
                </div>
                <div class="table-responsive">
                    <?php echo $schedule->load(); ?>
                </div>
            </div>

            <div class="note-section">
                <h4><i class="fas fa-sticky-note"></i> Ghi chú</h4>
                <ul>
                    <li>Giảng viên vui lòng có mặt trước giờ học 15 phút</li>
                    <li>Liên hệ phòng đào tạo khi có sự thay đổi về lịch giảng dạy</li>
                </ul>
            </div>
        </main>

        <footer class="footer">
            <p>&copy; <?php echo date('Y'); ?> Trường Đại học HUIT. Tất cả quyền được bảo lưu.</p>
        </footer>
    </div>
</body>

</html>