<?php

$file = fopen($fileName, 'r');
if (!$file) {
    echo 'File not found: ' . $fileName;
    die();
}
return $file;