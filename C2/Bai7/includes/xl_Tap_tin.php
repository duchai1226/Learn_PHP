<?php
function readFileList($path)
{
    if (file_exists($path)) {
        return file_get_contents($path);
    } else {
        return "File not found: $path";
    }
}
?>