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
    $arr = $root->childNodes;
    ?>
    <h2>DỊCH VỤ QUÀ</h2>
    <ul>
        <?php
        foreach ($arr as $node) {
            if ($node->nodeType == 1) {
                $content = $node->nodeValue;
                ?>
                <li><a style="text-decoration:none" href="<?php echo $id ?>"> <?php echo $content ?> </a></li>
                -----------------------------
                <?php
            }
        }
        ?>
    </ul>
</body>

</html>