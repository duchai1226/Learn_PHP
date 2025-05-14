<?php

if (isset($_GET['id'])) {
    $dbname = "ql_nha_hang";
    $driver = "mysql:host=localhost;dbname=$dbname";
    $username = "root";
    $password = "";

    try {
        $pdo = new PDO($driver, $username, $password);

        // Get customer image before delete
        $stmt = $pdo->prepare("SELECT hinh FROM khach_hang WHERE ma_khach_hang = ?");
        $stmt->execute([$_GET['id']]);
        $customer = $stmt->fetch();

        // Delete customer
        $stmt = $pdo->prepare("DELETE FROM khach_hang WHERE ma_khach_hang = ?");
        if ($stmt->execute([$_GET['id']])) {
            // Delete customer image
            if ($customer && $customer['hinh']) {
                $imagePath = "../images/khach_hang/" . $customer['hinh'];
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            header("Location: ShowCustomer.php");
            exit();
        } else {
            echo "<script>
                    alert('Xóa khách hàng không thành công!');
                    window.location.href='ShowCustomer.php';
                  </script>";
        }
    } catch (PDOException $e) {
        echo "<script>
                alert('Lỗi: " . addslashes($e->getMessage()) . "');
                window.location.href='ShowCustomer.php';
              </script>";
    }
} else {
    header("Location: ShowCustomer.php");
    exit();
}
?>