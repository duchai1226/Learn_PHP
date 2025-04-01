<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["data"],$_POST["name"],$_POST["phone"])) {
        $data = $_POST["data"];
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        if(!empty($data) && !empty($name) && !empty($phone)){
            $content="Tên: ".$name."\n"."Số điện thoại: ".$phone."\n"."Content: ".$data."\n\n";
            $f=fopen("Data14.txt","a");
            fwrite($f,$content);
            fclose($f);
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
            width: 100px;
            height: 30px;
            background-color: dodgerblue;
            color: white;
        }
    </style>
</head>
<body>
    <font color="blue" font=""><h1 align="center">THU THẬP THÔNG TIN NGƯỜI DÙNG</h1></font>
    <form action="Bai14b.php" method="post">
        <table align="center">
            <tr>
                <td><input type="text" name="name" value="" style="width:380px; height: 30px" placeholder="Your name or Email"></td>
            </tr>
            <tr>
                <td><input type="text" name="phone" value="" style="width:380px; height: 30px" placeholder="Phone number"></td>
            </tr>
            <tr>
                <td>
                    <textarea name="data" rows="4" cols="50" ></textarea>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <input class="submit-button" type="submit" value="Ghi vào file" >
                </td>
            </tr>
        </table>
            
    </form>
</body>
</html>