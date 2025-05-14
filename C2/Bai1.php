<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bài 1</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 500px;
        }

        h1 {
            text-align: center;
            color: blue;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        td {
            padding: 8px;
        }

        input {
            width: 95%;
            padding: 5px;
        }

        .result-field {
            background-color: #00ffff;
        }

        .button-container {
            text-align: center;
            margin-top: -1px;
        }

        button {
            padding: 5px 20px;
            font-size: 16px;
            cursor: pointer;
        }
    </style>
</head>
<?php
class Rectangle
{
    var $width;
    var $length;
    public function __construct($length, $width)
    {
        $this->length = $length;
        $this->width = $width;
    }

    public function findPerimeter()
    {
        $perimeter = ($this->width + $this->length) * 2;
        return $perimeter;
    }

    public function findArea()
    {
        $area = $this->width * $this->length;
        return $area;
    }
}
$area = 0;
$perimeter = 0;
$length = 0;
$width = 0;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['length'], $_POST['width']) && $_POST['length'] != "" && $_POST['width'] != "") {
        $length = $_POST['length'];
        $width = $_POST['width'];
        $hcn = new Rectangle($length, $width);
        $area = $hcn->findArea();
        $perimeter = $hcn->findPerimeter();
    } else {
        echo "Nhập thiếu!";
    }

}
?>

<body>
    <div class="container">
        <h1>HÌNH CHỮ NHẬT</h1>
        <form action="Bai1.php" method="post">
            <table>
                <tr>
                    <td>Chiều dài:</td>
                    <td><input name="length" type="number" id="length" value="<?php echo $length; ?>"></td>
                </tr>
                <tr>
                    <td>Chiều rộng:</td>
                    <td><input name="width" type="number" id="width" value="<?php echo $width; ?>"></td>
                </tr>
                <tr>
                    <td>Chu Vi</td>
                    <td><input type="text" id="perimeter" class="result-field" value="<?php echo $area; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td>Diện Tích</td>
                    <td><input type="text" id="area" class="result-field" value="<?php echo $perimeter; ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="button-container">
                        <button id="calculate">TÍNH</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>