<?php
$array = array(26, 17, 136, 12, 79, 15);
$result = 0;
foreach ($array as $value){
    $result += pow($value, 2);
}
echo "26*26 + 17*17 + 136*136 + 12*12 + 79*79 + 15*15 = {$result}";
?>


