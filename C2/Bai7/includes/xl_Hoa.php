<?php
// Định nghĩa class Hoa
class Hoa
{
    public $ID;
    public $TenHoa;
    public $Loai;
    public $GiaBan;
    public $HinhAnh;
    public $TieuBieu;
    public $MoTa;

    public function __construct($ID, $TenHoa, $Loai, $GiaBan, $HinhAnh, $TieuBieu, $MoTa)
    {
        $this->ID = $ID;
        $this->TenHoa = $TenHoa;
        $this->Loai = $Loai;
        $this->GiaBan = $GiaBan;
        $this->HinhAnh = $HinhAnh;
        $this->TieuBieu = $TieuBieu;
        $this->MoTa = $MoTa;
    }

    // Phương thức hiển thị thông tin của hoa
    public function Show()
    {
        echo "<div class='col-md-4 mb-4'>";
        echo "<div class='card'>";
        echo "<img src='data/assets/images/{$this->HinhAnh}' class='card-img-top' alt='{$this->TenHoa}'>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>{$this->TenHoa}</h5>";
        echo "<p class='card-text'>{$this->MoTa}</p>";
        echo "<p class='card-text text-danger'>" . number_format($this->GiaBan, 0, ',', '.') . " VND</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }

    // Hiển thị tất cả các hoa
    public static function ShowALL($listHoa)
    {
        if (count($listHoa) > 0) {
            echo "<div class='row'>";
            foreach ($listHoa as $hoa) {
                $hoa->Show();
            }
            echo "</div>";
        } else {
            echo "<div class='alert alert-info'>Không có sản phẩm hoa nào</div>";
        }
    }

    // Hiển thị hoa tiêu biểu
    public static function ShowTieuBieu($listHoa)
    {
        $hoaTieuBieu = array_filter($listHoa, function ($hoa) {
            return $hoa->TieuBieu == 1;
        });
        if (count($hoaTieuBieu) > 0) {
            echo "<div class='row'>";
            foreach ($hoaTieuBieu as $hoa) {
                $hoa->Show();
            }
            echo "</div>";
        } else {
            echo "<div class='alert alert-info'>Không có hoa tiêu biểu nào</div>";
        }
    }

    // Hiển thị hoa theo loại
    public static function ShowByLoai($listHoa, $loai)
    {
        $hoaTheoLoai = array_filter($listHoa, function ($hoa) use ($loai) {
            return stripos($hoa->Loai, $loai) !== false;
        });
        if (count($hoaTheoLoai) > 0) {
            echo "<div class='row'>";
            foreach ($hoaTheoLoai as $hoa) {
                $hoa->Show();
            }
            echo "</div>";
        } else {
            echo "<div class='alert alert-info'>Không có hoa loại '{$loai}' nào</div>";
        }
    }
}
?>