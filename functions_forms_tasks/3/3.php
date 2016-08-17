<?php
/* function */
function deleteLongWords($text, $wordLength)
{
    $arr = explode(' ', $text);
    foreach ($arr as $key => $value) {
        if (mb_strlen($value) > $wordLength) {
            unset($arr[$key]);
        }
    }
    $result = implode(' ', $arr);
    return $result;
}

/* logic */

if (file_exists('data.txt')) {
    $text = file_get_contents('data.txt');
} else {
    die ("Невозможно открыть файл");
}
echo $text . '<br>';
if (isset($_POST['number'])) {
    echo deleteLongWords($text, $_POST['number']);
}
?>


<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <title>3</title>
</head>
<body> 

<h2>Task 3</h2>
<form action="" method="post">
    <label for="number">Введите количество символов</label>
    <div style="clear: both"></div>
    <input type="number" name="number" id="number" value="3" required>
    <div style="clear: both"></div>
    <input type="submit" value="Выбрать">
</form>

</form>
</body>

