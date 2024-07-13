<?php
include '../koneksi.php'; // Menghubungkan ke file koneksi.php yang berisi koneksi ke database

session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../index.php"); // Redirect ke halaman login jika belum login
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama']; // Menyimpan nilai dari input 'nama' yang dikirim melalui POST
    $harga = $_POST['harga']; // Menyimpan nilai dari input 'harga' yang dikirim melalui POST
    $spek = $_POST['spek']; // Menyimpan nilai dari input 'spek' yang dikirim melalui POST
    $foto = $_POST['foto']; // Menyimpan nilai dari input 'foto' yang dikirim melalui POST

    $sql = "INSERT INTO iphones (nama, harga, spek, foto) VALUES ('$nama', '$harga', '$spek', '$foto')"; // Query SQL untuk memasukkan data ke tabel 'iphones'

    if ($conn->query($sql) === TRUE) { // Menjalankan query dan mengecek keberhasilannya
        header("Location: index.php"); // Redirect ke halaman index.php jika query berhasil
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error; // Menampilkan pesan error jika query tidak berhasil dieksekusi
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Tambah Data</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center justify-content-center vh-100 bg-light">

 <main class="form-signin w-50 p-4 border rounded-3 bg-white">
  <form method="POST" action="">
   <h1 class="h3 mb-3 fw-normal text-center">Tambah Data</h1>

   <div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingInput" name="nama" required>
    <label for="floatingInput">Nama</label>
   </div>
   <div class="form-floating mb-3">
    <input type="text" class="form-control" id="floatingInput" name="harga" required>
    <label for="floatingInput">Harga</label>
   </div>
   <div class="form-floating mb-3">
    <textarea type="text" class="form-control" id="floatingInput" name="spek" required></textarea>
    <label for="floatingInput">Deksripsi</label>
   </div>
   <div class="form-floating mb-3">
    <textarea type="text" class="form-control" id="floatingInput" name="foto" required></textarea>
    <label for="floatingInput">Link Image Address</label>
   </div>

   <button class="w-100 btn btn-lg btn-primary mb-2" type="submit">Tambah</button>
   <a class="w-100 btn btn-lg btn-danger" href='index.php'>Kembali</a>
  </form>
 </main>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>