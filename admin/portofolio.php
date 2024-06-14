<?php
session_start();
if ($_SESSION['status'] != "sudah_login") {
  header("location:../../index.html");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Sport Car</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/css/main.css" rel="stylesheet">

</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="#" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">Sports Car</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="admin.php">Beranda</a></li>
          <li><a href="" data-bs-toggle="modal" data-bs-target="#tentang">Tentang Saya</a></li>
          <li><a href="portofolio.php" class="active">Portfolio</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" style="background-color: red;" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">LogOut</a>

    </div>
  </header>

  <!-- Modal Keluar -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">LogOut Admin</h5>
        </div>
        <div class="modal-body">
          <center>
            <p>Apakah Anda Ingin Keluar ?</p>
          </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <a href="action/proses_logout.php" class="btn btn-danger">Ya</a>
        </div>
      </div>
    </div>
  </div>

  <main class="main">

    <!-- Header -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="zoom-out">
            <h1><?php echo htmlspecialchars($_SESSION['nama']); ?></h1>
            <p><?php echo htmlspecialchars($_SESSION['email']); ?></p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="background-color: red;">Logout</a>
              <a href="https://youtu.be/D7tit_JZKvk" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
            <img src="../assets/img/logoheader.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section>
    <!-- /Header -->
     
    <section class="about section">
      <div class="container section-title" data-aos="fade-up">
        <h2>Tabel Portofolio</h2>
        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambahporto">Tambah Portofolio</button>
        </div>
      </div>
      <div class="container">
        <?php
        include "action/koneksi.php";
        $query = "SELECT * FROM portofolio ORDER BY id ASC";
        $result = mysqli_query($koneksi, $query);
        if (!$result) {
          die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        }
        $no = 1;
        ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <th scope="row"><?php echo $no++; ?></th>
                <td><?php echo htmlspecialchars($row['nama']); ?></td>
                <td><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="">Info</button>
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#update<?php echo $row['id']; ?>">Edit</button>
                <?php include "modal/portofolio/update.php"; ?>
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="">Hapus</button></td>
              
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </section>
  </main>
  <?php
  include "modal/portofolio/tambah.php";
  include "modal/portofolio/update.php";
  include "modal/portofolio/delete.php";
  include "modal/tentang.php";
  ?>
  

  <footer id="footer" class="footer">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">Sports Car</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Gedung Sports Car</p>
            <p>Indonesia, Medan</p>
            <p class="mt-3"><strong>Phone:</strong> <span>08xxxxxxx</span></p>
            <p><strong>Email:</strong> <span>sportscar@gmail.com</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Beranda</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#about">Tentang Kami</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#portfolio">Portofolio</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#team">Member</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Follow Kami</h4>
          <p>Follow Kami Dengan Sosmed Dibawah Ini</p>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Rino Ariansyah</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by Rino Ariansyah
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="../assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>