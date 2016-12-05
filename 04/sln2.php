<?php

$lines = explode("\n", trim(file_get_contents('input')));
$sum = 0;
foreach ($lines as $line) {
    $parts = explode('-', $line);
    $sector_and_cksum = array_pop($parts);
    list($sector, $cksum) = explode('[', $sector_and_cksum, 2);
    $sector = (int)$sector;
    $cksum = substr($cksum, 0, -1);
    $tally = [];
    foreach ($parts as $part) {
        foreach (str_split($part) as $lett) {
            $tally[$lett] = ($tally[$lett] ?? 0) + 1;
        }
    }
    uksort($tally, function($a, $b) use ($tally) {
        $v = $tally[$b] <=> $tally[$a];
        if ($v === 0) {
            return strcmp($a, $b);
        }
        return $v;
    });
    $tally = array_slice($tally, 0, 5);
    $tally = implode('', array_keys($tally));
    if ($cksum === $tally) {
        $ename = implode(' ', $parts);
        $name = '';
        foreach (str_split($ename) as $lett) {
            $name .= $lett === ' ' ? ' ' : rotN($lett, $sector);
        }
        echo "$name $sector\n";
    }
}

function rotN($lett, $n) {
    $lett = ord($lett) - ord('a');
    return chr(ord('a') + (($lett + $n) % 26));
}
