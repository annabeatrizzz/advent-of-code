<?php

$list1 = [];
$list2 = [];
$result = 0;
$fileName = __DIR__ . '/input.txt';
$file = require(__DIR__ . '/../functions/openFile.php');
while (($line = fgets($file)) !== false) {
    list($num1, $num2) = explode ('   ', $line);
    $list1[] = (int)$num1;
    $list2[] = (int)$num2;
}
fclose($file);

$arrayOfValues = array_count_values($list2);

foreach ($list1 as $number) {
    if (array_key_exists($number, $arrayOfValues)) {
        $result += $number * $arrayOfValues[$number];
    }
}

var_dump($result);