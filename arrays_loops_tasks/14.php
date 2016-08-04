<?php
$e = 2;
$arr = array(4, 2, 5, 19, 13, 0, 10);
foreach ($arr as $value) {
    if ($value == $e) {
        $yes = 'Есть!';
        echo $yes;
    }
}
if (!isset($yes)) {
    echo 'Нет!';
}
?>