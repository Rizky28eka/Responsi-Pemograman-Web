<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="my-4">Keranjang Belanja</h1>

        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Kategori</th> <!-- Tambah kolom kategori -->
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                <tr>
                    <td><img src="<?php echo $item['foto']; ?>" alt="<?php echo $item['nama']; ?>"
                            style="width: 100px;"></td>
                    <td><?php echo $item['nama']; ?></td>
                    <td>Rp. <?php echo $item['harga']; ?></td>
                    <td><?php echo ucfirst($item['category']); ?></td> <!-- Menampilkan kategori -->
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
        <p>Keranjang belanja kosong.</p>
        <?php endif; ?>

        <a href="index.php" class="btn btn-primary">Lanjutkan Belanja</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>