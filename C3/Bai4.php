<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            width: 33.33%;
        }

        th {
            background-color: rgb(182, 228, 139);
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <?php
    $dbname = "ql_nha_hang";
    $driver = "mysql:host=localhost;dbname=$dbname";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO($driver, $username, $password);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    $sql = 'SELECT ma_loai, ten_loai, mo_ta FROM loai_mon_an;';
    $loai_mon_an = $pdo->query($sql);
    ?>

    <h1>THÔNG TIN LOẠI MÓN ĂN</h1>
    <table>
        <tr>
            <th>Mã loại</th>
            <th>Tên loại</th>
            <th>Mô tả</th>
        </tr>
        <?php foreach ($loai_mon_an as $mon_an): ?>
            <tr>
                <td><?php echo $mon_an['ma_loai']; ?></td>
                <td><?php echo $mon_an['ten_loai']; ?></td>
                <td><?php echo $mon_an['mo_ta']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>