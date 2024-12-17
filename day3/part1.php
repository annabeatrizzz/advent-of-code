<?php

$result = 0;
$memory = '';
$fileName = __DIR__ . '/input.txt';
$file = require (__DIR__ . '/../functions/openFile.php');
while (($line = fgets($file)) !== false) {
    $memory .= $line;
}
fclose($file);

while($start = strpos($memory, 'mul')) {
    if (strpos(substr($memory, $start+3), 'mul')) {
        $next = strpos(substr($memory, $start+3), 'mul') + 3;
    } else {
        $next = strlen($memory);
    }

    $current = substr($memory, $start, $next);
    if (preg_match('/mul\(\d+,\d+\)/', $current)) {
        $end = strpos($current, ')');
        $values = substr($current, 4, $end-4);
        [$num1, $num2] = explode(',', $values);
        $result += $num1 * $num2;
    }

    $memory = substr($memory, $start+3);
}

echo 'TOTAL = ' . $result;