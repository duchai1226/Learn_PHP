<?php

$dbname = "ql_nha_hang";
$driver = "mysql:host=localhost;dbname=$dbname";
$username = "root";
$password = "";

try {
    $pdo = new PDO($driver, $username, $password);

    // Fetch customer data
    if (isset($_GET['id'])) {
        $stmt = $pdo->prepare("SELECT * FROM khach_hang WHERE ma_khach_hang = ?");
        $stmt->execute([$_GET['id']]);
        $customer = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$customer) {
            header("Location: ShowCustomer.php");
            exit();
        }
    } else {
        header("Location: ShowCustomer.php");
        exit();
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $oldImage = $customer['hinh'];
        $newImage = $oldImage; // Default to old image if no new one uploaded

        // Handle new image upload if provided
        if (!empty($_FILES["hinh"]["name"])) {
            $targetDir = "../images/khach_hang/";
            $fileName = basename($_FILES["hinh"]["name"]);
            $targetFilePath = $targetDir . $fileName;

            if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $targetFilePath)) {
                $newImage = $fileName;
                // Delete old image if exists
                if ($oldImage && file_exists($targetDir . $oldImage)) {
                    unlink($targetDir . $oldImage);
                }
            } else {
                $message = "Lỗi khi tải lên hình ảnh mới!";
                $messageType = "error";
            }
        }

        // Update customer data
        $stmt = $pdo->prepare("UPDATE khach_hang SET 
            ten_khach_hang = ?, 
            email = ?, 
            dia_chi = ?, 
            dien_thoai = ?, 
            hinh = ?, 
            ghi_chu = ? 
            WHERE ma_khach_hang = ?");

        $result = $stmt->execute([
            $_POST['ten_khach_hang'],
            $_POST['email'],
            $_POST['dia_chi'],
            $_POST['dien_thoai'],
            $newImage,
            $_POST['ghi_chu'],
            $_GET['id']
        ]);

        if ($result) {
            header("Location: ShowCustomer.php");
            exit();
        } else {
            $message = "Lỗi khi cập nhật thông tin!";
            $messageType = "error";
        }
    }
} catch (PDOException $e) {
    $message = "Lỗi kết nối: " . $e->getMessage();
    $messageType = "error";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập Nhật Khách Hàng</title>
    <!-- Copy CSS from CreatCustomer.php -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #0066cc;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
        }

        .search-box {
            display: flex;
            gap: 10px;
        }

        .search-box input {
            padding: 5px;
            border: none;
            border-radius: 3px;
        }

        .container {
            display: flex;
            margin: 20px auto;
            gap: 30px;
            max-width: 1200px;
            padding: 0 20px;
        }

        .image-section {
            flex: 0 0 300px;
        }

        .image-section img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-section {
            flex: 1;
            max-width: 600px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 25px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            max-width: 400px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
        }

        .form-group input[type="file"] {
            width: auto;
        }

        .buttons {
            margin-top: 20px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-create {
            background-color: #007bff;
            color: white;
        }

        .btn-show {
            background-color: #6c757d;
            color: white;
        }

        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="nav-links">
            <a href="#">🏠</a>
            <a href="#">Khách Hàng</a>
            <a href="#">Loại món ăn</a>
            <a href="#">Món ăn</a>
            <a href="#">Đăng ký</a>
            <a href="#">Đăng Nhập</a>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Search">
            <button>Search</button>
        </div>
    </div>

    <div class="container">
        <div class="image-section">
            <img src="../images/customer-service.jpg" alt="Customer Service" style="max-width: 100%;">
        </div>

        <div class="form-section">
            <h2>TRANG CẬP NHẬT KHÁCH HÀNG</h2>

            <?php if (isset($message)): ?>
                <div class="message <?php echo $messageType; ?>">
                    <?php echo $message; ?>
                </div>
            <?php endif; ?>

            <form id="customerForm" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <div class="form-group">
                    <label>Tên khách hàng</label>
                    <input type="text" name="ten_khach_hang" id="ten_khach_hang"
                        value="<?php echo htmlspecialchars($customer['ten_khach_hang']); ?>">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" id="email"
                        value="<?php echo htmlspecialchars($customer['email']); ?>">
                </div>

                <div class="form-group">
                    <label>Địa chỉ</label>
                    <input type="text" name="dia_chi" id="dia_chi"
                        value="<?php echo htmlspecialchars($customer['dia_chi']); ?>">
                </div>

                <div class="form-group">
                    <label>Điện thoại</label>
                    <input type="text" name="dien_thoai" id="dien_thoai"
                        value="<?php echo htmlspecialchars($customer['dien_thoai']); ?>">
                </div>

                <div class="form-group">
                    <label>Hình hiện tại</label>
                    <?php if ($customer['hinh']): ?>
                        <img src="../images/khach_hang/<?php echo htmlspecialchars($customer['hinh']); ?>"
                            alt="Current Image"
                            style="width: 100px; height: 100px; object-fit: cover; display: block; margin: 10px 0;">
                    <?php endif; ?>
                    <label>Chọn hình mới (nếu muốn thay đổi)</label>
                    <input type="file" name="hinh" id="hinh">
                </div>

                <div class="form-group">
                    <label>Ghi chú</label>
                    <textarea name="ghi_chu" id="ghi_chu"
                        rows="4"><?php echo htmlspecialchars($customer['ghi_chu']); ?></textarea>
                </div>

                <div class="buttons">
                    <button type="submit" class="btn btn-create">Update</button>
                    <a href="ShowCustomer.php" class="btn btn-show">Show Customer</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            const ten_khach_hang = document.getElementById('ten_khach_hang').value;
            const email = document.getElementById('email').value;
            const dia_chi = document.getElementById('dia_chi').value;
            const dien_thoai = document.getElementById('dien_thoai').value;

            if (!ten_khach_hang) {
                alert('Vui lòng nhập tên khách hàng');
                return false;
            }

            if (!email) {
                alert('Vui lòng nhập email');
                return false;
            }

            if (!validateEmail(email)) {
                alert('Email không hợp lệ');
                return false;
            }

            if (!dia_chi) {
                alert('Vui lòng nhập địa chỉ');
                return false;
            }

            if (!dien_thoai) {
                alert('Vui lòng nhập số điện thoại');
                return false;
            }

            if (!validatePhone(dien_thoai)) {
                alert('Số điện thoại không hợp lệ');
                return false;
            }

            return true;
        }

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function validatePhone(phone) {
            const re = /^[0-9]{10,11}$/;
            return re.test(phone);
        }
    </script>
</body>

</html>