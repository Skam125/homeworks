<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <title>28</title>
</head>
<body>


<form action="28.php" method="post">
    <label for="i">Введите количество строк</label>
    <input type="number" name="i" id="i" min="1" required>
    <label for="j">Введите количество столбцов</label>
    <input type="number" name="j" id="j" min="1" required>
    <input type="submit" name="submit">
</form>


<?php
if (isset($_POST['i']) && isset($_POST['j'])) {

    $cols = $_POST['i'];
    $rows = $_POST['j'];

    echo '<table border="1">';

    for ($i = 1; $i <= $cols; $i++) {
        echo '<tr>';
        for ($j = 1; $j <= $rows; $j++) {
            if ($i == 1 || $j == 1) {
                echo '<td style="color: black; background-color: lightskyblue; width: 20px; height: 20px; text-align: center;">' . $i * $j . '</td>';
            } else {
                echo '<td style="width: 20px; height: 20px; text-align: center;">' . $i * $j . '</td>';
            }

        }
        echo '</tr>';
    }

    echo '</table>';
}
?>
</body>
</html>


