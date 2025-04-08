<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
$string = isset($_POST["txt_string"]);
$substring = isset($_POST["txt_substring"]);
$result = strcasecmp($string, $substring);
$noti = "";
if ($result == 0) {
    $noti = "Chuỗi 1 bằng chuỗi 2";
} elseif ($result < 0) {
    $noti = "Chuỗi 1 nhỏ nhơn chuỗi 2";
} else {
    $noti = "Chuỗi 1 lớn hơn chuỗi 2";
}
?>

<body>
    <form name="f1" method="post" action="Bai7.php">
        <table width="400" cellspacing="5" align="center" bgcolor="#eddda4">
            <tr>
                <td colspan="2" align="center" bgcolor="#eb6b34" height="25">SO SÁNH CHUỖI</td>
            </tr>
            <tr rowspan="2">
                <td>Chuỗi 1</td>
                <td><input name="txt_string" size="35" type="text" value="<?php echo $string ?>" /></td>
            </tr>
            <tr>
                <td>Chuỗi 2</td>
                <td><input name="txt_substring" size="35" type="text" value="<?php echo $substring ?>" /></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input name="submit" type="submit" value="SO SÁNH"></td>
            </tr>
            <tr>
                <td colspan="2"><input size="55" style="color:red;" type="text" value="<?php echo $noti; ?>" />
                </td>
            </tr>
        </table>
    </form>
</body>

</html>