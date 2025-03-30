<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_produk = $_POST['nama_produk'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $satuan = $_POST['satuan'];
    $deskripsi = $_POST['deskripsi'];

    // Query untuk menyimpan data produk
    $query = "INSERT INTO produk (nama_produk, harga_beli, harga_jual, satuan, deskripsi)
              VALUES (:nama_produk, :harga_beli, :harga_jual, :satuan, :deskripsi)";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':nama_produk', $nama_produk);
    $stmt->bindParam(':harga_beli', $harga_beli);
    $stmt->bindParam(':harga_jual', $harga_jual);
    $stmt->bindParam(':satuan', $satuan);
    $stmt->bindParam(':deskripsi', $deskripsi);

    if ($stmt->execute()) {
        header('Location: index.php');
        exit;
    } else {
        echo "Gagal menambahkan produk.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tambah Produk Baru</h1>
    <form method="POST">
        <label for="nama_produk">Nama Produk:</label>
        <input type="text" id="nama_produk" name="nama_produk" required>

        <label for="harga_beli">Harga Beli:</label>
        <input type="number" step="0.01" id="harga_beli" name="harga_beli" required>

        <label for="harga_jual">Harga Jual:</label>
        <input type="number" step="0.01" id="harga_jual" name="harga_jual" required>

        <label for="satuan">Satuan:</label>
        <input type="text" id="satuan" name="satuan" required>

        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi"></textarea>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>