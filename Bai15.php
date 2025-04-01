<?php
    $f1=fopen("Data2.txt","r");
    $f2=fopen("Data3.txt","a");
    while(!feof($f1)){
        $data=fgets($f1);
        fwrite($f2,$data);
    }
    fclose($f1);
    fclose($f2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Bai15.php" method="post">
        <table align="center">
            <tr>
                <td align="center">
                    <input type="submit" value="Ghi vào file Data3.txt" style="width:150px; height:30px">
                </td>
            </tr>
        </table>
            
    </form>
</body>
</html>