<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <title>23</title>
</head>
<body>


<form action="23.php" method="post">
    <label for="num">Введите число</label>
    <input type="number" name="number" id="num" min="1" required>
    <input type="submit" name="submit">
</form>


<?php
if (isset($_POST['number'])) {
    $num = $_POST['number'];
    $arr = str_split($num);
    echo implode(' + ', $arr);
    $sum = 0;
    foreach ($arr as $value) {
        $sum += $value;
    }

    echo " = {$sum}";
}
?>
</body>
</html>
