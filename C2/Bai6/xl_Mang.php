<?php
function Tach_chuoi_thanh_mang($dinhdang, $str)
{
    if (empty($str)) {
        return [];
    }
    return explode($dinhdang, $str);
}
?>