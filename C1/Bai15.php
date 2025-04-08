<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["data"])) {
    $inputData = $_POST["data"];
    $f1 = fopen("Data2.txt", "a");
    if ($f1) {
        fwrite($f1, $inputData . "\n");
        fclose($f1);
    } else {
        die("Lỗi khi mở file!");
    }

    $f1 = fopen("Data2.txt", "r");
    $f2 = fopen("Data3.txt", "w");

    if ($f1 && $f2) {
        while (!feof($f1)) {
            $data = fgets($f1);
            if ($data !== false) {
                fwrite($f2, $data);
            }
        }
        fclose($f1);
        fclose($f2);
    } else {
        die("Lỗi khi mở một trong hai file!");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="Bai15.php" method="post">
        <table align="center">
            <tr>
                <td>
                    <textarea name="data" rows="4" cols="50"></textarea>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <input type="submit" value="Ghi vào file Data3.txt" style="width:150px; height:30px">
                </td>
            </tr>
        </table>

    </form>
</body>

</html>