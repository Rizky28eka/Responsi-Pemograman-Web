<?php
session_start();

// Siapkan respons JSON
header('Content-Type: application/json');

// Periksa apakah pengguna sudah login
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    echo json_encode(array('logged_in' => true));
} else {
    echo json_encode(array('logged_in' => false));
}
?>