<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Jus Buah Segar</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <h2>🍹 Jus Buah Segar</h2>
        <button onclick="window.location.href='cart.php'">🛒 Keranjang (<?php echo count($_SESSION['cart']); ?>)</button>
    </nav>

    <!-- Jumbotron -->
    <section class="jumbotron">
        <h1>Selamat Datang di Jus Buah Segar!</h1>
        <p>Segarkan harimu dengan jus buah alami penuh vitamin dan rasa nikmat.</p>
    </section>

    <!-- Kategori -->
    <div class="kategori">
        <button onclick="filterKategori('semua')">Semua</button>
        <button onclick="filterKategori('mangga')">Mangga</button>
        <button onclick="filterKategori('alpukat')">Alpukat</button>
        <button onclick="filterKategori('jeruk')">Jeruk</button>
    </div>

    <!-- Card Produk -->
    <div class="produk-container">
        <?php
        $produk = [
            ["id"=>1, "nama"=>"Jus Mangga", "harga"=>15000, "kategori"=>"mangga", "gambar"=>"img/jusmangga.jpg"],
            ["id"=>2, "nama"=>"Jus Alpukat", "harga"=>18000, "kategori"=>"alpukat", "gambar"=>''],
            ["id"=>3, "nama"=>"Jus Jeruk", "harga"=>12000, "kategori"=>"jeruk", "gambar"=>"img/jusjeruk.jpg"],
        ];

        foreach ($produk as $p) {
            echo "
            <div class='card' data-kategori='{$p['kategori']}'>
                <img src='{$p['gambar']}' alt='{$p['nama']}'>
                <h3>{$p['nama']}</h3>
                <p>Rp " . number_format($p['harga'], 0, ',', '.') . "</p>
                <form method='POST' action='cart.php'>
                    <input type='hidden' name='id' value='{$p['id']}'>
                    <input type='hidden' name='nama' value='{$p['nama']}'>
                    <input type='hidden' name='harga' value='{$p['harga']}'>
                    <button type='submit' name='tambah'>Tambah ke Keranjang</button>
                    <button type='submit' name='beli'>Beli Sekarang</button>
                </form>
            </div>";
        }
        ?>
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2025 Jus Buah Segar | Dibuat dengan cinta 💚</p>
    </footer>
</body>
</html>
