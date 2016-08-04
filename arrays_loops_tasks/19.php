<?php
$arr = array('Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье');
$day = (date("N") - 1); // текущий день

foreach ($arr as $key => $value) {
    if ($day == $key) {
        echo '<i>' . $value . '</i><br>';
    } else {
        echo $value . '<br>';
    }
}
?>