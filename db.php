<?php
$host = 'localhost';
$dbname = 'gudang_dan_penjualan';
$username = 'root'; // Ganti sesuai username Anda
$password = '';     // Ganti sesuai password Anda

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>