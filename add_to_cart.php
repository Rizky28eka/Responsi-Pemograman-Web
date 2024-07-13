<?php
session_start();

$data = json_decode(file_get_contents('php://input'), true);
$id = $data['id'] ?? null;
$category = $data['category'] ?? null;

if ($id === null || $category === null) {
    echo json_encode(['success' => false, 'message' => 'ID produk atau kategori tidak ada']);
    exit();
}

include 'koneksi.php';

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Koneksi database gagal: ' . $conn->connect_error]);
    exit();
}

if ($category === 'iphone') {
    $table = 'iphones';
} elseif ($category === 'android') {
    $table = 'androids';
} else {
    echo json_encode(['success' => false, 'message' => 'Kategori produk tidak valid']);
    exit();
}

$sql = "SELECT * FROM $table WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $item = [
        'id' => $row['id'],
        'nama' => $row['nama'],
        'harga' => $row['harga'],
        'foto' => $row['foto'],
        'category' => $category
    ];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    array_push($_SESSION['cart'], $item);

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Produk tidak ditemukan']);
}

$conn->close();
?>