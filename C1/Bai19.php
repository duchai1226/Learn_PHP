<?php
$arr = array("#1" => "Trang chủ", "#2" => "Giới thiệu", "#3" => "Sản phẩm tiêu biểu", "#4" => "Tin tức", "#5" => "Liên hệ", "#6" => "Album");
$doc = new DOMDocument("1.0", "utf-8");

$root = $doc->createElement("Menus");
$doc->appendChild($root);
foreach ($arr as $key => $value) {
    $node = $doc->createElement("Menu");
    $node->nodeValue = $value;
    $node->setAttribute("link", $key);
    $root->appendChild($node);
}

$path = "XML_TaoMoiFile.xml";
$doc->save($path);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $f = fopen("XML_TaoMoiFile.xml", "r");
    while (!feof($f)) {
        $noidung = fgets($f);
        ;
        echo $noidung . "<br>";
    }
    fclose($f);
    ?>
</body>

</html>