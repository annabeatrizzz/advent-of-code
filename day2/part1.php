<?php

$safeReports = 0;
$fileName = __DIR__ . '/input.txt';
$file = require(__DIR__ . '/../functions/openFile.php');

while (($line = fgets($file)) !== false) {
    $ascending = false;
    $descending = false;
    $report = explode (' ', $line);

    $diff = $report[1] - $report[0];

    if ($diff >= 1 && $diff <= 3) {
        $ascending = true;
    } else if ($diff <= -1 && $diff >= -3) {
        $descending = true;
    } else {
        continue;
    }

    for($i=1; $i<count($report)-1; $i++) {
        $diff = $report[$i+1] - $report[$i];

        if ($ascending && ($diff < 1 || $diff > 3)) {
            break;
        }

        if ($descending && ($diff > -1 || $diff < -3)) {
            break;
        }

        if ($i === count($report)-2) {
            $safeReports++;
        }
    }

}
echo 'There are ' . $safeReports . ' safe reports';
fclose($file);