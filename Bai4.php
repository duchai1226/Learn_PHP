<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
$username = $_POST["txt_username"];
$password = $_POST["txt_password"];
?>

<body>
    <form name="f1" method="post" action="Bai4.php">
        <table width="200" border="1" cellspacing="0" align="center" bgcolor="#ffffff">
            <tr>
                <td>UserName</td>
                <td><input name="txt_username" type="text" value="" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input name="txt_password" type="text" value="" /></td>
            </tr>
            <tr align="center">
                <td colspan="2"><input name="submit" type="submit" value="Login"></td>
            </tr>
        </table>
    </form>
</body>
<?php
if ($username == null || $password == null) {
    echo '<p align="center">Please Enter Your User Name / Password !</p>';
} elseif ($username == "yennh" && $password == "123456") {
    echo '<p align="center">Login Successful !</p>';
} else {
    echo '<p align="center">Try again!</p>';
}
?>

</html>