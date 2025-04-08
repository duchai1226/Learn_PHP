<?php

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
    $path = "Dich_vu_qua.xml";
    $doc = new DOMDocument();
    $doc->load($path);

    $root = $doc->documentElement;
    $dsqua = $root->childNodes;
    ?>
    <h2>DỊCH VỤ QUÀ</h2>
    <?php
    foreach ($dsqua as $qua) {
        if ($qua->nodeType == 1) {
            $content = $qua->nodeValue;
            ?>
            <a style="text-decoration:none" href="<?php echo $id ?>"> <?php echo $content ?> </a>
            <br>
            -----------------------------
            <br>
            <?php
        }
    }
    ?>
</body>

</html>