<?php

$arr = array();
$num = 10; //количество елементов в массиве
for ($i = 0; $i <= $num; $i++) {
    $arr[] = rand(0, 9);
}

echo "<pre>";
print_r($arr);
echo "<pre>";

$min = min($arr); //минимальное значение в массиве
$max = max($arr);

$keyMin = array_search($min, $arr); //поиск ключа значения в массиве
$keyMax = array_search($max, $arr);

$arr[$keyMin] = $max;
$arr[$keyMax] = $min;

echo '<pre>';
print_r($arr);
echo "<pre>";
?>

