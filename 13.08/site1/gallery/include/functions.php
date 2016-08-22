<?php

function checkAndUploadFile($file, $destination, &$message, &$errorMessage)
{

    global $allowedTypes;

    if (in_array($file['type'], $allowedTypes)) {
        $fileName = $file['tmp_name'];
        if (move_uploaded_file($fileName, $destination)) {
            $message = 'Your image was uploaded!';
        }
    } else {
        $errorMessage = 'File has a wrong format!';
    }
}

function removeFile($filename)
{
    return unlink($filename);
}

function removeDir($dir) {
    if ($files = glob($dir . '\*')) {
        foreach($files as $file) {
            is_dir($file) ? removeDir($file) : unlink($file); // рекурсивное удаление файлов в папках
        }
    }
    rmdir($dir);
}

function cmp($a, $b)
{
    if (filesize($a) == filesize($b)) {
        return 0;
    }
    return (filesize($a) < filesize($b)) ? -1 : 1;
}