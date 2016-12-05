<?php

$tris = [];
$threes = array_chunk(explode("\n", trim(file_get_contents('input'))), 3);
foreach ($threes as $three) {
    for ($col = 0; $col < 3; $col++) {
        $tri = [];
        foreach ($three as $line) {
            $line = preg_split('/\s+/', trim($line));
            $tri[] = $line[$col];
        }
        $tris[] = $tri;
    }
}

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
