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
    <?php
        $iduser=$_SESSION['pelanggan']['iduser'];
        $ambil=mysqli_query($kon, "SELECT * FROM user WHERE iduser='$iduser'");
        $pecah=mysqli_fetch_array($ambil);
  
    ?>

    <?php 
            $proses=mysqli_real_escape_string($kon, @$_GET['proses']);
            $nama=mysqli_real_escape_string($kon, @$_POST['nama']);
            $notelp=mysqli_real_escape_string($kon, @$_POST['notelp']);
            $waktu_pengiriman=mysqli_real_escape_string($kon, @$_POST['waktu_pengiriman']);
            $alamat_pengiriman=mysqli_real_escape_string($kon, @$_POST['alamat_pengiriman']);
            $subtotal=mysqli_real_escape_string($kon, $_POST['totalakhir']);
            $tgl_checkout=date("Y-m-d");
                
            // Mengambil data nama produk, harga dari tabel produk
            $daftarbeli=mysqli_query($kon, "SELECT * FROM pesanan a LEFT JOIN produk b ON a.idproduk=b.idproduk WHERE iduser='$iduser'");
            $produk=mysqli_fetch_array($daftarbeli);
            $namabuku= $produk['namaproduk'];
            $harga= $produk['harga'];
            $jumlah=$produk['jumlah'];
            $idpesanproduk=$produk['idpesanproduk'];
            
            
            // $pesanproduk=mysqli_query($kon, "UPDATE pembelian SET idpesanproduk = '$idpesanproduk' WHERE idpembelianproduk = '$idpembelianproduk'");
             if($proses=="checkout"){
                $simpan=mysqli_query($kon,"INSERT INTO checkout(idpesanproduk,iduser,nama,waktu_pengiriman,notelp,alamat_pengiriman,subtotal,tgl_checkout)
                VALUES ('$idpesanproduk','$pecah[iduser]','$nama','$waktu_pengiriman','$notelp','$alamat_pengiriman','$subtotal','$tgl_checkout')");
                    if($simpan){
                        echo "<script>alert('Terima Kasih sudah memesan makanan di toko kami'); </script>";
                        echo "<script>location='success.php'; </script>";
                    }else{
                        echo "<script>alert('Pembelian Anda Gagal'); </script>";
                    }
            }

    ?>

<!-- Navbar Section Starts Here -->
<header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="index.php">CONDONG RAOS</a></h1>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="index.php">BERANDA</a></li>
                    <li><a href="tentang.php">TENTANG KAMI</a></li>
                    <li class="menu.php"><a href="menu.php">MENU RAOS</a></li>
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

            </div>
    </header>
    <?php
            $i=1;
            $totalakhir=0;
            $daftarbeli=mysqli_query($kon, "SELECT * FROM pesanan a LEFT JOIN produk b ON a.idproduk=b.idproduk WHERE iduser='$iduser' AND status='Cart'");
            $fotobarang=mysqli_query($kon, "SELECT gambar FROM pesanan a LEFT JOIN produk b ON a.idproduk=b.idproduk WHERE iduser='$iduser' AND status='Cart'");
            while($daftarbeli1=mysqli_fetch_array($daftarbeli)){
                $fotobarang1=mysqli_fetch_array($fotobarang);
    
    ?>

    <?php 
        $totalakhir+=$daftarbeli1['subtotal'];
        $i=$i+1; }
    ?>

<?php
         $ongkir=mysqli_query($kon, "SELECT * FROM ongkir");
         $ongkirkota=mysqli_fetch_array($ongkir);
    ?>

<?php 
        $totalakhirongkir = $totalakhir + $ongkirkota['ongkir'];
    ?>

    <!---Data Pembeli--->
<br/><br/><br/><br/><br/>
<div class="DataPembeli">
<div class="wrapper11">
<h4>Pengisian Data Pembeli : </h4>
				<hr>
				 <form action="?proses=checkout" method="post">

                        <label><b>Nama</b></label><br>
						<input type="text" class="form-control" name="nama" ><br>

                        <label><b>Telepon (HP)</b></label><br>
						<input type="text" class="form-control" name="notelp" ><br>

                        <label><b>Waktu Pengiriman</b></label><br>
						<input type="text" class="form-control" name="waktu_pengiriman" ><br>

                        <label><b>Alamat Pembeli</b></label><br>
						<input type="text" class="form-control" name="alamat_pengiriman" ><br>

                        <label><b>Total Belanja</b></label><br>
                        <input type="text" class="form-control" name="subtotal" value="<?php echo number_format($totalakhir,2); ?>">
                        <input type="hidden" class="form-control" name="totalakhir" value="<?php echo number_format($totalakhirongkir,2); ?>">

                        <!-- <select name="kota" required class="form-control">
						</select><br> -->

                        <button class="btn btn-success btn-md mt-5" type="submit" name="Proses Checkout">Pesan</button>
						<!-- <button type="submit" class="btn btn-success btn-md" name="checkout" value="Proses Checkout"> -->
                        <!-- <a class="btn btn-success btn-md"href="?idpesanproduk=<?php echo $produk['idpesanproduk'] ?>&&proses=checkout">Proses</a></td> -->
                    </form>
</div>
</div>
    </body>
</html>