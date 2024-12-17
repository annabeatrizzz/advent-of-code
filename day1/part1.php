<?php

$list1 = [];
$list2 = [];
$return = 0;
$fileName = __DIR__ . '/input.txt';
$file = require(__DIR__ . '/../functions/openFile.php');
while (($line = fgets($file)) !== false) {
    list($num1, $num2) = explode ('   ', $line);
    $list1[] = (int)$num1;
    $list2[] = (int)$num2;
}
fclose($file);

sort($list1);
sort($list2);

$size = count($list1);
for ($i = 0; $i < $size; $i++) {
    $return += abs($list1[$i] - $list2[$i]);
}

echo 'The result is ' . $return;