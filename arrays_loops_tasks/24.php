<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>24.php</title>
</head>
<body>
<form action="24.php" method="post">
    <label for="test_num">Введите цифру для проверки</label>
    <input type="number" name="test_num" id="test_num" min="0" max="9" required/>
    <label for="input">Введите число</label>
    <input type="number" name="input" id="input" required/>
    <input type="submit" name="submit"/>
</form>

<?php
if (isset($_POST['input'])) {
    $num = $_POST['input'];
    $test_num = $_POST['test_num'];
    $i = 0;
        $array = str_split($num);
    foreach ($array as $value) {
        if ($test_num == $value) {
            $i++;
        }
    }
        
    echo "Цифра {$test_num} в числе {$num} встречается {$i} раза.";
}
?>

</body>
</html>
