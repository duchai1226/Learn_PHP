<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $DT = array("Nokia", "SamSung", "IPhone", "Oppo", "BPhone");
    $i = 0;
    while ($i < count($DT)) {
        echo $DT[$i];
        echo '<br>';
        $i++;
    }
    ?>
</body>

</html>