<?php

//echo 'DAY 5 PART 1';

// 47|53
$rules = [];

// 75,47,61,53,29
$updates = [];
$numUpdates = 0;

$result = 0;
$isOrdered = false;

$fileName = __DIR__ . '/input.txt';
$file = require(__DIR__ . '/../functions/openFile.php');

function updateInRightOrder(array $update, int $sizeUpdate, array $rules): bool
{
    for ($i = 0; $i < $sizeUpdate; $i++) {
        foreach ($rules as $rule) {
            if ($rule[0] === $update[$i]) {
                for ($j = $i - 1; $j >= 0; $j--) {
                    if ($update[$j] === $rule[1]) {
                        return false;
                    }
                }
            }
        }
    }
    return true;
}

while (($line = fgets($file)) !== false) {
    $line = trim($line);

    if (preg_match('/\d+\|\d+/', $line)) {
        [$pg1, $pg2] = explode('|', $line);
        $rules[] = [$pg1, $pg2];
    } elseif (empty($line)) {
        continue;
    } else {
        $updates[] = explode(',', $line);
        $numUpdates++;
    }
}
fclose($file);

foreach ($updates as $update) {
    $sizeUpdate = count($update);
    $isOrdered = updateInRightOrder($update, $sizeUpdate, $rules);
    if ($isOrdered) {
        $result += $update[intdiv($sizeUpdate, 2)];
    }
}

var_dump($result);