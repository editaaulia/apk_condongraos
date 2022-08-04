<?php
session_start();
include "koneksi.php";

// mengambil idcheckout dari url
$idcheckout = mysqli_real_escape_string($kon,@$_GET['idcheckout']);
$ambil=mysqli_query($kon,"SELECT * FROM checkout WHERE idcheckout='$idcheckout'");
$pecah=mysqli_fetch_array($ambil);
$ongkir=mysqli_query($kon, "SELECT * FROM ongkir");
$ongkirkota=mysqli_fetch_array($ongkir);

$iduser1=$pecah['iduser'];

$iduser=$_SESSION['pelanggan']['iduser'];
// if($iduser !== $iduser1){
//     echo"<script>alert('Gak boleh ngintip..'); </script>";
//     echo"<script>location='index.php'; </script>";
//     exit();
// }


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

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


<!-- Navbar Section Starts Here -->
<header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="index.php">CONDONG RAOS</a></h1>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="index.php">BERANDA</a></li>
                    <li><a href="tentang.php">TENTANG KAMI</a></li>
                    <li class="drop-down"><a href="menu.php">MENU RAOS</a>
                        <ul>
                            <li><a href="menu.php">MENU</a></li>
                            <li><a href="menupaket.php">PAKET NASI KOTAK</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.php">HUBUNGI KAMI</a></li>
                    <li><a href="pembayaran.php">PEMBAYARAN</a></li>
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

                </ul>
            </nav>

            </div>
    </header>
<br/><br/><br/><br/><br/><br/><br/>

<div class="main-content14">
        <div class="wrapper14">
<div class="row col-md-6">
        <div class="alert alert-info">
            <p>
                <?php $totalakhir = $ongkirkota['ongkir'] + $pecah['subtotal']; ?>
                Total Pembayaran Rp. <?php echo $pecah['subtotal']; ?>
            </p>
        </div>
			<form action="" method="post" enctype="multipart/form-data">
				<label>Atas Nama</label><br>
				<input type="text" class="form-control" name="nama" required><br>

				<label>Bank</label><br>
				<input type="text" class="form-control" name="bank" required><br>

				<label>Jumlah</label><br>
				<input type="number" class="form-control" name="jumlah" required><br>

				<label>Foto Bukti</label><br>
				<input type="file" class="form-control" name="bukti"><br>
                    <p class="text-danger">Foto bukti pembayaran harus JPG/PNG maksimal 3MB </p>

				<button name="kirim" class="btn btn-success">Kirim</button>
			</form>
			</div>
			<div class="row col-md-12"><hr></div>
</div>
</div>

            <?php

                if(isset($_POST['kirim'])){

                    // upload file foto bukti
                    $namabukti=$_FILES["bukti"]["name"];
                    $lokasibukti=$_FILES["bukti"]["tmp_name"];
                    $original=date("YmdHis").$namabukti;
                    move_uploaded_file($lokasibukti, "buktipembayaran/$original");

                    $nama=$_POST['nama'];
                    $bank=$_POST['bank'];
                    $jumlah=$_POST['jumlah'];
                    $tanggal= date("Y-m-d");

                    $simpan=mysqli_query($kon,"INSERT INTO pembayaran(idcheckout,nama,bank,jumlah,tanggal_bayar,bukti_foto) 
                    VALUES ('$idcheckout','$nama','$bank','$jumlah','$tanggal','$original')");

                    $update=mysqli_query($kon,"UPDATE checkout SET status_pembelian='Complete' WHERE idcheckout='$idcheckout'");
                    
                    echo"<script>alert('Terima Kasih sudah mengirimkan Bukti Pembayaran'); </script>";
                    echo"<script>location='index.php'; </script>";
                }

            ?>

            </body>
</html>