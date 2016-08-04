<?php
$arr = array('green' => 'зеленый', 'red' => 'красный', 'blue' => 'голубой');
$en = array();
$ru = array();
foreach ($arr as $key => $value) {
    $en[] = $key;
    $ru[] = $value;
}
echo '<pre>';
print_r ($ru);
print_r ($en);
echo '</pre>';
?>


