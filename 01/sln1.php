<?php

$instructions = explode(', ', trim(file_get_contents('input')));
//print_r($instructions);

$coord = [0, 0];
$dir = 'N';

foreach ($instructions as $i) {
    $turn = substr($i, 0, 1);
    $walk = (int)substr($i, 1);
    //echo "at {$coord[0]},{$coord[1]} facing {$dir}, turn {$turn} and walk {$walk}\n";
    $dir = turn($dir, $turn);
    if ($dir === 'E' || $dir === 'W') {
        $coord_i = 0;
        $walk_sign = $dir === 'E' ? 1 : -1;
    } else {
        $coord_i = 1;
        $walk_sign = $dir === 'N' ? 1 : -1;
    }
    $coord[$coord_i] += $walk * $walk_sign;
}

$dist = abs($coord[0]) + abs($coord[1]);
echo "$dist\n";

function turn($dir, $turn) {
    if ($turn === 'R') {
        if ($dir === 'N') return 'E';
        else if ($dir === 'E') return 'S';
        else if ($dir === 'S') return 'W';
        else return 'N';
    } else {
        if ($dir === 'N') return 'W';
        else if ($dir === 'W') return 'S';
        else if ($dir === 'S') return 'E';
        else return 'N';
    }
}
