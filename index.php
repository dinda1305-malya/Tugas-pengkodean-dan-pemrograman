<?php
include 'db.php';

// Query untuk mengambil data produk
$query = "SELECT * FROM produk";
$stmt = $conn->prepare($query);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gudang dan Penjualan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Daftar Produk</h1>
    <a href="tambah_produk.php">Tambah Produk Baru</a>

    <table>
        <thead>
            <tr>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Satuan</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['id_produk']) ?></td>
                    <td><?= htmlspecialchars($product['nama_produk']) ?></td>
                    <td><?= htmlspecialchars($product['harga_beli']) ?></td>
                    <td><?= htmlspecialchars($product['harga_jual']) ?></td>
                    <td><?= htmlspecialchars($product['satuan']) ?></td>
                    <td><?= htmlspecialchars($product['deskripsi']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>