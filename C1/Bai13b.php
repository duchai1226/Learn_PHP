<?php
$f = file("Data0.txt");
if (!$f) {
    die("Không đọc được file!");
}
$dsnv=[];
for ($i=0; $i < count($f); $i+=4) { 
    $nv=[
        "path"=>$f[$i],
        "name"=>$f[$i+1],
        "email"=>$f[$i+2],
        "mahp"=>$f[$i+3],
    ];
    array_push($dsnv,$nv);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>DANH SÁCH NHÂN VIÊN</h2>
    <div >
        <?php foreach ($dsnv as $nv): ?>
            <div >
                <table style="border-spacing: 10px" >
                    <tr>
                        <td><img src="images/<?php echo $nv['path']; ?>" alt="Ảnh nhân viên"></td>
                        <td >
                            <p ><?php echo $nv['name']; ?></p>
                            <p ><?php echo $nv['email']; ?></p>
                            <p ><?php echo $nv['mahp']; ?></p>
                        </td>
                    </tr>
                </table>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>