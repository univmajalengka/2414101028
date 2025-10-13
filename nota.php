<?php
session_start();
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$tanggal = $_POST['tanggal'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nota Pemesanan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Nota Pemesanan Jus Buah Segar</h2>
<p><b>Nama:</b> <?= $nama ?></p>
<p><b>No HP:</b> <?= $hp ?></p>
<p><b>Tanggal Kunjungan:</b> <?= $tanggal ?></p>
<hr>
<table>
<tr><th>Produk</th><th>Jumlah</th><th>Total</th></tr>
<?php
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $subtotal = $item['harga'] * $item['jumlah'];
    $total += $subtotal;
    echo "<tr><td>{$item['nama']}</td><td>{$item['jumlah']}</td><td>Rp " . number_format($subtotal,0,',','.') . "</td></tr>";
}
?>
</table>
<h3>Total Bayar: Rp <?= number_format($total, 0, ',', '.') ?></h3>
<button onclick="window.print()">🖨 Cetak Nota</button>
</body>
</html>

<?php session_destroy(); ?>
