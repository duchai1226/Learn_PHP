<!DOCTYPE html>
<html lang="en">

<?php
$f = fopen("Data.txt", "r");
while (!feof($f)) {
    $noidung = fgets($f);
    ;
    echo $noidung . "<br>";
}
fclose($f);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

</body>

</html>