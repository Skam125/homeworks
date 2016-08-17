<?php /* function */
function numberUniqueWords($str)
{
    $arr = explode(' ', $str);
    $unique_arr = array_unique($arr);
    $result = count($unique_arr);
    return $result;
}

if (isset($_POST['input_text'])) {
    $arr = $_POST['input_text'];
    echo $arr . '<br>' . 'количество уникальных слов в тексте: ';
    echo numberUniqueWords($arr);
}

/* logic */
?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <title>10</title>
</head>
<body>

<h2>Task 10</h2>
<form action="" method="post">
    <label for="text">Введите текст</label>
    <div style="clear: both"></div>
    <textarea name="input text" id="text" cols="30" rows="10" required></textarea>
    <div style="clear: both"></div>
    <input type="submit">
</form>

</form>
</body>
</html>

