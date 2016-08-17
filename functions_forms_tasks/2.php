<?php /* function */
function getTopLongestWords($text, $topCount = 3)
{
$words = explode(' ', $text);
usort($words, 'cmp');
$words = array_unique($words);

return array_slice($words, 0, $topCount);
}


function cmp($a, $b)
{
if (strlen($a) == strlen($b)) {
return 0;
}
return (strlen($a) < strlen($b)) ? 1 : -1;
}

/* logic */
if(isset($_POST['input_text'])){
    $result = getTopLongestWords($_POST['input_text']);
    echo '<pre>';
    print_r($result);
    echo '</pre>';
}

?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <title>2</title>
</head>
<body>

<h2>Task 2</h2>
<form action="" method="post">
    <label for="text">Введите текст</label>
    <div style="clear: both"></div>
    <textarea name="input text" id="text" cols="30" rows="10"></textarea>
    <div style="clear: both"></div>
    <input type="submit">
</form>

</form>
</body>
</html>