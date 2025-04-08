<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
$string = $_POST["txt_string"];
$substring = $_POST["txt_substring"];
$index = strpos($string, $substring);
?>

<body>
    <form name="f1" method="post" action="Bai5.php">
        <table width="400" cellspacing="5" align="center" bgcolor="#eddda4">
            <tr>
                <td colspan="2" align="center" bgcolor="#eb6b34" height="25">TÌM TỪ TRONG CHUỖI</td>
            </tr>
            <tr rowspan="2">
                <td>Nhập chuỗi</td>
                <td><input name="txt_string" size="35" type="text" value="<?php echo $string ?>" /></td>
            </tr>
            <tr>
                <td>Nhập từ</td>
                <td><input name="txt_substring" size="35" type="text" value="<?php echo $substring ?>" /></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input name="submit" type="submit" value="TÌM KIẾM"></td>
            </tr>
            <tr>
                <td colspan="2"><input size="55" type="text"
                        value="<?php echo 'Tìm thấy từ ' . $substring . ' trong chuỗi tại vị trí ' . $index; ?>" />
                </td>
            </tr>
        </table>
    </form>
</body>

</html>