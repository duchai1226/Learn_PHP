<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Table</title>
    <style>
        table {
            width: 300px;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        /* Định dạng màu vàng cho các ô chứa món ăn */
        td:nth-child(2) {
            background-color: #ffff99;
            /* Màu vàng nhạt giống trong hình */
        }
    </style>
</head>

<body>
    <?php
    // Định nghĩa mảng meal
    $meal = [
        'breakfast' => 'Bread and milk',
        'lunch' => 'Rice',
        'dinner' => 'Instant Noodle'
    ];
    ?>

    <table>
        <?php
        // Sử dụng vòng lặp foreach để xuất dữ liệu
        foreach ($meal as $time => $food) {
            echo "<tr>";
            echo "<td>$time</td>";
            echo "<td>$food</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>