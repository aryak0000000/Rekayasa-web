<?php
// Koneksi ke database
$connect = mysqli_connect("localhost", "root", "", "json");

// tes koneksi
if (mysqli_connect_errno()) {
    echo json_encode(["error" => "Koneksi database gagal: " . mysqli_connect_error()]);
    exit;
}

// Query data
$sql = "SELECT * FROM wisata";
$result = mysqli_query($connect, $sql);

// Mengetes hasil query
if (!$result) {
    echo json_encode(["error" => "Query gagal: " . mysqli_error($connect)]);
    exit;
}

// Ambil data ke array
$json_array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $json_array[] = $row;
}

// Tutup koneksi
mysqli_close($connect);

// Set header agar output dikenali sebagai JSON
header('Content-Type: application/json');

// Tampilkan hasil JSON
echo json_encode($json_array, JSON_PRETTY_PRINT);
