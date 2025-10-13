<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['tambah'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    // Tambah ke keranjang
    $_SESSION['cart'][$id] = [
        "nama" => $nama,
        "harga" => $harga,
        "jumlah" => ($_SESSION['cart'][$id]['jumlah'] ?? 0) + 1
    ];
}

if (isset($_POST['kurang'])) {
    $id = $_POST['id'];
    if ($_SESSION['cart'][$id]['jumlah'] > 1) {
        $_SESSION['cart'][$id]['jumlah']--;
    } else {
        unset($_SESSION['cart'][$id]);
    }
}

if (isset($_POST['hapus'])) {
    unset($_SESSION['cart'][$_POST['id']]);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang - Jus Buah Segar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
    <h2>🍹 Jus Buah Segar</h2>
    <button onclick="window.location.href='index.php'">⬅ Kembali</button>
</nav>

<h2>Keranjang Belanja</h2>
<table>
    <tr><th>Produk</th><th>Harga</th><th>Jumlah</th><th>Total</th><th>Aksi</th></tr>
    <?php
    $grandTotal = 0;
    foreach ($_SESSION['cart'] as $id => $item) {
        $total = $item['harga'] * $item['jumlah'];
        $grandTotal += $total;
        echo "
        <tr>
            <td>{$item['nama']}</td>
            <td>Rp " . number_format($item['harga'],0,',','.') . "</td>
            <td>
                <form method='POST' style='display:inline;'>
                    <input type='hidden' name='id' value='$id'>
                    <button name='kurang'>-</button>
                </form>
                {$item['jumlah']}
                <form method='POST' style='display:inline;'>
                    <input type='hidden' name='id' value='$id'>
                    <button name='tambah'>+</button>
                </form>
            </td>
            <td>Rp " . number_format($total,0,',','.') . "</td>
            <td>
                <form method='POST'>
                    <input type='hidden' name='id' value='$id'>
                    <button name='hapus'>Hapus</button>
                </form>
            </td>
        </tr>";
    }
    ?>
</table>

<h3>Total Belanja: Rp <?= number_format($grandTotal, 0, ',', '.') ?></h3>

<form action="checkout.php" method="POST">
    <button type="submit" <?= $grandTotal == 0 ? 'disabled' : '' ?>>Lanjut ke Pembayaran</button>
</form>

</body>
</html>
