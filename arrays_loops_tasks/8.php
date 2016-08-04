<?php
$arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9);
foreach ($arr as $value) {
    echo $value;
}

echo '<br>';

$c = 0;
while ($c < count($arr)) {
    echo $arr[$c];
    $c++;
}

echo '<br>';

for ($i = 0; $i < count($arr); $i++) {
    echo $arr[$i];
}
?>
