<?php

$instructions = explode("\n", trim(file_get_contents('input')));

$numpad = [
    [ 1, 4, 7 ],
    [ 2, 5, 8 ],
    [ 3, 6, 9 ],
];

/*
   0 1 2
 0 1 2 3
 1 4 5 6
 2 7 8 9
 */
foreach ($instructions as $instruction) {
    $coord = [1, 1]; // 5
    foreach (str_split($instruction) as $dir) {
        move($coord, $dir);
    }
    echo $numpad[$coord[0]][$coord[1]];
}
echo "\n";

function move(&$coord, $dir) {
    if ($dir === 'U' && $coord[1] >= 1) {
        $coord[1] -= 1;
    } else if ($dir === 'D' && $coord[1] <= 1) {
        $coord[1] += 1;
    } else if ($dir === 'L' && $coord[0] >= 1) {
        $coord[0] -= 1;
    } else if ($dir === 'R' && $coord[0] <= 1) {
        $coord[0] += 1;
    }
}
