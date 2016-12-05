<?php

$instructions = explode("\n", trim(file_get_contents('input')));

$numpad = [
    [ 0,   0,   '1',  0,   0  ],
    [ 0,   '2', '3', '4',  0  ],
    [ '5', '6', '7', '8', '9' ],
    [ 0,   'A', 'B', 'C',  0  ],
    [ 0,   0,   'D',  0,   0  ],
];

foreach ($instructions as $instruction) {
    $coord = [2, 0]; // 5
    foreach (str_split($instruction) as $dir) {
        $land = move($numpad, $coord, $dir) ?: $land;
    }
    echo $land;
}
echo "\n";

function move($numpad, &$coord, $dir) {
    if ($dir === 'U' || $dir === 'D') {
        $coord_y = $coord[0] + ($dir === 'U' ? -1 : 1);
        $coord_x = $coord[1];
    } else {
        $coord_y = $coord[0];
        $coord_x = $coord[1] + ($dir === 'L' ? -1 : 1);;
    }
    if (!empty($numpad[$coord_y][$coord_x])) {
        $coord[0] = $coord_y;
        $coord[1] = $coord_x;
        return $numpad[$coord_y][$coord_x];
    }
    return null;
}