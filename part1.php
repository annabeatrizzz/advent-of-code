<?php

//echo 'DAY 9 PART 1';

function stepOne(string $line): array
{
    $counter = 0;
    $partOne = [];

    $array = str_split($line);
    foreach ($array as $index => $number) {
        if ($index % 2 === 0) {
            for ($i = 0; $i < $number; $i++) {
                $partOne [] = $counter;
            }
            $counter++;
        } else {
            for ($i = 0; $i < $number; $i++) {
                $partOne [] = '.';
            }
        }
    }
    return $partOne;
}

function stepTwo(array $array): array
{
    $start = 0;
    $size = count($array)-1;
    $end = $size;

    while ($start < $end) {
        if($array[$start] === '.') {
            while ($array[$end] === '.' && $end > 0 && $end > $start) {
                $end--;
            }
            $array[$start] = $array[$end];
            $array[$end] = '.';
        }

        $start++;
    }

    return $array;
}

function stepThree(array $array): int
{
    $result = 0;
    foreach ($array as $index => $value) {
        if ($value === '.') {
            return $result;
        }
        $result += $index * $value;
    }
    return $result;
}

$solution = 0;
$stepTwo = [];
$stepThree = [];
$fileName = __DIR__ . '/input.txt';
$file = require(__DIR__ . '/../functions/openFile.php');

while (($line = fgets($file)) !== false) {
    $stepOne = stepOne($line);
    $stepTwo = stepTwo($stepOne);
    $solution = stepThree($stepTwo);
}

fclose($file);
var_dump('ANSWER: ' . $solution);


//PART 1
//transform 12345 into 0..111....22222

//read number by number from the line

//array = resultPart1
//if EVEN
    //transform into the index
    //create a loop with X iterations
    //add index
    //and increment index++;
//if ODD
    //create a loop with X iterations
    //add .

//PART 2
//transform 0..111....22222 (= resultPart1) into 022111222...... (= resultPart2)

//have a currentPointer (starts at 0) and endPointer (starts at the last index)
//increment currentPointer until we get to an index where we find "."
//decrease endPointer until we get to an index where we find a number
//change places of them


//iterate over resultPart1 and check
//have a currentEndPos = starts at the end and goes decrementing whenever the number is repositioned OR if find a .
//if .
//get from the currentEndPos and move it to the currentPos (**change positions**)


//PART 3
//SUM pos*val = (0*0) + (1*2) + (2*2) + (3*1) + (4*1) + (5*1) + (6*2) ... + (0*0) + (0*0) + (0*0) + (0*0) + (0*0) + (0*0) + (0*0) + (0*0)

//iterate over resultPart2
//$result += (pos*value)