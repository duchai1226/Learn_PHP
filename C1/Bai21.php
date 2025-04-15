<?php
$noti = "";
$feedback = "";
$name = "";
$phone = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["data"], $_POST["name"], $_POST["phone"])) {
    $feedback = $_POST["data"];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $noti = "";
    if (!empty($feedback) && !empty($name) && !empty($phone)) {
        $file = "feedback.json";
        $data = [];
        if (file_exists($file)) {
            $data = json_decode(file_get_contents($file));
        }
        $data[] = [
            "Name" => $name,
            "PhoneNumber" => $phone,
            "Feedback" => $feedback
        ];

        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));

        $noti = "Ghi dữ liệu thành công!";
    } else {
        $noti = "Vui lòng nhập đầy đủ!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .submit-button {
            width: 150px;
            height: 30px;
            background-color: dodgerblue;
            color: white;
        }
    </style>
</head>

<body>
    <font color="blue" font="">
        <h1 align="center">THU THẬP THÔNG TIN NGƯỜI DÙNG</h1>
    </font>
    <form action="Bai21.php" method="post">
        <table align="center">
            <tr>
                <td><input type="text" name="name" value="<?php echo $name; ?>" style="width:380px; height: 30px"
                        placeholder="Your name or Email"></td>
            </tr>
            <tr>
                <td><input type="text" name="phone" value="<?php echo $phone; ?>" style="width:380px; height: 30px"
                        placeholder="Phone number"></td>
            </tr>
            <tr>
                <td>
                    <textarea name="data" rows="4" cols="50"></textarea>
                </td>
            </tr>
            <tr colspan="1">
                <td align="center"><?php echo $noti; ?></td>
            </tr>
            <tr>
                <td align="center">
                    <input class="submit-button" type="submit" value="Write to JSON">
                </td>
            </tr>
        </table>

    </form>
</body>

</html>