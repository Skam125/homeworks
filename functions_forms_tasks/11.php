<?php

/* functions */

function bigFirstLetterEn($str) // не работает с русским языком
{
    $arr = explode('. ', $str);

    foreach ($arr as $key => $value) { //удаляет пустые елементы массива
        if (empty($value)) {
            unset($arr[$key]);
        }
    }

    foreach ($arr as $key => $value) {
        $arr[$key] = ucfirst(mb_strtolower($value . '.')); // Большие первые буквы и точки в конце
    }

    $result = implode(' ', $arr);
    return $result;
}




function bigFirstLetterRu($str) // работает с русским языком
{
    $arr = explode('. ', $str);

    foreach ($arr as $key => $value) { //удаляет пустые елементы массива
        if (empty($value)) {
            unset($arr[$key]);
        }
    }

    foreach ($arr as $key => $value) {

        $firstLetter = mb_strtoupper(mb_substr($value, 0, 1), 'UTF-8');
        $otherLetters = mb_substr($value, 1);
        $arr[$key] = $firstLetter . $otherLetters . '.';
    }

    $result = implode(' ', $arr);
    return $result;
}

/* logic */
$someEnText = 'russian language is bad. very bad. ';
echo '<pre>';
print_r(bigFirstLetterEn($someEnText));
echo '</pre>';

$someText = 'а Васька слушает да ест. а воз и ныне там. а вы друзья как ни садитесь, все в музыканты не годитесь. а король-то — голый. а ларчик просто открывался. а там хоть трава не расти. ';

echo '<pre>';
print_r(bigFirstLetterRu($someText));
echo '</pre>';


