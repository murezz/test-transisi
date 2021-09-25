<?php

$nilai = "72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86";
$split_nilai = explode(' ', $nilai);
$array_nilai = array();
foreach ($split_nilai as $n) {
    array_push($array_nilai, (int)$n);
}
// nilai rata - rata
$average = array_sum($array_nilai) / count($array_nilai);
echo "Nilai rata-rata adalah = " . $average . "<br>";

// 7 nilai tertinggi
rsort($array_nilai);
$max = array_slice($array_nilai, 0, 7);
echo "7 Nilai tertinggi adalah = ";
foreach ($max as $mx) {
    echo $mx . " ";
}
echo "<br>";

// 7 nilai terendah
sort($array_nilai);
$min = array_slice($array_nilai, 0, 7);
echo "7 nilai terendah adalah = ";
foreach ($min as $mn) {
    echo $mn . " ";
}
echo "\n";
