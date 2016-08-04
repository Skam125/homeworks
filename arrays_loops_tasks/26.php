<?php
$arr = array();
$comp = 1;
for ($i = 0; $i <= 4; $i++) {
    $arr[] = rand(1, 100);
}
echo 'В массиве все елементы больше 0';
echo '<pre>';
print_r($arr);
echo '</pre>';

foreach ($arr as $key => $value) {
    if ($value > 0 && $key % 2 == 0) {
        $comp *= $value;
    }
}

echo 'Произведение парных елементов: ' . $comp . '<br>';
echo 'Непарные елементы: ';

foreach ($arr as $key => $value) {
    if ($value > 0 && $key % 2 != 0) {
        echo $value . ' ';
    }
}
?>