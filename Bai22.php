<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;
        $_SESSION['username'] = $username;
        $_SESSION['code'] = $password;

        $success = true;
        $noti = "Đăng nhập thành công!";
    } else {
        $noti = "Vui lòng nhập đủ thông tin!";
    }


}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Đăng Nhập</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .login-container {
            max-width: 400px;
            margin: 0 auto;
            border: 1px solid #000;
            background-color: white;
        }

        .login-header {
            background-color: #4B0082;
            color: white;
            padding: 10px;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
        }

        .login-form {
            padding: 10px;
            background-color: #E0FFFF;
        }

        .form-group {
            display: flex;
            margin-bottom: 10px;
            align-items: center;
        }

        .form-label {
            width: 100px;
            text-align: left;
        }

        .form-input {
            flex: 1;
            padding: 5px;
            border: 1px solid #ccc;
        }

        .login-button {
            text-align: center;
            margin-top: 10px;
        }

        .login-button button {
            padding: 5px 10px;
            cursor: pointer;
        }

        .welcome-message {
            background-color: #7FFFD4;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            THÔNG TIN ĐĂNG NHẬP
        </div>
        <form method="post" action="Bai22.php" class="login-form">
            <div class="form-group">
                <div class="form-label">Họ và tên</div>
                <input type="text" name="fullname" class="form-input" value="">
            </div>
            <div class="form-group">
                <div class="form-label">Email</div>
                <input type="email" name="email" class="form-input" value="">
            </div>
            <div class="form-group">
                <div class="form-label">Tên ĐN</div>
                <input type="text" name="username" class="form-input" value="">
            </div>
            <div class="form-group">
                <div class="form-label">Password</div>
                <input type="password" name="password" class="form-input" value="">
            </div>
            <div>
                <p align="center"><?php echo $noti; ?></p>
            </div>
            <div class="login-button">
                <button type="submit">ĐĂNG NHẬP</button>
            </div>
        </form>
        <?php if (isset($success)): ?>
            <div class="welcome-message">
                <div>Xin Chào <?php echo htmlspecialchars($_SESSION['fullname']); ?></div>
                <div>Email: <?php echo htmlspecialchars($_SESSION['email']); ?></div>
                <div>Tên Đăng Nhập: <?php echo htmlspecialchars($_SESSION['username']); ?></div>
                <div>Mật Khẩu: <?php echo htmlspecialchars($_SESSION['code']); ?></div>
                <div><a href="Bai22_welcome.php" style="color: blue; text-decoration: underline;">Sang trang kế tiếp</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>