<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
$hoten = $_POST["txt_Name"];
?>

<body>
    <form name="f1" method="post" action="Bai2.php">
        <table width="300" border="1" cellspacing="0" align="center" bgcolor="FFCCFF">
            <tr align="center">
                <td colspan="2" bgcolor="FF66CC">IN LỜI CHÀO</td>
            </tr>
            <tr>
                <td>Nhập họ tên</td>
                <td><input name="txt_Name" type="text" value="<?php echo $hoten ?>" /></td>
            </tr>
            <tr align="center">
                <td colspan="2"><?php echo "Xin chào bạn: " . $hoten ?></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input name="submit" type="submit" value="CHÀO"></td>
            </tr>
        </table>
    </form>
</body>

</html>