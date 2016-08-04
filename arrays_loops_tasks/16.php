<?php
$arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
$i = 0;
foreach ($arr as $value) {
    if ($value % 3 == 0) {
        echo "{$value} <br>";
    } else {
        echo "{$value}, ";
    }
}
?>