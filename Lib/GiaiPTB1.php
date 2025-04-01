<?php
function giaiPTB1($a, $b)
{
    $noti = "";
    switch ($a) {
        case 0:
            $noti = "a không được bằng 0";
            break;
        default:
            $x = -$b / $a;
            $noti = "Có nghiệm là " . $x;
            break;
    }
    return $noti;
}
?>