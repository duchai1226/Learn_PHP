<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 7.2</title>
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }

        .pagination a {
            margin: 0 5px;
            padding: 8px 12px;
            text-decoration: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            color: cornflowerblue;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .pagination a:hover {
            background-color: #f0f0f0;
        }

        .current-page {
            text-align: center;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
            margin-top: 10px;
        }
    </style>
</head>
<?php
$page = $_GET["page"];
?>

<body>
    <div class="pagination">
        <a href="#">Prev</a>
        <a href="?page=1">1</a>
        <a href="?page=2">2</a>
        <a href="?page=3">3</a>
        <a href="?page=4">4</a>
        <a href="?page=5">5</a>
        <a href="?page=6">6</a>
        <a href="?page=7">7</a>
        <a href="?page=8">8</a>
        <a href="?page=9">9</a>
        <a href="?page=10">10</a>
        <a href="#">Next</a>
    </div>
    <div class="current-page">
        <?php echo 'Bạn đang ở trang thứ ' . $page; ?>
    </div>
</body>

</html>