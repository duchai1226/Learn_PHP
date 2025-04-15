<?php
abstract class Hinh_Hoc
{
    protected $kichthuoc;

    public function __construct($kichthuoc)
    {
        $this->kichthuoc = $kichthuoc;
    }

    abstract public function tinhDienTich();
    abstract public function tinhChuVi();

    public function hienThikichthuoc()
    {
        return "Kích thước: " . $this->kichthuoc;
    }
}
class H_Vuong extends Hinh_Hoc
{
    public function tinhDienTich()
    {
        return $this->kichthuoc * $this->kichthuoc;
    }

    public function tinhChuVi()
    {
        return 4 * $this->kichthuoc;
    }
}

class H_Tron extends Hinh_Hoc
{
    public function tinhDienTich()
    {
        return pi() * pow($this->kichthuoc, 2);
    }

    public function tinhChuVi()
    {
        return 2 * pi() * $this->kichthuoc;
    }
}
$result = "";
$loaihinh = "";
$kichthuoc = 0;
$hinh = NULL;
$tenhinh = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loaihinh = isset($_POST['loaihinh']) ? $_POST['loaihinh'] : "";
    $kichthuoc = isset($_POST['kichthuoc']) ? floatval($_POST['kichthuoc']) : 0;

    if ($kichthuoc <= 0) {
        $result = "<div class='alert alert-danger'>Kích thước phải lớn hơn 0!</div>";
    } else {
        switch ($loaihinh) {
            case "vuong":
                $hinh = new H_Vuong($kichthuoc);
                $tenhinh = "Hình vuông";
                break;
            case "tron":
                $hinh = new H_Tron($kichthuoc);
                $tenhinh = "Hình tròn";
                break;
            default:
                $result = "<div class='alert alert-danger'>Loại hình không hợp lệ!</div>";
                $hinh = NULL;
                break;
        }
        if ($hinh != NULL) {
            $dienTich = number_format($hinh->tinhDienTich(), 2);
            $chuVi = number_format($hinh->tinhChuVi(), 2);
            $result = "<div class='result-card'>
                <h3>Kết quả tính toán</h3>
                <p><strong>Loại hình:</strong> $tenhinh</p>
                <p><strong>" . $hinh->hienThikichthuoc() . "</strong></p>
                <p><strong>Diện tích:</strong> $dienTich</p>
                <p><strong>Chu vi:</strong> $chuVi</p>
            </div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hình Học - Geometric Shapes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        .shape-card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 260px;
            text-align: center;
        }

        .shape-title {
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 20px;
        }

        .shape {
            margin: 0 auto 20px;
        }

        .square {
            width: 100px;
            height: 100px;
            background-color: #FFA500;
        }

        .circle {
            width: 100px;
            height: 100px;
            background-color: #FF1493;
            border-radius: 50%;
        }

        .triangle {
            width: 0;
            height: 0;
            border-left: 50px solid transparent;
            border-right: 50px solid transparent;
            border-bottom: 100px solid #4CAF50;
            margin: 0 auto;
        }

        .rectangle {
            width: 120px;
            height: 80px;
            background-color: #1E90FF;
        }

        .property {
            margin: 8px 0;
            text-align: left;
            padding-left: 40px;
        }

        .property-value {
            color: #FF0000;
            font-weight: bold;
        }

        .controls {
            margin: 20px auto;
            text-align: center;
            max-width: 600px;
        }

        input,
        select,
        button {
            padding: 8px 12px;
            margin: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <form action="Bai5.php" method="post">
        <div class="controls">
            <h2>Tính Toán Hình Học</h2>
            <div>
                <select name="loaihinh" id="shapeSelector">
                    <option value="vuong">Hình Vuông</option>
                    <option value="tron">Hình Tròn</option>
                </select>
                <div id="inputFields">
                    <input name="kichthuoc" type="number" id="side" placeholder="Cạnh" min="1">
                </div>
                <button onclick="calculate()">Tính</button>
            </div>
        </div>
    </form>

    <div class="container" id="shapesContainer">
        <?php echo $result; ?>
    </div>


</body>

</html>