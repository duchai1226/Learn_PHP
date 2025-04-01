<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["data"])) {
        $data = $_POST["data"];
        if(!empty($data)){
            $data="\n".$data;
            $f=fopen("Data1.txt","a");
            fwrite($f,$data);
            fclose($f);
        }
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
    <form action="Bai14.php" method="post">
        <table align="center">
            <tr>
                <td>
                    <textarea name="data" rows="4" cols="50" ></textarea>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <input type="submit" value="Ghi vào file" style="width:100px; height:30px">
                </td>
            </tr>
        </table>
            
    </form>
</body>
</html>