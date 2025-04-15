<?php
abstract class Xe
{
    protected $mau;

    abstract function SoBanh();
    abstract function VanToc();
}

class XeDap extends Xe
{
    public function SoBanh()
    {
        return "Số bánh: 2";
    }

    public function VanToc()
    {
        return "Vận tốc: 30 km/h";
    }
}

class XeMay extends Xe
{
    public function SoBanh()
    {
        return "Số bánh: 2";
    }

    public function VanToc()
    {
        return "Vận tốc: 150 km/h";
    }
}

class XeHoi extends Xe
{
    public function SoBanh()
    {
        return "Số bánh: 4";
    }

    public function VanToc()
    {
        return "Vận tốc 299 km/h";
    }
}

class XeXichLo extends Xe
{
    public function SoBanh()
    {
        return "Số bánh: 3";
    }

    public function VanToc()
    {
        return "Vận tốc 15 km/h";
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
        .container {
            justify-content: center;
            align-content: center;
            text-align: center;
        }

        .submit-button {
            align: center;
        }
    </style>
</head>
<?php
$phuongtien = "";
$info = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['phuongtien'])) {
        $phuongtien = $_POST['phuongtien'];
        switch ($phuongtien) {
            case "xedap":
                $xd = new XeDap();
                $info = $xd->SoBanh() . ' ' . $xd->VanToc();
                break;
            case "xemay":
                $xm = new XeMay();
                $info = $xm->SoBanh() . ' ' . $xm->VanToc();
                break;
            case "xexichlo":
                $xl = new XeXichLo();
                $info = $xl->SoBanh() . ' ' . $xl->VanToc();
                break;
            case "xehoi":
                $xh = new XeHoi();
                $info = $xh->SoBanh() . ' ' . $xh->VanToc();
                break;
            default:
                $info = "Không truy cập được thông tin";
                break;
        }
    }
}
?>

<body>
    <form action="Bai4.php" method="post">
        <div class="container">
            <p>Chọn phương tiện: </p>
            <input name="phuongtien" type="radio" value="xedap">
            <label>Xe đạp</label><br>
            <input name="phuongtien" type="radio" value="xemay">
            <label>Xe Máy</label><br>
            <input name="phuongtien" type="radio" value="xexichlo">
            <label>Xe Xích Lô</label><br>
            <input name="phuongtien" type="radio" value="xehoi">
            <label>Xe Hơi</label><br><br>
            <input class="submit-button" type="submit" value="Lấy thông tin">
            <p><?php echo $info; ?></p>
        </div>
    </form>
</body>

</html>