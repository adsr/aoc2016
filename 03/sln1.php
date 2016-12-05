<?php

$tris = array_map(function($line) {
    return array_map('intval', preg_split('/\s+/', trim($line)));
}, explode("\n", trim(file_get_contents('input'))));

$possible = 0;

foreach ($tris as $tri) {
    $good = true;
    for ($s = 0; $s < 3; $s++) {
        for ($a = 0; $a < 3; $a++) {
            for ($b = 0; $b < 3; $b++) {
                if ($s !== $a && $s !== $b && $a !== $b) {
                    if ($tri[$a] + $tri[$b] <= $tri[$s]) {
                        $good = false;
                        break 3;
                    }
                }
            }
        }
    }
    $possible += $good ? 1 : 0;
}

echo "$possible\n";
