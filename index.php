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
                                <li><a href="pembayaran.php">Status Pembayaran</a></li>
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

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container" data-aos="zoom-out" data-aos-delay="100">
            <h1>CODONG RAOS </h1>
            </br>
            </br>
            <h2> MASAKAN SUNDA - LEZAT - HIGIENIS - TERJANGKAU</h2>
        </div>
    </section>
    </br>
    </br>
    <!--about-->
    <section class="menurekomend">
        <div class="container">
            <h3>- MENU REKOMENDASI -</h3>
            <p>Kami mempersembahkan menu yang spesial untuk memuaskan kecintaan Anda terhadap kuliner Indonesia khususnya <strong>Masakan Sunda</strong>. Kami menggunakan bumbu-bumbu pilihan dan segar, sehingga menghasilkan rasa yang lezat dan original.
                Disamping itu juga, kami sangat peduli tentang kebersihan tempat, masakan dan peralatan masak yang kami gunakan. Kami menawarkan harga murah dan terjangkau untuk menu-menu yang kami sajikan, sehingga tidak akan menguras kantong Anda.</p>
        </div>
    </section>

    <!--MENU REKOMENDASI-->
    <section class="menurekomendasi">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="single-box">
                        <div class="img-area"><img src="assets/img/ikanasinkipas.JPG" alt=""></div>
                        <div class="img-text">
                            <h2>IKAN ASIN KIPAS BALADO/PORSI</h2>
                            <p>Rp. 7.000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-box">
                        <div class="img-area"><img src="assets/img/jengkolbalado.JPG" alt=""></div>
                        <div class="img-text">
                            <h2>JENGKOL BALADO/PORSI</h2>
                            <p>Rp. 7.000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-box">
                        <div class="img-area"><img src="assets/img/pepesikan.JPG" alt=""></div>
                        <div class="img-text">
                            <h2>PEPES IKAN</h2>
                            <p>Rp. 15.000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-box">
                        <div class="img-area"><img src="assets/img/guramegorengpecak.JPG" alt=""></div>
                        <div class="img-text">
                            <h2>GURAME GORENG PECAK</h2>
                            <p>Rp. 35.000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-box">
                        <div class="img-area"><img src="assets/img/lele.JPG" alt=""></div>
                        <div class="img-text">
                            <h2>LELE GORENG/PESMOL</h2>
                            <p>Rp. 9.000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-box">
                        <div class="img-area"><img src="assets/img/ayambakar.JPG" alt=""></div>
                        <div class="img-text">
                            <h2>AYAM BAKAR</h2>
                            <p>Rp. 13.000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-box">
                        <div class="img-area"><img src="assets/img/gepuk.JPG" alt=""></div>
                        <div class="img-text">
                            <h2>GEPUK DAGING</h2>
                            <p>Rp. 15.000</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="single-box">
                        <div class="img-area"><img src="assets/img/udangbalado.JPG" alt=""></div>
                        <div class="img-text">
                            <h2>UDANG BALADO/PORSI</h2>
                            <p>Rp. 10.000</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="lihatmenu">
        <a href="menu.php">-- Lihat Daftar Menu Lengkap --</a>
    </div>
    </br>
    </br>

    <!-- End Hero -->


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="zoom-in">
            <h3 class="text-center">- TESTIMONI PELANGGAN -</h3>
            </br>
            <div class="owl-carousel testimonials-carousel">
                <div class="testimonial-item">
                    <img src="assets/img/testimonials/testimonials-6.jpg" class="testimonial-img" alt="">
                    <h3>Ahmad</h3>
                    <h4>Pegawai Swasta</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Makanan nya enakk dan harga nya terjangkauu... cocok buat kantong mahasiswa
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item">
                    <img src="assets/img/testimonials/testimonials-7.jpg" class="testimonial-img" alt="">
                    <h3>Ida Fajrilia</h3>
                    <h4>Ibu Rumah Tangga</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Rasanya cocok dilidah sayaa.. cumi balado nya mantapp
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item">
                    <img src="assets/img/testimonials/testimonials-7.jpg" class="testimonial-img" alt="">
                    <h3>Ira Susanti</h3>
                    <h4>Pegawai Swasta</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Jenis makanannya banyakk banget dan enakk semuanyaaa!! deket kantor jugaa, setiap makan siang pasti kesinii..
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

                <div class="testimonial-item">
                    <img src="assets/img/testimonials/testimonials-6.jpg" class="testimonial-img" alt="">
                    <h3>Muhamad Zaidan</h3>
                    <h4>Mahasiswa</h4>
                    <p>
                        <i class="bx bxs-quote-alt-left quote-icon-left"></i> Makanan nya enakk dan harga nya terjangkauu... cocok buat kantong mahasiswa
                        <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                    </p>
                </div>

            </div>

        </div>
    </section>
    <!-- End Testimonials Section -->
    </br>
    </br>
    </br>
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
            <h3>- INFORMASI KONTAK -</h3>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-6">
                    <div class="info-box mb-4">
                        <i class="bx bx-map"></i>
                        <h3>ALAMAT KAMI</h3>
                        <p>Jln. Sentosa Raya No. 399 Sukmajaya, Depok - Jawa Barat (Depan Kantor Pos)</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-clock"></i>
                        <h3>JAM OPERASIONAL</h3>
                        <p>
                            <P>Senin-Minggu: 09:00 WIB - 23:00 WIB Hari Minggu Pada Minggu Pertama Awal Bulan Libur</P>
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="info-box  mb-4">
                        <i class="bx bx-phone-call"></i>
                        <h3>KONTAK KAMI</h3>
                        <p>Telepon: 0813 14385253</p>
                        <p>Email: info@condongraos.com</p>
                    </div>
                </div>

            </div>

            <section class="lokasi">


            <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.986179714841!2d106.83437831384201!3d-6.395782064332899!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ebd49f788a97%3A0x417587207e5b8ca7!2sRm%20condong%20raos!5e0!3m2!1sen!2sus!4v1626145504459!5m2!1sen!2sus"
                    width="1100" height="500" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

            </section>
    </section>
    </br>
    </br>
    </br>
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