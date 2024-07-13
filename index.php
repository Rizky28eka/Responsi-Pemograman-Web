<?php
include 'koneksi.php';

$sql = "SELECT id, nama, harga, spek, foto FROM iphones"; // Replace with your actual table name and columns
$iphones = $conn->query($sql);

$sql2 = "SELECT id, nama, harga, spek, foto FROM androids"; // Replace with your actual table name and columns
$androids = $conn->query($sql2);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1" />
 <meta name="description" content="" />
 <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors" />
 <meta name="generator" content="Hugo 0.122.0" />
 <title>Mobile Shop</title>

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
 <!-- Bagian utama halaman dengan background hitam dan margin bawah -->
 <main class="bg-black mb-5">
  <!-- Container untuk mengatur lebar konten dan tata letak -->
  <div class="container">
   <!-- Header dengan kelas flexbox untuk penyusunan elemen -->
   <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
    <!-- Bagian logo di sisi kiri -->
    <div class="col-md-3 mb-2 mb-md-0">
     <!-- Link yang mengarah ke halaman utama dengan logo -->
     <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
      <img src="assets/logo.png" alt="logo" />
     </a>
    </div>

    <!-- Navigasi utama dengan tautan -->
    <ul class="nav nav-pills col-12 col-md-auto mb-2 justify-content-center mb-md-0">
     <!-- Item navigasi Home dengan link aktif -->
     <li class="nav-item">
      <a href="index.php" class="nav-link px-2 active" aria-current="page">Home</a>
     </li>
     <!-- Item navigasi Android -->
     <li>
      <a href="android.php" class="nav-link px-2">Android</a>
     </li>
     <!-- Item navigasi Iphone -->
     <li>
      <a href="iphone.php" class="nav-link px-2">Iphone</a>
     </li>
     <!-- Item navigasi Keranjang -->
     <li>
      <a href="cart.php" class="nav-link px-2">Keranjang</a>
     </li>
     <!-- Item navigasi Dashboard -->
     <li>
      <a href="androids/" id="dashboard" class="nav-link px-2">Dashboard</a>
     </li>
    </ul>

    <!-- Bagian login dan register di sisi kanan -->
    <div class="col-md-3 text-end d-flex">
     <!-- Tautan untuk login -->
     <a href="login2.php" class="btn btn-outline-primary me-2" id="loginButton">
      Login
     </a>
     <!-- Tautan untuk register -->
     <a href="register2.php" class="btn btn-primary regmodal" id="registerButton">
      Register
     </a>
    </div>
   </header>
  </div>
 </main>

 <div class="container text-center mb-5">
  <div class="row gap-3 mb-3">
   <?php
        $counter = 0; // Inisialisasi counter

        // Pastikan variabel objek hasil query benar
        if ($androids->num_rows > 0) {
            while ($row = $androids->fetch_assoc()) {
                if ($counter < 3) { // Batasi hanya tampilkan maksimal 3 data
                    echo "
                    <div class='col'>
                        <a href='product_detail_android.php?id={$row['id']}' class='text-decoration-none text-dark'>
                            <img src='" . $row["foto"] . "' alt='{$row['nama']}' class='w-100' />
                            <p class='text-start fs-5 mb-0'>{$row['nama']}</p>
                            <h2 class='text-start fs-4'>Rp. {$row['harga']}</h2>
                        </a>
                    </div>
                    ";
                    $counter++; // Tambahkan counter setiap kali data ditampilkan
                } else {
                    break; // Berhenti jika sudah mencapai 3 data
                }
            }
        } else {
            echo "<div class='col-12'><p class='text-center fs-6 mt-4'>Tidak ada data</p></div>";
        }

        // Pastikan koneksi ditutup setelah penggunaan query
        $androids->free_result(); // Bebaskan hasil query
        ?>
  </div>
 </div>

 <div class="container d-flex flex-column justify-content-center align-items-center" style="
        background-image: url('assets/parallax1.jpg');
        height: 700px;
        background-size: cover;
        background-repeat: no-repeat;
      ">
  <h1 class="text-uppercase" style="font-size: 82px; font-weight: 700">
   Deal of the day
  </h1>
  <button type="button" class="btn btn-outline-light 700 btn-lg text-secondary">
   Shop Now
  </button>
 </div>

 <div class="container text-center my-5">
  <div class="row gap-3 mb-3">
   <?php
        $counter = 0; // Inisialisasi counter

        // Pastikan variabel objek hasil query benar
        if ($iphones->num_rows > 0) {
            while ($row = $iphones->fetch_assoc()) {
                if ($counter < 3) { // Batasi hanya tampilkan maksimal 3 data
                    echo "
                    <div class='col'>
                        <a href='product_detail_iphone.php?id={$row['id']}' class='text-decoration-none text-dark'>
                            <img src='" . $row["foto"] . "' alt='{$row['nama']}' class='w-100' />
                            <p class='text-start fs-5 mb-0'>{$row['nama']}</p>
                            <h2 class='text-start fs-4'>Rp. {$row['harga']}</h2>
                        </a>
                    </div>
                    ";
                    $counter++; // Tambahkan counter setiap kali data ditampilkan
                } else {
                    break; // Berhenti jika sudah mencapai 3 data
                }
            }
        } else {
            echo "<div class='col-12'><p class='text-center fs-6 mt-4'>Tidak ada data</p></div>";
        }

        // Pastikan koneksi ditutup setelah penggunaan query
        $iphones->free_result(); // Bebaskan hasil query
        ?>
  </div>
 </div>

 <div class="container" style="background-color: #262626">
  <div class="stylercon">
   <img src="assets/logo.png" class="img-responsive" alt="logo" />
   <br />
   <span style="font-size: 30px; text-align: center; color: white">Mshop</span><br /><br />
  </div>

  <div class="stylermsg">
   <p style="text-align: center; color: white">
    Our phenomenal layouts and visionary UI design guarantee an
    exceptional mobile shopping experience.
   </p>
  </div>

  <div class="footercontent">
   <div class="row">
    <div class="col-sm-4 im">
     <img src="assets/f1.jpg" class="w-100" alt="img-responsive" />
     <div class="caption2">
      <b>Our phenomenal layouts and visionary UI design guarantee an
       exceptional mobile shopping experience.</b><br /><br />
      <p style="font-size: 15px"></p>

      <p style="font-size: 16px">15 / 10 / 2014</p>
     </div>
    </div>

    <div class="col-sm-4 im">
     <img src="assets/f2.jpg" class="w-100" alt="img-responsive" />
     <div class="caption2">
      <b>Our phenomenal layouts and visionary UI design guarantee an
       exceptional mobile shopping experience.</b><br /><br />
      <p style="font-size: 15px"></p>

      <p style="font-size: 16px">15 / 10 / 2014</p>
     </div>
    </div>

    <div class="col-sm-4 im">
     <img src="assets/f3.jpg" class="w-100" alt="img-responsive" />
     <div class="caption2">
      <b>Our phenomenal layouts and visionary UI design guarantee an
       exceptional mobile shopping experience.</b><br /><br />
      <p style="font-size: 15px"></p>

      <p style="font-size: 16px">15 / 10 / 2014</p>
     </div>
    </div>
   </div>
   <div class="line2"></div>

   <div class="row">
    <div class="col-sm-3">
     <h3 style="color: white">Information</h3>
     <div class="vm">
      <ul>
       <li><a href="#">Special</a></li>
       <li><a href="#">New Products</a></li>
       <li><a href="#">Top Sellers</a></li>
       <li><a href="#">Our Stores</a></li>
       <li><a href="#">Contact Us</a></li>
       <li><a href="#">Page Configuration</a></li>
       <li><a href="#">Sitemap</a></li>
      </ul>
     </div>
    </div>

    <div class="col-sm-3">
     <h3 style="color: white">My Account</h3>
     <div class="vm">
      <ul>
       <li><a href="#">My Orders</a></li>
       <li><a href="#">My Merchandise</a></li>
       <li><a href="#">Returns</a></li>
       <li><a href="#">My Credit Slips</a></li>
       <li><a href="#">My Addresses</a></li>
       <li><a href="#">My Personal Info</a></li>
      </ul>
     </div>
    </div>

    <div class="col-sm-3">
     <h3 style="color: white">Catagories</h3>
     <div class="vm">
      <ul>
       <li><a href="#">Iphone</a></li>
       <li><a href="#">Samsung</a></li>
       <li><a href="#">HTC</a></li>
       <li><a href="#">Symphony</a></li>
       <li><a href="#">Walton</a></li>
       <li><a href="#">Nexux</a></li>
      </ul>
     </div>
    </div>

    <div class="col-sm-3">
     <h3 style="color: white">Newsletter</h3>

     <form action="index.php" name="form" method="post">
      <div class="news">
       <input type="email" placeholder="Enter Email" size="6" />
      </div>
      <div class="sub">
       <button type="submit" aria-label="Submit">
        <i class="bi bi-envelope-fill"> </i>
       </button>
      </div>
     </form>
     <div class="cl">
      <a class="social" href="#" aria-label="Facebook">
       <i class="bi bi-facebook"></i>
      </a>
      <a class="social" href="#" aria-label="Twitter">
       <i class="bi bi-twitter"></i>
      </a>
      <a class="social" href="#" aria-label="Google">
       <i class="bi bi-linkedin"></i>
      </a>
     </div>
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
     <form id="registerForm" action="register.php" method="post">
      <div class="mb-3">
       <label for="registerUsername" class="form-label">Username</label>
       <input type="text" class="form-control" id="registerUsername" name="username" required />
      </div>
      <div class="mb-3">
       <label for="registerPassword" class="form-label">Password</label>
       <input type="password" class="form-control" id="registerPassword" name="password" required />
      </div>
      <div class="mb-3">
       <label for="registerConfirmPassword" class="form-label">Confirm Password</label>
       <input type="password" class="form-control" id="registerConfirmPassword" name="confirm_password" required />
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
     </form>
    </div>
   </div>
  </div>
 </div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
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