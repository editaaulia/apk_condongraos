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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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

 <!--about-->
    <br>
    <br>
 <section class="contact-section">
<div class="container-contact">
<div class="d-none d-sm-block mb-5 pb-4">
</div>
<div class="row">
<div class="col-12">
<h2 class="contact-title">Hubungi kami</h2>
</div>
</br>
    </br>
    </br>
    
<div class="col-lg-8">
<iframe 
src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.986179714841!2d106.83437831384201!3d-6.395782064332899!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ebd49f788a97%3A0x417587207e5b8ca7!2sRm%20condong%20raos!5e0!3m2!1sen!2sus!4v1626145504459!5m2!1sen!2sus" width="700" 
height="500" frameborder="0" 
style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>

<div class="col-lg-3 offset-lg-1">
<div class="media contact-info">
<div class="iconcontact"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
<div class="media-body">
<h3>Alamat Kami</h3>
<p>Jln. Sentosa Raya No. 14C <br>Sukmajaya, Depok<br> (Depan Kantor Pos)<p>
</div>
</div>


<div class="media contact-info">
<div class="iconcontact"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
<div class="media-body">
<h3>Jam Operasional</h3>
<p>Senin-Minggu <br> 09:00 WIB - 23:00 WIB</p>
</div>
</div>

<div class="media contact-info">
<div class="iconcontact"><i class="fa fa-phone" aria-hidden="true"></i></div>
<div class="media-body">
<h3>Kontak Kami</h3>
<p>Telepon: 0813 14385253
<br>
Email: info@condongraos.com</p>
</div>
</div>
</div>
</div>
</div>
</section> 