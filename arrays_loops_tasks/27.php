<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <title>27</title>
</head>
<body>


<form action="27.php" method="post">
    <label for="row">Введите количество строк</label>
    <input type="number" name="row" id="row" min="1" required>
    <label for="cols">Введите количество столбцов</label>
    <input type="number" name="cols" id="cols" min="1" required>
    <input type="submit" name="submit">
</form>


<?php

$colors = array('red', 'yellow', 'blue', 'gray', 'maroon', 'brown', 'green');

if (isset($_POST['row']) && isset($_POST['cols'])) {

    $rows = $_POST['row'];
    $cols = $_POST['cols'];

    echo '<table>';

    for ($i = 1; $i <= $cols; $i++) {
        echo '<tr>';
        for ($j = 1; $j <= $rows; $j++) {
            echo '<td style="color: black; background-color:' . "{$colors[rand(0, count($colors)-1)]}" . '; text-align: center;">' . rand(1, 99999) . '</td>';
        }
        echo '</tr>';
    }

    echo '</table>';
}

?>
</body>
</html>



