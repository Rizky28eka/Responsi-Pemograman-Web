<?php
include 'koneksi.php'; // Sertakan file koneksi.php untuk menghubungkan ke database

// Tangkap data yang dikirimkan dari form register
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validasi password
if ($password != $confirm_password) {
    die("Password dan konfirmasi password tidak cocok");
}

// Enkripsi password menggunakan bcrypt
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Query untuk memasukkan data ke dalam tabel users
$sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Registrasi berhasil";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); // Tutup koneksi
?>