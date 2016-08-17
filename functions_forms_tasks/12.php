<?php
/* functions */

function arrReverse($str)
{

    $arr = explode('. ', $str);

    foreach ($arr as $key => $value) { //удаляет пустые елементы массива
        if (empty($value)) {
            unset($arr[$key]);
        }
    }

    $reverseArr = array_reverse($arr);

    foreach ($reverseArr as $key => $value) {
        $reverseArr[$key] = ($value . '.');
    }
    $result = implode(' ', $reverseArr);
    return $result;
}

/* logic */


if (isset($_POST['input_text'])) {
    $str = $_POST['input_text'];
    echo 'Входная строка: ' . $str . '<br>';
    echo 'Строка, возвращенная функцией : ';
    echo(arrReverse($str));
}


?>


<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <title>12</title>
</head>
<body>

<h2>Task 12</h2>
<form action="" method="post">
    <label for="input text">Введите текст</label>
    <div style="clear:both"></div>
    <textarea name="input text" id="input text" cols="30" rows="10"></textarea>
    <div style="clear:both"></div>
    <input type="submit">

</form>
</body>
</html
