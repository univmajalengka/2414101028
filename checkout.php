<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Isi Data Pembelian</h2>
    <form action="nota.php" method="POST">
        <label>Nama Pemesan</label>
        <input type="text" name="nama" required><br>
        <label>Nomor HP</label>
        <input type="text" name="hp" required><br>
        <label>Tanggal Kunjungan</label>
        <input type="date" name="tanggal" required><br>
        <button type="submit">Cetak Nota</button>
    </form>
</body>
</html>
