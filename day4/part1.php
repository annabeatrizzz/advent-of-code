<?php

//echo 'DAY 4 PART 1';

$counter = 0;
$numLines = 0;
$fileName = __DIR__ . '/input.txt';
$file = require (__DIR__ . '/../functions/openFile.php');

while (($line = fgets($file)) !== false) {
    $maxColumn = strlen($line);
    for ($j=0; $j<$maxColumn; $j++) {
        $puzzle[$numLines][$j] = $line[$j];
    }
    $numLines++;
}
fclose($file);

for($i=0; $i<$numLines+1; $i++) {
    $numColumns = 141;
    for($j=0; $j<$numColumns; $j++) {

        //XMAS horizontal
        if($j+3<$numColumns && $puzzle[$i][$j] === 'X' && $puzzle[$i][$j+1] === 'M' && $puzzle[$i][$j+2] === 'A' && $puzzle[$i][$j+3] === 'S') {
            $counter++;
            //echo 'xmas horizontal ';
        }

        //SAMX horizontal
        if($j+3<$numColumns && $puzzle[$i][$j] === 'S' && $puzzle[$i][$j+1] === 'A' && $puzzle[$i][$j+2] === 'M' && $puzzle[$i][$j+3] === 'X') {
            //echo 'samx horizontal ';
            $counter++;
        }

        //XMAS vertical
        if($i+3<$numLines && $puzzle[$i][$j] === 'X' && $puzzle[$i+1][$j] === 'M' && $puzzle[$i+2][$j] === 'A' && $puzzle[$i+3][$j] === 'S') {
            $counter++;
            //echo 'xmas vertical ';
        }

        //SAMX vertical
        if($i+3<$numLines && $puzzle[$i][$j] === 'S' && $puzzle[$i+1][$j] === 'A' && $puzzle[$i+2][$j] === 'M' && $puzzle[$i+3][$j] === 'X') {
            $counter++;
            //echo 'samx vertical ';
        }

        //XMAS diagonal
        if($i+3<$numLines && $j+3<$numColumns && $puzzle[$i][$j] === 'X' && $puzzle[$i+1][$j+1] === 'M' && $puzzle[$i+2][$j+2] === 'A' && $puzzle[$i+3][$j+3] === 'S') {
            $counter++;
            //echo 'xmas diagonal ';
        }

        //SAMX diagonal
        if($i+3<$numLines && $j+3<$numColumns && $puzzle[$i][$j] === 'S' && $puzzle[$i+1][$j+1] === 'A' && $puzzle[$i+2][$j+2] === 'M' && $puzzle[$i+3][$j+3] === 'X') {
            //echo 'smax diagonal ';
            $counter++;
        }

        //XMAS diagonal backward
        if($i+3<$numLines && $j+3<$numColumns && $puzzle[$i][$j+3] === 'X' && $puzzle[$i+1][$j+2] === 'M' && $puzzle[$i+2][$j+1] === 'A' && $puzzle[$i+3][$j] === 'S') {
            $counter++;
            //echo 'xmas diagonal inverted ';
        }

        //SAMX diagonal backward
        if($i+3<$numLines && $j+3<$numColumns && $puzzle[$i][$j+3] === 'S' && $puzzle[$i+1][$j+2] === 'A' && $puzzle[$i+2][$j+1] === 'M' && $puzzle[$i+3][$j] === 'X') {
            //echo 'smax diagonal inverted ';
            $counter++;
        }
    }
}

var_dump($counter);