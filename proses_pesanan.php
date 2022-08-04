<?php 

session_start();
include 'koneksi.php';
if(!isset($_SESSION['pelanggan'])){
    echo"<script>alert('Silahkan Login Dahulu'); </script>";
    echo"<script>location='login.php'; </script>";
}
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


    <?php
        
        $produk=mysqli_query($kon, "SELECT * FROM produk");
        $iduser=$_SESSION['pelanggan']['iduser'];
        $ambil=mysqli_query($kon,"SELECT * FROM user WHERE iduser='$iduser'");
        $pecah=mysqli_fetch_array($ambil);


    ?>
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

                </ul>
            </nav>
            <!-- .nav-menu -->

        </div>
    </header>
    <!-- End Header -->

    <!--about-->
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    <section class="menuraos">
        <div class="container">
            <h3>- PROSES -</h3>
           <center> <?php 
                $idproduk=mysqli_real_escape_string($kon, @$_GET['idproduk']);
                $iduser= $_SESSION['pelanggan']['iduser'];
                $ambil=mysqli_query($kon,"SELECT * FROM user WHERE iduser='$iduser'");
                $pecah=mysqli_fetch_array($ambil);
                $cekbarang=mysqli_query($kon,"SELECT * FROM pesanan WHERE idproduk='$idproduk' AND status='Cart'");
                $cekbarang1=mysqli_fetch_array($cekbarang);
                $cekbarang2=mysqli_num_rows($cekbarang);
                
                $produk=mysqli_fetch_array(mysqli_query($kon,"SELECT * FROM produk WHERE idproduk='$idproduk'"));
                
                if($cekbarang2==0){
                    $simpan=mysqli_query($kon, "INSERT INTO pesanan(idproduk,iduser,jumlah,harga,subtotal) VALUES ('$produk[idproduk]','$pecah[iduser]','1','$produk[harga]','$produk[harga]')");
                    $id_pesanproduk_barusan = $kon->insert_id;

                    $pembelian=mysqli_query($kon, "INSERT INTO pembelian(idpesanproduk,idproduk,iduser,jumlah,harga,subtotal) VALUES ('$id_pesanproduk_barusan','$produk[idproduk]','$pecah[iduser]','1','$produk[harga]','$produk[harga]')");
                    ?>
                    <p> <?php echo 'Produk ' .$produk['namaproduk'], " Berhasil ditambahkan ke dalam keranjang belanja <br>"; ?> </p>
                    <a href="menu.php" class="btn btn-warning" >Lanjut Berbelanja</a>
                    <a href="pesanan.php?iduser=<?php echo $pecah['iduser']; ?>" class="btn btn-success">Keranjang Belanja</a>
                    <?php
                }else{
                    $jumlah=$cekbarang1['jumlah']+1;
                    $subtotal=$cekbarang1['harga']*$jumlah;
                    $update=mysqli_query($kon, "UPDATE pesanan SET jumlah='$jumlah',subtotal='$subtotal' WHERE idproduk='$idproduk'"); 
                    $updatepembelian=mysqli_query($kon, "UPDATE pembelian SET jumlah='$jumlah',subtotal='$subtotal' WHERE idproduk='$idproduk'"); 
                    ?>
                    <p> <?php echo 'Produk ' .$produk['namaproduk'], " Ini sudah anda pesan sebelumnya, dan jumlah pesanan berhasil diperbarui <br>"; ?> </p>
                    <a href="menu.php" class="btn btn-warning" >Lanjut Berbelanja</a>
                    <a href="pesanan.php?iduser=<?php echo $pecah['iduser']; ?>" class="btn btn-success">Keranjang Belanja</a>
                    
                    

                    
                <?php } ?> </center>
        </div>
    </section>

<br/><br/><br/><br/><br/><br/><br/><br/>


    <!-- ======= Footer ======= -->
    <footer>
        <div class="container">
            <h4>CONDONG RAOS - MASAKAN SUNDA</h4>
            <h5>Lezat | Higienis | Murah | Pelayanan Ramah</h5>
            <small>Copyright &copy; 2021 - EditaAulia. All Rights Reserved.</small>
        </div>
    </footer>
    <!-- End Footer -->

    <script type="text/javascript">
        $(document).ready(function() {
            $(".bg-loader").hide
        })
    </script>


    </main>
    <!-- End #main -->



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