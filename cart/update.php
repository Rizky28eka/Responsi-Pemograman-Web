<?php
include '../koneksi.php'; // Menghubungkan ke file koneksi.php yang berisi koneksi ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; // Mengambil nilai dari input 'id' yang dikirim melalui POST
    $nama = $_POST['nama']; // Mengambil nilai dari input 'nama' yang dikirim melalui POST
    $harga = $_POST['harga']; // Mengambil nilai dari input 'harga' yang dikirim melalui POST
    $spek = $_POST['spek']; // Mengambil nilai dari input 'spek' yang dikirim melalui POST

    // Mengupdate data di tabel 'iphones' berdasarkan 'id'
    $sql = "UPDATE iphones SET nama='$nama', harga='$harga', spek='$spek' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) { // Menjalankan query update dan memeriksa keberhasilannya
        header("Location: index.php"); // Redirect ke halaman index.php jika update berhasil
        exit();
    } else {
        echo "Error updating record: " . $conn->error; // Menampilkan pesan error jika update gagal
    }
}

$conn->close(); // Menutup koneksi database setelah selesai
?>