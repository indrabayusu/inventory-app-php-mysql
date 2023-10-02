<?php
// Pastikan Anda sudah memasukkan koneksi ke database di sini
require 'function.php';

// Query untuk mengambil data stok keluar dari database dan mengurutkannya berdasarkan bulan
$query = "SELECT MONTHNAME(tanggal) AS bulan, SUM(qty) AS jumlah FROM keluar GROUP BY bulan ORDER BY DATE_FORMAT(tanggal, '%m')";

$result = mysqli_query($conn, $query);

// Inisialisasi array untuk menyimpan data
$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data['labels'][] = $row['bulan'];
    $data['values'][] = (int)$row['jumlah'];
}

// Mengembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
