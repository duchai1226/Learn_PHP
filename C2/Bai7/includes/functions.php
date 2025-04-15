<?php
include_once 'xl_Tap_tin.php';
include_once 'xl_Mang.php';
include_once 'xl_Hoa.php';

// Hàm đọc dữ liệu hoa từ file hoa.txt trong thư mục data
$path = "data/hoa.txt";
function readListHoa($path)
{
    // Lấy dữ liệu từ file (đường dẫn tương đối, ví dụ: "data/hoa.txt")
    $noiDungFile = readFileList($path);
    $mangHoa = Tach_chuoi_thanh_mang("/*", $noiDungFile);
    $listHoa = [];

    foreach ($mangHoa as $item) {
        if (!empty(trim($item))) {
            $chiTiet = Tach_chuoi_thanh_mang("|", $item);
            if (count($chiTiet) >= 7) {
                $listHoa[] = new Hoa(
                    $chiTiet[0],
                    $chiTiet[1],
                    $chiTiet[2],
                    $chiTiet[3],
                    $chiTiet[4],
                    $chiTiet[5],
                    $chiTiet[6]
                );

            }
        }
    }

    return $listHoa;
}
?>