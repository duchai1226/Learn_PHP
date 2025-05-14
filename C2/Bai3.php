<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bài 3</title>
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
            color: red;
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
class PhanSo
{
    protected $tuso;
    protected $mauso;
    public function __construct($tuso, $mauso)
    {
        $this->tuso = $tuso;
        $this->mauso = $mauso;
    }

    public function UCLN($a, $b)
    {
        $sonho = ($a < $b) ? $a : $b;
        for ($i = $sonho; $i > 0; $i--) {
            if (($a % $i) == 0 && ($b % $i) == 0) {
                return $i;
            }
        }
    }

    public function ToiGianPhanSo()
    {
        $ucln = $this->UCLN($this->tuso, $this->mauso);
        if ($ucln == NULL) {
            return ($this);
        }
        $this->tuso = $this->tuso / $ucln;
        $this->mauso = $this->mauso / $ucln;
        $pso_temp = new PhanSo($this->tuso, $this->mauso);
        return $pso_temp;
    }

    public function Sum($tuso, $mauso)
    {
        $pso_temp = new PhanSo($tuso, $mauso);
        $pso_temp->tuso = ($this->tuso * $pso_temp->mauso) + ($this->mauso * $pso_temp->tuso);
        $pso_temp->mauso = $this->mauso * $pso_temp->mauso;
        $pso_temp->ToiGianPhanSo();
        return $pso_temp;
    }

    public function Subtraction($tuso, $mauso)
    {
        $pso_temp = new PhanSo($tuso, $mauso);
        $pso_temp->tuso = ($this->tuso * $pso_temp->mauso) - ($this->mauso * $pso_temp->tuso);
        $pso_temp->mauso = $this->mauso * $pso_temp->mauso;
        if ($pso_temp->tuso != 0) {
            $pso_temp->ToiGianPhanSo();
        }
        return $pso_temp;
    }

    public function Multiplication($tuso, $mauso)
    {
        $pso_temp = new PhanSo($tuso, $mauso);
        $pso_temp->tuso = $this->tuso * $pso_temp->tuso;
        $pso_temp->mauso = $this->mauso * $pso_temp->mauso;
        $pso_temp->ToiGianPhanSo();
        return $pso_temp;
    }

    public function Division($tuso, $mauso)
    {
        $pso_temp = new PhanSo($mauso, $tuso);
        $pso_temp->tuso = $this->tuso * $pso_temp->tuso;
        $pso_temp->mauso = $this->mauso * $pso_temp->mauso;
        $pso_temp->ToiGianPhanSo();
        return $pso_temp;
    }

    public function printPhanSo()
    {
        if ($this->tuso == $this->mauso) {
            return 1;
        }
        if ($this->tuso == 0) {
            return 0;
        }
        $pso_text = $this->tuso . "/" . $this->mauso;
        return $pso_text;
    }
}
$tu_so1 = 0;
$mau_so1 = 0;
$tu_so2 = 0;
$mau_so2 = 0;
$result = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (
        isset($_POST['tu_so1'], $_POST['mau_so1'], $_POST['tu_so2'], $_POST['mau_so2'], $_POST['pheptoan'])
        && $_POST['tu_so1'] != "" && $_POST['mau_so1'] != "" && $_POST['tu_so2'] != "" && $_POST['mau_so2'] != ""
    ) {
        $tu_so1 = $_POST['tu_so1'];
        $mau_so1 = $_POST['mau_so1'];
        $tu_so2 = $_POST['tu_so2'];
        $mau_so2 = $_POST['mau_so2'];
        $pheptoan = $_POST['pheptoan'];
        $pso = new PhanSo($tu_so1, $mau_so1);
        try {
            switch ($pheptoan) {
                case 'cong':
                    $result = $pso->Sum($tu_so2, $mau_so2);
                    $result = $result->printPhanSo();
                    break;
                case 'tru':
                    $result = $pso->Subtraction($tu_so2, $mau_so2);
                    $result = $result->printPhanSo();
                    break;
                case 'nhan':
                    $result = $pso->Multiplication($tu_so2, $mau_so2);
                    $result = $result->printPhanSo();
                    break;
                case 'chia':
                    $result = $pso->Division($tu_so2, $mau_so2);
                    $result = $result->printPhanSo();
                    break;
                default:
                    break;
            }
        } catch (Exception $e) {
            var_dump($e);
            echo 'Caught exception: ', $e->getMessage(), "\n";
        }
    } else {
        echo "Vui lòng nhập đủ tham số!";
    }

}
?>

<body>
    <div class="container">
        <h1>TÍNH TOÁN</h1>
        <form action="Bai3.php" method="post">
            <table>
                <tr>
                    <td>Nhập Tử PSố1</td>
                    <td><input name="tu_so1" type="number" id="length" value="<?php echo $tu_so1; ?>"></td>
                </tr>
                <tr>
                    <td>Nhập Mẫu PSố1</td>
                    <td><input name="mau_so1" type="number" id="width" value="<?php echo $mau_so1; ?>"></td>
                </tr>
                <tr>
                    <td>Nhập Tử PSố2</td>
                    <td><input name="tu_so2" type="number" id="length" value="<?php echo $tu_so2; ?>"></td>
                </tr>
                <tr>
                    <td>Nhập Mẫu PSố2</td>
                    <td><input name="mau_so2" type="number" id="width" value="<?php echo $mau_so2; ?>"></td>
                </tr>
                <tr>
                    <td>Kết quả</td>
                    <td><input type="text" id="perimeter" class="result-field" value="<?php echo $result; ?>" readonly>
                    </td>
                </tr>
                </tr>
                <tr>
                    <td colspan="2" class="button-container">
                        <button name="pheptoan" id="calculate" value="cong">TỔNG</button>
                        <button name="pheptoan" id="calculate" value="tru">HIỆU</button>
                        <button name="pheptoan" id="calculate" value="nhan">TÍCH</button>
                        <button name="pheptoan" id="calculate" value="chia">THƯƠNG</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>