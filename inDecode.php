<?php
// Buat sebuah variabel array
$dataArray = [
    'nama' => 'Budi Santoso',
    'usia' => 30,
    'kota' => 'Jakarta',
    'hobi' => ['Membaca', 'Coding', 'Hiking']
];

// Encode array ke format JSON
$jsonString = json_encode($dataArray);

echo "--- Array Awal --- \n";
print_r($dataArray);

echo "\n--- JSON Hasil Encode --- \n";
echo $jsonString . "\n";
