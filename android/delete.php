<?php
include '../koneksi.php';

session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../index.php"); // Redirect ke halaman login jika belum login
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Menghapus data dari database
    $sql = "DELETE FROM androids WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>