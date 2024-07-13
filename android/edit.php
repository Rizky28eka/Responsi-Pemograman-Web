<?php
include '../koneksi.php';

session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../index.php"); // Redirect ke halaman login jika belum login
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data berdasarkan ID
    $sql = "SELECT * FROM androids WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found.";
        exit();
    }
} else {
    echo "Invalid request.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center justify-content-center vh-100 bg-light">

    <main class="form-signin w-50 p-4 border rounded-3 bg-white">
        <form method="POST" action="update.php">
            <h1 class="h3 mb-3 fw-normal text-center">Edit Data</h1>
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />

            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="nama"
                    value="<?php echo $row['nama']; ?>" required>
                <label for="floatingInput">Nama</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="harga"
                    value="<?php echo $row['harga']; ?>" required>
                <label for="floatingInput">Harga</label>
            </div>
            <div class="form-floating mb-3">
                <textarea type="text" class="form-control" id="floatingInput" name="spek"
                    required><?php echo $row['spek']; ?></textarea>
                <label for="floatingInput">Deksripsi</label>
            </div>
            <div class="form-floating mb-3">
                <textarea type="text" class="form-control" id="floatingInput" name="foto"
                    required><?php echo $row['foto']; ?></textarea>
                <label for="floatingInput">Link Image Address</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary mb-2" type="submit">Edit</button>
            <a class="w-100 btn btn-lg btn-danger" href='index.php'>Kembali</a>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>