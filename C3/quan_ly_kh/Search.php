<?php

$dbname = "ql_nha_hang";
$driver = "mysql:host=localhost;dbname=$dbname";
$username = "root";
$password = "";

try {
    $pdo = new PDO($driver, $username, $password);

    if (isset($_GET['keyword'])) {
        $keyword = "%" . $_GET['keyword'] . "%";

        $stmt = $pdo->prepare("SELECT * FROM khach_hang 
                              WHERE ten_khach_hang LIKE ? 
                              OR email LIKE ? 
                              OR dia_chi LIKE ? 
                              OR dien_thoai LIKE ?");

        $stmt->execute([$keyword, $keyword, $keyword, $keyword]);
        $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #9ACD32;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
        }

        .search-box {
            display: flex;
            gap: 10px;
        }

        .search-box input {
            padding: 5px;
            border: none;
            border-radius: 3px;
        }

        .search-box button {
            background-color: #8BC34A;
            border: none;
            color: white;
            padding: 5px 15px;
            border-radius: 3px;
            cursor: pointer;
        }

        h1 {
            text-align: center;
            color: #333;
            margin: 20px 0;
        }

        .add-new {
            background-color: #2196F3;
            color: white;
            padding: 8px 15px;
            text-decoration: none;
            border-radius: 3px;
            margin: 20px;
            display: inline-block;
        }

        table {
            width: 95%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
        }

        .customer-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            /* border-radius: 50%; */
        }

        .action-buttons {
            display: flex;
            gap: 5px;
        }

        .btn-update {
            background-color: #4CAF50;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="nav-links">
            <a href="#">🏠</a>
            <a href="#">Khách Hàng</a>
            <a href="#">Loại món ăn</a>
            <a href="#">Món ăn</a>
            <a href="#">Đăng ký</a>
            <a href="#">Đăng Nhập</a>
        </div>
        <div class="search-box">
            <form action="Search.php" method="GET" style="display: flex; gap: 10px;">
                <input type="text" name="keyword" value="<?php echo htmlspecialchars($_GET['keyword'] ?? ''); ?>"
                    placeholder="Search" required>
                <button type="submit">Search</button>
            </form>
        </div>
    </div>

    <h1>KẾT QUẢ TÌM KIẾM</h1>

    <div style="margin: 20px; display: flex; justify-content: space-between; align-items: center;">
        <p>Kết quả tìm kiếm cho: <strong><?php echo htmlspecialchars($_GET['keyword']); ?></strong></p>
        <a href="ShowCustomer.php" class="btn-update" style="text-decoration: none;">Quay lại</a>
    </div>

    <?php if (empty($customers)): ?>
        <p style="text-align: center; margin: 20px;">Không tìm thấy kết quả nào.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Mã KH</th>
                    <th>Tên KH</th>
                    <th>Email</th>
                    <th>Địa Chỉ</th>
                    <th>Điện thoại</th>
                    <th>Hình</th>
                    <th>CRUD</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?php echo $customer['ma_khach_hang']; ?></td>
                        <td><?php echo $customer['ten_khach_hang']; ?></td>
                        <td><?php echo $customer['email']; ?></td>
                        <td><?php echo $customer['dia_chi']; ?></td>
                        <td><?php echo $customer['dien_thoai']; ?></td>
                        <td>
                            <img src="../images/khach_hang/<?php echo $customer['hinh']; ?>"
                                alt="<?php echo $customer['ten_khach_hang']; ?>" class="customer-img">
                        </td>
                        <td class="action-buttons">
                            <a href="UpdateCustomer.php?id=<?php echo $customer['ma_khach_hang']; ?>"
                                class="btn-update">UPDATE</a>
                            <a href="DeleteCustomer.php?id=<?php echo $customer['ma_khach_hang']; ?>"
                                onclick="return confirm('Bạn có chắc muốn xóa khách hàng này?')" class="btn-delete">DELETE</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>

</html>