<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
$string = $_POST["txt_string"] ? trim($_POST["txt_string"]) : null;
$find = $_POST["txt_find"] ? trim($_POST["txt_find"]) : null;
$replace = $_POST["txt_replace"] ? trim(string: $_POST["txt_replace"]) : null;
$result = "";
if (isset($string, $find, $replace) == false) {
    echo '<p align="center">Vui lòng nhập đầy đủ tham số</p>';
} else {
    $result = str_replace($find, $replace, $string);
}
?>

<body>
    <form name="f1" method="post" action="Bai6.php">
        <table width="400" cellspacing="5" align="center" bgcolor="#eddda4">
            <tr>
                <td colspan="2" align="center" bgcolor="#eb6b34" height="25">TÌM TỪ TRONG CHUỖI</td>
            </tr>
            <tr rowspan="2">
                <td>Nhập chuỗi</td>
                <td><input name="txt_string" size="35" type="text" value="<?php echo $string ?>" /></td>
            </tr>
            <tr>
                <td>Nhập chuỗi gốc</td>
                <td><input name="txt_find" size="35" type="text" value="<?php echo $find ?>" /></td>
            </tr>
            <tr>
                <td>Nhập chuỗi thay thế</td>
                <td><input name="txt_replace" size="35" type="text" value="<?php echo $replace ?>" /></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input name="submit" type="submit" value="THAY THẾ"></td>
            </tr>
            <tr>
                <td colspan="2"><input size="55" style="color:red;" type="text" value="<?php echo $result; ?>" />
                </td>
            </tr>
        </table>
    </form>
</body>

</html>