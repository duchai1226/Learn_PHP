<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["content"])) {
    $content = $_POST["content"];
    if (!empty($content)) {
        $file = fopen("content1.txt", "a");
        $content = "\n" . $content;
        fwrite($file, $content);
        fclose($file);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 14</title>
    <style>
        .button {
            background-color: lightskyblue;
            color: white;
        }
    </style>
</head>

<body>
    <form action="Bai14.php" method="post">
        <table align="center">
            <tr>
                <td>
                    <textarea name="content" cols="50" rows="6"></textarea>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <input class="button" type="submit" value="Write to File" style="width:100px; height:30px">
                </td>
            </tr>
        </table>

    </form>
</body>

</html>