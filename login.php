<?php
include 'koneksi.php'; // Sertakan file koneksi.php untuk menghubungkan ke database

session_start(); // Pastikan session_start() ada di bagian atas

// Ambil data dari formulir login
$username = $_POST['username'];
$password = $_POST['password'];

// Lakukan validasi data (misalnya, periksa apakah username dan password tidak kosong)
if (empty($username) || empty($password)) {
    http_response_code(400); // Bad request
    echo "Username dan password harus diisi";
    exit();
}

// Lakukan query untuk mencari user berdasarkan username dengan prepared statements
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    // User ditemukan, periksa password
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        // Password cocok, login berhasil
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username; // Simpan username di sesi jika perlu

        // Redirect ke halaman lain setelah login berhasil
        echo "Login berhasil";
        exit();
    } else {
        // Password tidak cocok
        http_response_code(401); // Unauthorized
        echo "Password salah";
        exit();
    }
} else {
    // User tidak ditemukan
    http_response_code(404); // Not found
    echo "User tidak ditemukan";
    exit();
}

// Tutup koneksi database
$stmt->close();
$conn->close();
?>