<?php
include 'koneksi.php';

// Dapatkan id produk dari URL
$id = $_GET['id'];

// Query untuk mendapatkan detail produk berdasarkan id
$sql = "SELECT * FROM iphones WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama = $row['nama'];
    $harga = $row['harga'];
    $foto = $row['foto'];
    $spek = $row['spek'];
} else {
    echo "<p>Produk tidak ditemukan</p>";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
    <meta name="generator" content="Hugo 0.122.0" />
    <title><?php echo $nama; ?></title>

    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/headers/" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, 0.1);
        border: solid rgba(0, 0, 0, 0.15);
        border-width: 1px 0;
        box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1),
            inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -0.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
        z-index: 1500;
    }

    .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
    }
    </style>

    <!-- Custom styles for this template -->
    <link href="headers.css" rel="stylesheet" />
</head>

<body>
    <main class="bg-black mb-5">
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
                <div class="col-md-3 mb-2 mb-md-0">
                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                        <img src="assets/logo.png" alt="logo" />
                    </a>
                </div>

                <ul class="nav nav-pills col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link px-2">Home</a>
                    </li>
                    <li>
                        <a href="android.php" class="nav-link px-2">Android</a>
                    </li>
                    <li>
                        <a href="iphone.php" class="nav-link px-2 active" aria-current="page">Iphone</a>
                    </li>
                    <li><a href="cart.php" class="nav-link px-2">Keranjang</a></li>
                    <li>
                        <a href="androids/" id="dashboard" class="nav-link px-2">Dashboard</a>
                    </li>
                </ul>

                <div class="col-md-3 text-end d-flex">
                    <button type="button" class="btn btn-outline-primary me-2" data-bs-toggle="modal"
                        data-bs-target="#loginModal" id="loginButton">
                        Login
                    </button>
                    <button type="button" class="btn btn-primary regmodal" data-bs-toggle="modal"
                        data-bs-target="#registerModal" id="registerButton">
                        Register
                    </button>
                </div>
            </header>
        </div>
    </main>

    <div class="container text-center mb-5">
        <div class="row gap-3 mb-3">
            <div class="col text-start">
                <img src="<?php echo $foto; ?>" alt="<?php echo $nama; ?>" class="w-100" />
                <div class="row mb-5">
                    <div class="col">
                        <p class="text-start fs-3 mb-0"><?php echo $nama; ?></p>
                        <h2 class="text-start fs-2 mb-0">Rp. <?php echo $harga; ?></h2>
                    </div>
                    <div class="col d-flex align-items-center justify-content-center">
                        <button type="button" class="btn btn-primary w-100 h-100 fs-4"
                            onclick="addToCart(<?php echo $id; ?>, 'iphone')">
                            Beli
                        </button>
                    </div>
                </div>

                <h1 class="text-center mb-4">Spesifikasi <?php echo $nama; ?></h1>

                <div class="spec-section">
                    <h3>Spesifikasi Teknis</h3>
                    <ul class="spec-list">
                        <?php
                        // Memisahkan spesifikasi berdasarkan baris baru
                        $spek_array = explode("\n", $spek);
                        foreach ($spek_array as $spesifikasi) {
                            echo "<li>$spesifikasi</li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5" style="background-color: #1c1c1c; color: #708888">
        <div class="lastcontent">© 2024 By Mobile Shop</div>
    </div>

    <!-- Login Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="loginModalLabel">Login</h1>
                </div>
                <div class="modal-body">
                    <form id="loginForm">
                        <div class="mb-3">
                            <label for="loginUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="loginUsername" name="username" required />
                        </div>
                        <div class="mb-3">
                            <label for="loginPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="loginPassword" name="password" required />
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="registerModalLabel">Register</h1>
                </div>
                <div class="modal-body">
                    <form id="registerForm">
                        <div class="mb-3">
                            <label for="registerUsername" class="form-label">Username</label>
                            <input type="text" class="form-control" id="registerUsername" name="username" required />
                        </div>
                        <div class="mb-3">
                            <label for="registerPassword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="registerPassword" name="password"
                                required />
                        </div>
                        <div class="mb-3">
                            <label for="registerEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="registerEmail" name="email" required />
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-58NKfEASUhtP10Y3HiWf6VoB5CZNcibIVUUW3dZgl2Ch+GIeJLbBxtkzbM6FCN2d" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-qEcAMpVFsNRl9I9z9ZxPKmF/yz20ebAvT1kecbyKzm7Kz+F9ZG7l+Cu9t72N9vvj" crossorigin="anonymous">
    </script>

    <script>
    function addToCart(id, category) {
        fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    id: id,
                    category: category
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Produk berhasil ditambahkan ke keranjang!');
                } else {
                    alert('Gagal menambahkan produk ke keranjang: ' + data.message);
                }
            })
            .catch((error) => {
                console.error('Error:', error);
            });
    }
    </script>
    <script>
    document
        .querySelectorAll(".btn-outline-primary")
        .forEach(function(button) {
            button.addEventListener("click", function() {
                var myModal = new bootstrap.Modal(
                    document.getElementById("loginModal")
                );
                myModal.show();
            });
        });

    document.querySelectorAll(".regmodal").forEach(function(button) {
        button.addEventListener("click", function() {
            var myModal = new bootstrap.Modal(
                document.getElementById("registerModal")
            );
            myModal.show();
        });
    });

    document
        .getElementById("loginModal")
        .addEventListener("hidden.bs.modal", function() {
            var backdrop = document.querySelector(".modal-backdrop");
            if (backdrop) {
                backdrop.parentNode.removeChild(backdrop);
            }
        });

    document
        .getElementById("registerModal")
        .addEventListener("hidden.bs.modal", function() {
            var backdrop = document.querySelector(".modal-backdrop");
            if (backdrop) {
                backdrop.parentNode.removeChild(backdrop);
            }
        });

    document
        .getElementById("registerForm")
        .addEventListener("submit", function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir secara langsung

            // Kirim data menggunakan fetch API
            fetch("register.php", {
                    method: "POST",
                    body: new FormData(document.getElementById("registerForm")),
                })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Registrasi gagal");
                    }
                    return response.text();
                })
                .then((data) => {
                    // Tampilkan pesan sukses atau redirect ke halaman login
                    alert(data);
                    var registerModal = new bootstrap.Modal(
                        document.getElementById("registerModal")
                    );
                    registerModal.hide(); // Menutup modal
                    document.querySelector(".modal-backdrop").remove(); // Menghapus backdrop
                    window.location.reload(); // Me-refresh halaman
                })
                .catch((error) => {
                    alert(error.message); // Tampilkan pesan error
                });
        });

    document.addEventListener("DOMContentLoaded", function() {
        // Periksa status login saat halaman dimuat
        fetch("check_login_status.php")
            .then((response) => response.json())
            .then((data) => {
                if (data.logged_in) {
                    // Jika sudah login, sembunyikan tombol login dan register
                    document.getElementById("loginButton").style.display = "none";
                    document.getElementById("registerButton").style.display = "none";
                    document.getElementById("dashboard").style.display = "block";
                } else {
                    // Jika belum login, biarkan tombol login dan register tampil
                    document.getElementById("loginButton").style.display =
                        "block"; // Atau sesuaikan dengan tipe tombol Anda
                    document.getElementById("registerButton").style.display = "block";
                    document.getElementById("dashboard").style.display = "none";
                }
            })
            .catch((error) => {
                console.error("Error checking login status:", error);
            });
    });

    document
        .getElementById("loginForm")
        .addEventListener("submit", function(event) {
            event.preventDefault(); // Mencegah pengiriman formulir secara langsung

            var username = document.getElementById("loginUsername").value;
            var password = document.getElementById("loginPassword").value;

            fetch("login.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    body: "username=" +
                        encodeURIComponent(username) +
                        "&password=" +
                        encodeURIComponent(password),
                })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error("Login gagal");
                    }
                    return response.text();
                })
                .then((data) => {
                    alert(data); // Tampilkan pesan sukses atau error
                    // Menghilangkan tombol login dan register
                    document.getElementById("loginButton").style.display = "none";
                    document.getElementById("registerButton").style.display = "none";

                    var loginModal = new bootstrap.Modal(
                        document.getElementById("loginModal")
                    );
                    loginModal.hide(); // Menutup modal
                    document.querySelector(".modal-backdrop").remove(); // Menghapus backdrop
                    window.location.reload(); // Me-refresh halaman
                })
                .catch((error) => {
                    alert(error.message); // Tampilkan pesan error
                    // Contoh: tidak ada pengalihan ke modal pendaftaran di sini
                });
        });
    </script>
</body>

</html>