<?php
$tenChuHo = isset($_POST['tenChuHo']) ? $_POST['tenChuHo'] : '';
$chiSoCu = isset($_POST['chiSoCu']) ? intval($_POST['chiSoCu']) : '';
$chiSoMoi = isset($_POST['chiSoMoi']) ? intval($_POST['chiSoMoi']) : '';
$donGia = isset($_POST['donGia']) ? intval($_POST['donGia']) : 2000;
$soTien = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tinh'])) {
    if ($chiSoMoi > $chiSoCu) {
        $soTien = ($chiSoMoi - $chiSoCu) * $donGia;
    } else {
        $soTien = 0;
        $error = "Chỉ số mới phải lớn hơn chỉ số cũ!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh Toán Tiền Điện</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .thanh-toan {
            width: 400px;
            margin: 0 auto 30px;
            background-color: #FFDEAD;
            border: 1px solid #000;
            padding: 0;
        }

        .thanh-toan-header {
            background-color: #FFD700;
            color: #800000;
            text-align: center;
            font-weight: bold;
            font-size: 18px;
            padding: 10px;
        }

        .form-group {
            display: flex;
            margin: 10px;
            align-items: center;
        }

        .form-label {
            width: 120px;
            text-align: left;
        }

        .form-input {
            flex: 1;
            padding: 5px;
        }

        .form-unit {
            margin-left: 10px;
            width: 50px;
        }

        .tinh-button {
            text-align: center;
            margin: 15px;
        }

        .so-tien {
            background-color: #FFB6C1;
        }
    </style>
</head>

<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="thanh-toan">
            <div class="thanh-toan-header">THANH TOÁN TIỀN ĐIỆN</div>

            <div class="form-group">
                <div class="form-label">Tên chủ hộ:</div>
                <input type="text" name="tenChuHo" class="form-input" value="<?php echo htmlspecialchars($tenChuHo); ?>"
                    required>
            </div>

            <div class="form-group">
                <div class="form-label">Chỉ số cũ:</div>
                <input type="number" name="chiSoCu" class="form-input" value="<?php echo htmlspecialchars($chiSoCu); ?>"
                    required>
                <div class="form-unit">(Kw)</div>
            </div>

            <div class="form-group">
                <div class="form-label">Chỉ số mới:</div>
                <input type="number" name="chiSoMoi" class="form-input"
                    value="<?php echo htmlspecialchars($chiSoMoi); ?>" required>
                <div class="form-unit">(Kw)</div>
            </div>

            <div class="form-group">
                <div class="form-label">Đơn giá:</div>
                <input type="number" name="donGia" class="form-input" value="<?php echo htmlspecialchars($donGia); ?>"
                    required>
                <div class="form-unit">(VNĐ)</div>
            </div>

            <div class="form-group">
                <div class="form-label">Số tiền thanh toán:</div>
                <input type="text" name="soTien" class="form-input so-tien"
                    value="<?php echo number_format($soTien, 0, ',', '.'); ?>" readonly>
                <div class="form-unit">(VNĐ)</div>
            </div>

            <div class="tinh-button">
                <button type="submit" name="tinh">Tính</button>
            </div>

            <?php if (isset($error)): ?>
                <div style="color: red; text-align: center; margin-bottom: 10px;"><?php echo $error; ?></div>
            <?php endif; ?>
        </div>
    </form>