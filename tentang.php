<?php
session_start();
include "koneksi.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Condong Raos</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/condongraos.JPG" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
        <div class="container d-flex">
            <div class="contact-info mr-auto">
                <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">info@condongraos.com</a>
                <i class="icofont-phone"></i> 0813 14385253
            </div>
            <div class="social-links">
                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
            </div>
        </div>
    </div>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="index.php">CONDONG RAOS</a></h1>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="index.php">BERANDA</a></li>
                    <li><a href="tentang.php">TENTANG KAMI</a></li>
                    <li><a href="menu.php">MENU RAOS</a>
                    </li>
                    <li><a href="kontak.php">HUBUNGI KAMI</a></li>
                    <?php if (isset($_SESSION['pelanggan'])) : ?>
                        <li class="drop-down"><a href=#">PROFILE</a>
                            <ul>
                                <li><a href="#">Status Pembayaran</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li><a href="login.php">MASUK</a></li>
                    <?php endif ?>
                    <li><a href="pesanan.php"><img src="assets/img/shopping-cart24.png" style="height: 20px;"></a></li>
                </ul>
            </nav>
            <!-- .nav-menu -->

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= About Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>TENTANG </h1>
            </br>
            </br>
        </div>
    </section>
    </br>
    </br>
    <!--about-->
    <section class="about">
        <div class="container">
            <p><img src="assets/img/condongraos.jpg" width="300" height="200" style="float:left; margin:0px 28px 20px 0px;" /><b> Rumah Makan Condong Raos </b> mempersembahkan menu yang spesial untuk memuaskan kecintaan Anda terhadap kuliner Indonesia khususnya
                masakan Sunda. Kami menggunakan bumbu-bumbu pilihan dan segar, sehingga menghasilkan rasa yang lezat dan original. Disamping itu juga, kami sangat peduli tentang kebersihan tempat, masakan dan peralatan masak yang kami gunakan. Kami menawarkan
                harga murah dan terjangkau untuk menu-menu yang kami sajikan, sehingga tidak akan menguras kantong Anda. </br>
                </br>
                Kami akan terus berinovasi untuk mengembangkan Rumah Makan Condong Raos, untuk memenuhi selera kuliner pelanggan kami terhormat. Alhamdulillah berkat rahmat Allah Subhanahu wa ta'ala, usaha Rumah Makan kami berjalan dengan baik. Selamat datang dan selamat
                menikmati cita rasa masakan Sunda di Rumah Makan kami. Kami akan terus berinovasi untuk mengembangkan Rumah Makan Condong Raos, untuk memenuhi selera kuliner pelanggan kami terhormat. Alhamdulillah berkat rahmat Allah Subhanahu wa ta'ala,
                usaha Rumah Makan kami berjalan dengan baik. Selamat datang dan selamat menikmati cita rasa masakan Sunda di Rumah Makan kami.</br>
                </br>
                Salam Raos............</p>
        </div>
    </section>


    <!-- End Hero -->


    <!-- End Contact Section -->

    </main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer>
        <div class="container">
            <h4>CONDONG RAOS - MASAKAN SUNDA</h4>
            <h5>Lezat | Higienis | Murah | Pelayanan Ramah</h5>
            <small>Copyright &copy; 2021 - EditaAulia. All Rights Reserved.</small>
        </div>
    </footer>
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>