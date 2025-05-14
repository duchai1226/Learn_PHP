<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bài 2</title>
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

        .ketqua-field {
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
class TinhToan
{
    protected $a;
    protected $b;
    public function __construct($a, $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function Sum()
    {
        $sum = $this->a + $this->b;
        return $sum;
    }

    public function Subtraction()
    {
        $ketqua = $this->a - $this->b;
        return $ketqua;
    }

    public function Multiplication()
    {
        $ketqua = $this->a * $this->b;
        return $ketqua;
    }

    public function Division()
    {
        $ketqua = $this->a / $this->b;
        return $ketqua;
    }
}
$a = 0;
$b = 0;
$ketqua = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['a'], $_POST['b'], $_POST['pheptoan']) && $_POST['a'] != "" && $_POST['b'] != "") {
        $a = $_POST['a'];
        $b = $_POST['b'];
        $pheptoan = $_POST['pheptoan'];
        $tinhtoan = new TinhToan($a, $b);

        switch ($pheptoan) {
            case 'cong':
                $ketqua = $tinhtoan->Sum();
                break;
            case 'tru':
                $ketqua = $tinhtoan->Subtraction();
                break;
            case 'nhan':
                $ketqua = $tinhtoan->Multiplication();
                break;
            case 'chia':
                $ketqua = $tinhtoan->Division();
                break;
            default:
                break;
        }
    } else {
        echo "Nhập thiếu!";
    }

}
?>

<body>
    <div class="container">
        <h1>TÍNH TOÁN</h1>
        <form action="Bai2.php" method="post">
            <table>
                <tr>
                    <td>a</td>
                    <td><input name="a" type="number" id="length" value="<?php echo $a; ?>"></td>
                </tr>
                <tr>
                    <td>b</td>
                    <td><input name="b" type="number" id="width" value="<?php echo $b; ?>"></td>
                </tr>
                <tr>
                    <td>Kết quả</td>
                    <td><input type="text" id="perimeter" class="ketqua-field" value="<?php echo $ketqua; ?>" readonly>
                    </td>
                </tr>
                </tr>
                <tr>
                    <td colspan="2" class="button-container">
                        <button name="pheptoan" id="tinhtoanulate" value="cong">CỘNG</button>
                        <button name="pheptoan" id="tinhtoanulate" value="tru">TRỪ</button>
                        <button name="pheptoan" id="tinhtoanulate" value="nhan">NHÂN</button>
                        <button name="pheptoan" id="tinhtoanulate" value="chia">CHIA</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>