<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giải Phương Trình Bậc 1</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 500px;
            margin: 20px auto;
        }

        .header {
            background-color: #FF6600;
            color: white;
            text-align: center;
            padding: 10px;
            font-weight: bold;
            font-size: 18px;
        }

        .content {
            background-color: #FFFFCC;
            padding: 15px;
            border: 1px solid #ccc;
        }

        .row {
            display: flex;
            margin-bottom: 12px;
            align-items: center;
        }

        .label {
            width: 120px;
            font-weight: normal;
        }

        input[type="text"] {
            border: 1px solid #ccc;
            padding: 5px;
            margin: 0 5px;
        }

        .equation-input {
            display: flex;
            align-items: center;
        }

        .result {
            background-color: #F0F0F0;
            border: 1px solid #ccc;
            padding: 5px;
            width: 300px;
        }

        .submit {
            background-color: #E0E0E0;
            border: 1px solid #999;
            padding: 5px 10px;
            margin-top: 5px;
            cursor: pointer;
            display: block;
            margin: 0 auto;
        }

        button:hover {
            background-color: #D0D0D0;
        }
    </style>
</head>

<?php
include "Lib/GiaiPTB1.php";
$a = $_POST["a"];
$b = $_POST["b"];
if (!is_numeric($a) || !is_numeric($b)) {
    $noti = "Vui lòng nhập số";
} else {
    $a = (float) $a;
    $b = (float) $b;
    $noti = giaiPTB1($a, $b);
}
?>

<body>
    <form action="Bai12.php" method="post">
        <div class="header">GIẢI PHƯƠNG TRÌNH BẬC 1</div>

        <div class="content">
            <div class="row">
                <div class="label">Phương trình</div>
                <div class="equation-input">
                    <input name="a" type="text" id="coefficient" value="<?php echo $a ?>" size="3">
                    x +
                    <input name="b" type="text" id="constant" value="<?php echo $b ?>" size="3">
                    = 0
                </div>
            </div>

            <div class="row">
                <div class="label">Nghiệm</div>
                <div class="result" id="result"><?php echo $noti; ?></div>
            </div>
            <input class="submit" type="submit" value="GIẢI PHƯƠNG TRÌNH">
        </div>
    </form>
</body>

</html>