<?php

$arr = array('Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
    'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь');
$month = (date("m") - 1); // текущий месяц

foreach ($arr as $key => $value) {
    if ($month == $key) {
        echo '<b>' . $value . '</b><br>';
    } else {
        echo $value . '<br>';
    }
}

?>
