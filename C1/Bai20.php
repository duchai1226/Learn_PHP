<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đọc Dữ Liệu JSON</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        img {
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<?php
$Data = file_get_contents("NV.json");
$listnv = json_decode($Data, true);
?>

<body>
    <h2 style="color:blue">ĐỌC DỮ LIỆU TỪ FILE JSON</h2>
    <table>
        <tr>
            <th>Mã Nhân Sự</th>
            <th>Tên NV</th>
            <th>Email</th>
            <th>Khoa</th>
            <th>Hình</th>
        </tr>
        <?php foreach ($listnv as $nv): ?>
            <tr>
                <td><?= $nv['MaNV'] ?></td>
                <td><?= $nv['Ten'] ?></td>
                <td><?= $nv['Email'] ?></td>
                <td><?= $nv['Khoa'] ?></td>
                <td><img src="images/<?= $nv['Hinh'] ?>" alt="<?= $nv['Ten'] ?>"></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>