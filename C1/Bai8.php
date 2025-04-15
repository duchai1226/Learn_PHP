<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <style>
        .menu-container {
            width: 300px;
            margin: 20px auto;
            border: 2px solid #000;
            border-radius: 10px;
            background-color: #e6f3ff;
            padding: 15px;
            font-family: Arial, sans-serif;
        }

        .menu-title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #000;
        }

        .menu-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .menu-item span {
            font-size: 16px;
        }

        .menu-item .price {
            font-weight: bold;
        }

        .divider {
            border: none;
            border-top: 1px dashed #000;
            margin: 5px 0;
        }

        .calculate-button {
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        .calculate-button:hover {
            background-color: #0056b3;
        }

        .result {
            text-align: center;
            margin-top: 15px;
            font-size: 16px;
            color: #333;
        }
    </style>
</head>
<?php
$have_money = (float) $_POST["txt_sotien"];
$result = "Món bạn có thể chọn là ";
switch ($have_money) {
    case $have_money >= 12000:
        $result = $result . "cà phê sữa";
        break;
    case $have_money >= 10000:
        $result = $result . "cà phê đen";
        break;
    case $have_money >= 8000:
        $result = $result . "sữa đậu";
        break;
    case $have_money >= 2000:
        $result = $result . "trà đá";
        break;
    default:
        $result = "Bạn quá nghèo để gọi món";
        break;
}
?>

<body>
    <div class="menu-container">
        <div class="menu-title">MENU</div>
        <div class="menu-item">
            <span>Cà phê sữa</span>
            <span class="price">12.000đ</span>
        </div>
        <hr class="divider">
        <div class="menu-item">
            <span>Cà phê đen</span>
            <span class="price">10.000đ</span>
        </div>
        <hr class="divider">
        <div class="menu-item">
            <span>Sữa đậu</span>
            <span class="price">8.000đ</span>
        </div>
        <hr class="divider">
        <div class="menu-item">
            <span>Trà đá</span>
            <span class="price">2.000đ</span>
        </div>
    </div>
    <form action="Bai8.php" method="post">
        <table weight="200" align="center">
            <tr>
                <td>Số tiền đang có:</td>
                <td><input name="txt_sotien" style="height: 25px;" type="text" size="30"
                        value="<?php echo $have_money; ?>"></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input class="calculate-button" type="submit" value="Tính toán"></td>
            </tr>
        </table>
    </form>
    <div class="result" id="result">
        <?php echo $result; ?>
    </div>
</body>

</html>