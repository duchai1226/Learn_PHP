<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoa Theo Loại</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            text-align: center;
        }

        h1 {
            color: blue;
            padding: 20px;
            margin: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin: 20px;
        }

        .card {
            background: white;
            width: 250px;
            margin: 15px;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card img {
            width: 100%;
            border-radius: 10px;
        }

        .card h2 {
            font-size: 18px;
            color: #333;
            margin: 10px 0;
        }

        .price {
            color: #e44d26;
            font-weight: bold;
        }
    </style>
</head>
<?php
$path = "Hoa_theo_chu_de_17b.xml";
$doc = new DOMDocument();
$doc->load($path);

$root = $doc->documentElement;
$ds = $root->childNodes;
?>

<body>

    <h1>HOA THEO LOẠI</h1>

    <div class="container">
        <?php
        foreach ($ds as $hoa) {
            if ($hoa->nodeType == 1) {
                $tencd = $hoa->getAttribute("TenCD");
                $hinh = $hoa->getAttribute("Hinh");
                $gia = $hoa->getAttribute("Gia");
                echo "<div class='card'>";
                echo "<img src='images/{$hinh}' alt='{$tencd}'>";
                echo "<h2>{$tencd}</h2>";
                echo "<p class='price'>Giá: {$gia}</p>";
                echo "</div>";
            }
        }
        ?>
    </div>

</body>

</html>