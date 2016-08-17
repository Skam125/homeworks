<?php
function fileList($arr)
{
    $path = $arr . '*.*';
    $fileList = glob($path);
    foreach ($fileList as $value) {
        echo $value . '<br>';

    }

}

fileList('C:/xampp/');
