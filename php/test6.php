<?php

$arr = [
    ['f', 'g', 'h', 'i'],
    ['j', 'k', 'p', 'q'],
    ['r', 's', 't', 'u']
];

function cari($array, $text)
{
    $text = strtolower($text);
    $textCount    = strlen($text);

    $status = [];
    foreach ($array as $a) {
        for ($i = 0; $i < $textCount; $i++) {
            if (in_array($text[$i], $a)) {
                $status[] = true;
            } else {
                $status[] = false;
            }
        }
    }

    print_r(in_array(true, $status) ? "true" : "false");
}

cari($arr, 'fghi');     // true
cari($arr, 'fghp');        // true
cari($arr, 'fjrstp');    // true
