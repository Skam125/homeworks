<?php
$arr = array('Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье');
foreach ($arr as $key => $value) {
    if ($key == 5 || $key == 6) {
        echo "<b>{$value}</b><br>";
    } else {
        echo "{$value}<br>";

    }
}
?>