<?php

$handle = \fopen('input.txt', 'rb');

$listOne = $listTwo = [];
while (($line = \fgets($handle)) !== false) {
    $line = \explode("   ", $line);
    $listOne[] = (int)$line[0];
    $listTwo[] = (int)$line[1];
}
\fclose($handle);

\sort($listOne, \SORT_NUMERIC);
\sort($listTwo, \SORT_NUMERIC);

// Part One
$result = 0;
foreach ($listOne as $key => $value) {
    $result += \abs($value - $listTwo[$key]);
}
echo \sprintf("Part one : %d\n", $result);

// Part Two
$occurence = \array_count_values($listTwo);

$result = 0;
foreach ($listOne as $key => $value) {
    $result += $value * ($occurence[$value] ?? 0);
}

echo \sprintf("Part two : %d\n", $result);
