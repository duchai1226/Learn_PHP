<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4</title>
    <style>
        .ma_kh {
            width: 10px;
            text-align: center;
        }

        .img {
            width: 50px;
            height: 50px;
            display: block;
            margin: 0 auto;
            object-fit: cover;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
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
        $stmt = $pdo->query("SELECT ma_khach_hang, ten_khach_hang, email, dia_chi, dien_thoai, hinh FROM khach_hang;");
        $dishes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        echo "Không thể kết nối với cơ sở dữ liệu! <br>";
        echo "Error: " . $e->getMessage();
        exit;
    }



    ?>

    <h1>THÔNG TIN LOẠI MÓN ĂN</h1>
    <table>
        <tr>
            <th>Mã KH</th>
            <th>Tên KH</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Hình</th>
        </tr>
        <?php foreach ($dishes as $dish): ?>
            <tr>
                <td class="ma_kh"><?php echo $dish['ma_khach_hang']; ?></td>
                <td><?php echo $dish['ten_khach_hang']; ?></td>
                <td><?php echo $dish['email']; ?></td>
                <td><?php echo $dish['dia_chi']; ?></td>
                <td><?php echo $dish['dien_thoai']; ?></td>
                <td><img class="img" src="images/khach_hang/<?php echo $dish['hinh']; ?>"
                        alt="<?php echo $dish['ten_khach_hang']; ?>">
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>