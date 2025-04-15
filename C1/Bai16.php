<?php
if (isset($_POST["oK"])) {
    if ($_FILES["file"]["name"] != NULL) {
        if (
            $_FILES["file"]["type"] == "image/jpg"
            || $_FILES["file"]["type"] == "image/png"
            || $_FILES["file"]["type"] == "image/gif"
            || $_FILES["file"]["type"] == "image/jpeg"
        ) {
            if ($_FILES["file"]["size"] > 1048576) {
                echo "File không được lớn hơn 1MB";
            } else {
                $path = "F:\App\\xampp\htdocs\\2033221988_VuBaNhatKhang\data\\";
                $tmp_name = $_FILES["file"]["tmp_name"];
                $name = $_FILES["file"]["name"];
                $type = $_FILES["file"]["type"];
                $size = $_FILES["file"]["size"];
                move_uploaded_file($tmp_name, $path . $name);
                echo "File uploaded! <br>";
                echo "Tên file : " . $name . "<br>";
                echo "Kiểu file : " . $type . "<br>";
                echo "File size : " . $size . "<br>";
            }
        } else {
            echo "Kiểu file không hợp lệ! ";
        }
    } else {
        echo "Vui lòng chọn File";
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
    <form name="f1" action="Bai16.php" method="post" enctype="multipart/form-data">
        Select File: <input type="file" name="file" size="20"> <br>
        <input type="submit" value="Upload" name="oK">
    </form>
</body>

</html>