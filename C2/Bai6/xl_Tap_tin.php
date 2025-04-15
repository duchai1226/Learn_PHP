<?php
function readNews($filename)
{
    if (file_exists($filename)) {
        return file_get_contents($filename);
    } else {
        return "File not found $filename";
    }
}
?>