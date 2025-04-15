<?php
// Bao gồm lớp Menu
require_once 'Menu.php';

// Khởi tạo theme mặc định
$selectedTheme = isset($_GET['theme']) ? $_GET['theme'] : 'red';

// Tạo đối tượng Menu với theme được chọn
$menu = new Menu($selectedTheme);

// Thêm các mục vào menu
$menu->addItem('GIỚI THIỆU CHƯƠNG');
$menu->addItem('TUYỂN SINH');
$menu->addItem('CHƯƠNG TRÌNH ĐÀO TẠO');
$menu->addItem('HOẠT ĐỘNG SINH VIÊN');
$menu->addItem('TUYỂN DỤNG');
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu PHP</title>
    <!-- Liên kết đến CSS theo theme -->
    <link rel="stylesheet" href="styles/<?php echo $menu->getTheme(); ?>.css">
</head>

<body>
    <h1>Menu PHP</h1>

    <!-- Form chọn theme -->
    <form method="GET" action="index.php">
        <label for="theme">Chọn Theme: </label>
        <select name="theme" id="theme" onchange="this.form.submit()">
            <option value="red" <?php echo $selectedTheme == 'red' ? 'selected' : ''; ?>>Red</option>
            <option value="blue" <?php echo $selectedTheme == 'blue' ? 'selected' : ''; ?>>Blue</option>
            <option value="yellow" <?php echo $selectedTheme == 'yellow' ? 'selected' : ''; ?>>Yellow</option>
        </select>
    </form>

    <!-- Hiển thị menu -->
    <?php echo $menu->render(); ?>
</body>

</html>