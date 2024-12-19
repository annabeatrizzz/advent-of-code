<?php

//echo 'DAY 7 PART 1';

function checkResult(array $values, int $result, array $operators): bool
{
    $total = $values[0];
    $size = count($values) - 1;

    for ($j = 0; $j < $size; $j++) {
        if ($operators[$j] === '0') {
            $total += $values[$j + 1];
        } else {
            $total *= $values[$j + 1];
        }
    }

    return $total === $result;
}

function updateOperators(int $num, int $qttyOperators): array
{
    $num = decbin($num);
    $str = str_pad($num, $qttyOperators, 0,  STR_PAD_LEFT);
    return str_split($str);
}

function addAndMultiply(array $values, int $result): bool
{
    $qttyOperators = count($values) - 1;
    $repeat = pow(2, $qttyOperators);

    for ($i = 0; $i < $repeat; $i++) {
        $operators = updateOperators($i, $qttyOperators);
        if (checkResult($values, $result, $operators)) {
            return true;
        }
    }

    return false;
}

$solution = 0;
$fileName = __DIR__ . '/input.txt';
$file = require(__DIR__ . '/../functions/openFile.php');

while (($line = fgets($file)) !== false) {
    $result = (int)substr($line, 0, strpos($line, ':'));
    $values = explode(' ', substr($line, strpos($line, ':') + 2));

    if (addAndMultiply($values, $result)) {
        $solution += $result;
    }
}

fclose($file);
var_dump($solution);