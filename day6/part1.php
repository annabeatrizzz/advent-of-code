<?php

function up(array &$labMap, int $posX, int $posY): array
{
    while ($labMap[$posY - 1][$posX] !== '#' && $posY - 1 >= -1) {
        $labMap[$posY][$posX] = 'X';
        $posY--;
        $labMap[$posY][$posX] = '>';
    }

    return [$posX, $posY];
}

function down(array &$labMap, int $posX, int $posY, int $numLines): array
{
    while ($labMap[$posY + 1][$posX] !== '#' && $posY + 1 <= $numLines) {
        $labMap[$posY][$posX] = 'X';
        $posY++;
        $labMap[$posY][$posX] = '<';
    }

    return [$posX, $posY];
}

function right(array &$labMap, int $posX, int $posY, int $numColumns): array
{
    while ($labMap[$posY][$posX + 1] !== '#' && $posX + 1 <= $numColumns) {
        $labMap[$posY][$posX] = 'X';
        $posX++;
        $labMap[$posY][$posX] = 'v';
    }

    return [$posX, $posY];
}

function left(array &$labMap, int $posX, int $posY): array
{
    while ($labMap[$posY][$posX - 1] !== '#' && $posX - 1 >= -1) {
        $labMap[$posY][$posX] = 'X';
        $posX--;
        $labMap[$posY][$posX] = '^';
    }

    return [$posX, $posY];
}

function getNumberOfX(array $labMap): int
{
    $counter = 0;
    foreach ($labMap as $line) {
        foreach ($line as $element) {
            if ($element === 'X') {
                $counter++;
            }
        }
    }
    return $counter;
}

$posX = 0;
$posY = 0;
$numColumns = 0;
$numLines = 0;
$labMap = [];

$fileName = __DIR__ . '/input.txt';
$file = require(__DIR__ . '/../functions/openFile.php');

//map from file to array $labMap
while (($line = fgets($file)) !== false) {
    $numColumns = strlen($line);
    for ($j = 0; $j < $numColumns; $j++) {
        $labMap[$numLines][$j] = $line[$j];
        //find posX and posY
        if($line[$j] === "^" || $line[$j] === "v" || $line[$j] === ">" || $line[$j] === "<" ) {
            $posX = $j;
            $posY = $numLines;
        }
    }
    $numLines++;
}

fclose($file);

//while is inside the maze (numColumns and numLines)
while($posX >= 0 && $posX < $numColumns-1 && $posY >= 0 && $posY < $numLines-1) {
    $current = $labMap[$posY][$posX];

    if($current === "^") {
        [$posX, $posY] = up($labMap, $posX, $posY);
    } else if($current === ">") {
        [$posX, $posY] = right($labMap, $posX, $posY, $numColumns);
    } else if($current === "v") {
        [$posX, $posY] = down($labMap, $posX, $posY, $numLines);
    } else if($current === "<") {
        [$posX, $posY] = left($labMap, $posX, $posY);
    }
}
//if ^ UP - if not possible > RIGHT - if not possible v DOWN - if not possible < LEFT
//if > RIGHT - if not possible v DOWN - if not possible < LEFT - if not possible ^ UP
// cycle...
//chose a direction, check if it can go there, if so go and place an X to the previous position
    //if not possible, change direction and try again

var_dump(getNumberOfX($labMap));