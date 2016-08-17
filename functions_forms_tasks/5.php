<?php

/* function */
function findFileInDirectory($path, $file){
    $allFiles = $path . '*.*';
    $fileList = glob($allFiles);
    foreach($fileList as $value){
        $check = strpos($value, $file);
        if ($check !== false){
            echo $value . '<br>';
        }

    }

}

/* logic */

$path = 'C:/xampp/';
$file = 'zilla';

findFileInDirectory($path, $file);
