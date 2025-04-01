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
    $path = "Hoa_theo_chu_de_18b.xml";
    $doc = new DOMDocument();
    $doc->load($path);

    $root = $doc->documentElement;
    $arr = $root->childNodes;
    ?>
    <h2>HOA THEO CHỦ ĐỀ</h2>
    <ul>
        <?php
        foreach ($arr as $node) {
            if ($node->nodeType == 1) {
                $id = $node->getAttribute("ID");
                $tencd = $node->getAttribute("TenCD");
                ?>
                <li><a style="text-decoration:none" href="<?php echo $id ?>"> <?php echo $tencd ?> </a></li>
                -----------------------------
                <?php
            }
        }
        ?>
        <li><a style="text-decoration:none" href="hoalist.php"> SHOW ALL </a></li>
    </ul>
</body>

</html>