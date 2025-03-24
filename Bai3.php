<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
$chieudai = (float) $_POST["fl_chieudai"];
$chieurong = (float) $_POST["fl_chieurong"];
$dientich = $chieudai * $chieurong;
?>

<body>
    <form name="f1" method="post" action="Bai3.php">
        <table width="300" border="1" cellspacing="0" align="center" bgcolor="#e0de96">
            <tr align="center">
                <td colspan="2" bgcolor="e77f1c">TÍNH DIỆN TÍCH HÌNH CHỮ NHẬT</td>
            </tr>
            <tr>
                <td>Nhập chiều dài</td>
                <td><input name="fl_chieudai" type="number" value="<?php echo $chieudai ?>" /></td>
            </tr>
            <tr>
                <td>Nhập chiều rộng</td>
                <td><input name="fl_chieurong" type="number" value="<?php echo $chieurong ?>" /></td>
            </tr>
            <tr>
                <td>Diện tích</td>
                <td><input type="number" value="<?php echo $dientich ?>"></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input name="submit" type="submit" value="Tính"></td>
            </tr>
        </table>
    </form>
</body>

</html>