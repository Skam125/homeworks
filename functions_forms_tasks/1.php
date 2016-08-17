<?php
/* function */
function getCommonWords($a, $b)
{
    $firstArray = explode(' ', $a);
    $secondArray = explode(' ', $b);
    $result = array_intersect($firstArray, $secondArray);
    $result = array_unique($result);
    return $result;
}


/* logic */

if (isset($_POST['text1']) && isset($_POST['text2'])) {
    echo '<pre>';
    print_r(getCommonWords($_POST['text1'], $_POST['text2']));
    echo '</pre>';
}

?>

<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <title>1</title>
</head>
<body>

<h2>Task 1</h2>
<form action="" method="post">
    <label for="text1"></label>
    <textarea name="text1" id="text1" cols="30" rows="10"></textarea>
    <label for="text2"></label>
    <textarea name="text2" id="text2" cols="30" rows="10"></textarea>
    <input type="submit">
</form>

</form>
</body>
</html