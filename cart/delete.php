<?php
include '../koneksi.php'; // Menghubungkan ke file koneksi.php yang berisi koneksi ke database

if (isset($_GET['id'])) {
    $id = $_GET['id']; // Mengambil nilai 'id' dari parameter GET
    
    // Menghapus data dari tabel 'iphones' berdasarkan 'id'
    $sql = "DELETE FROM iphones WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) { // Menjalankan query delete dan memeriksa keberhasilannya
        header("Location: index.php"); // Redirect ke halaman index.php jika delete berhasil
        exit();
    } else {
        echo "Error deleting record: " . $conn->error; // Menampilkan pesan error jika delete gagal
    }
} else {
    echo "Invalid request."; // Menampilkan pesan jika parameter 'id' tidak ada dalam request
}

$conn->close(); // Menutup koneksi database setelah selesai
?>