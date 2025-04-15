<?php
// xl_Tintuc.php - Định nghĩa class Tin_tuc
class Tin_tuc
{
    public $tieude;
    public $noidung;
    public $hinhanh;
    public $link;

    function __construct($tieude = "", $noidung = "", $hinhanh = "", $link = "")
    {
        $this->tieude = $tieude;
        $this->noidung = $noidung;
        $this->hinhanh = $hinhanh;
        $this->link = $link;
    }

    public function getShortDescription($length = 150)
    {
        return (strlen($this->noidung) <= $length) ? $this->noidung : substr($this->noidung, 0, $length) . "...";
    }

    public function hienThi()
    {
        echo "<div class='col-md-4 mb-4'>";
        echo "<div class='card h-100'>";

        // Hiển thị hình ảnh
        if (!empty($this->hinhanh) && file_exists($this->hinhanh)) {
            echo "<img src='{$this->hinhanh}' class='card-img-top' alt='{$this->tieude}' style='height: 200px; object-fit: cover;'>";
        } else {
            echo "<div class='card-img-top bg-light d-flex justify-content-center align-items-center' style='height: 200px;'>";
            echo "<span class='text-muted'>Không có hình ảnh</span>";
            echo "</div>";
        }

        echo "<div class='card-body d-flex flex-column'>";
        echo "<h5 class='card-title text-primary'>{$this->tieude}</h5>";
        echo "<p class='card-text flex-grow-1'>{$this->getShortDescription()}</p>";

        if (!empty($this->link)) {
            echo "<a href='{$this->link}' class='btn btn-outline-primary mt-auto'>Xem chi tiết</a>";
        } else {
            echo "<button class='btn btn-outline-secondary mt-auto' disabled>Chưa có link</button>";
        }

        echo "</div>"; // card-body
        echo "</div>"; // card
        echo "</div>"; // col
    }
}
?>