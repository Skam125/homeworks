<?php
/* function */
function strReverse($str)
{
    $arr = str_split($str);
    $arrReverse = array_reverse($arr);
    $strReverse = implode('', $arrReverse);
    return $strReverse;
}

/* logic */
if (isset($_POST['input_text'])) {
    $str = $_POST['input_text'];
    echo 'Изначальный текст: ' . $str . '<br>';
    echo 'Перевернутый текст: ' . strReverse($str);
}
?>

<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <title>9</title>
</head>
<body>

<h2>Task 9</h2>
<form action="" method="post">
    <label for="input text">Введите текст</label>
    <div style="clear:both"></div>
    <textarea name="input text" id="input text" cols="30" rows="10"></textarea>
    <div style="clear:both"></div>
    <input type="submit">

</form>
</body>
</html