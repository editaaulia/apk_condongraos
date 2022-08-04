<?php
session_start();
include 'koneksi.php';

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
                    <li class="drop-down"><a href="menu.php">MENU RAOS</a></li>
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

                </ul>
            </nav>

            </div>
    </header>
<br/><br/><br/><br/><br/><br/><br/>

            <?php
                $data_pembeli=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM checkout ORDER BY idcheckout DESC"));
                $iduser=$_SESSION['pelanggan']['iduser'];
                $ambil=mysqli_query($kon, "SELECT * FROM user WHERE iduser='$iduser'");
                $pecah=mysqli_fetch_array($ambil);

                $proses=mysqli_real_escape_string($kon, @$_GET['proses']);
                if($proses=="checkout"){
                
                    $hapus=mysqli_query($kon, "UPDATE pesanan set status='Confirmed' WHERE iduser='$iduser'");
                    if($hapus){
                        echo "<script>alert('Pesanan sudah dimasukkan ke status pembayaran di profile'); </script>";
                        echo "<script>location='index.php'; </script>";
                    }

                }
            ?>

<div class="main-content12">
    <div class="wrapper12">
            <h1>Detail Pesanan yang anda beli :</h1>
            <br /><br />

            <table class="table12">
		<tr>
			<th><b>No</b></th>
			<th><b>Nama Produk</b></th>
			<th><b>Harga Satuan</b></th>
			<th><b>QTY</b></th>
            <th><b>Subtotal</b></th>
			
		</tr>
        <?php
            $i=1;
            $totalakhir=0;

            $daftarbeli=mysqli_query($kon, "SELECT * FROM pesanan a LEFT JOIN produk b ON a.idproduk=b.idproduk WHERE iduser='$iduser' AND status='Cart'");
            $fotobarang=mysqli_query($kon, "SELECT gambar FROM pesanan a LEFT JOIN produk b ON a.idproduk=b.idproduk WHERE iduser='$iduser' AND status='Cart'");
            while($daftarbeli1=mysqli_fetch_array($daftarbeli)){
                $fotobarang1=mysqli_fetch_array($fotobarang);
        ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $daftarbeli1['namaproduk']; ?></td>
			<td><?php echo $daftarbeli1['harga']; ?></td>
            <td><?php echo $daftarbeli1['jumlah']; ?></td>
            <td><?php echo number_format($daftarbeli1['subtotal'],2); ?></td>
		</tr>
        <?php
            $totalakhir+=$daftarbeli1['subtotal'];
            $i=$i+1; }
        ?>

        <?php
            $ongkir=mysqli_query($kon, "SELECT * FROM ongkir");
            $ongkirkota=mysqli_fetch_array($ongkir);
        ?>

        <tr>
			<td> </td>
			<td> </td>
			<td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KOTA & ONGKIR</b></td>
            <td><b><?php echo $ongkirkota['kota']?></b></td>
            <td><b><?php echo $ongkirkota['ongkir']?></b></td>
		</tr>
        
        <?php 
            $totalakhirongkir = $totalakhir + $ongkirkota['ongkir'];
        ?>

        <tr>
			<td> </td>
			<td> </td>
			<td><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TOTAL HARGA</b></td>
            <td> </td>
            <td><b><?php echo number_format($totalakhirongkir,2); ?></b></td>
		</tr>
		
	</table>

    <form method="post" action="?proses=checkout">
        <button class="btn btn-success btn-md mt-5" type="submit" name="Proses Checkout">Pembayaran</button>   
    </form>

    </body>
</html>