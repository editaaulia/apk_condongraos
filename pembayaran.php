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
                            
                        </ul>
                    </nav>
                    
                </div>
            </header>
            <br/><br/><br/><br/><br/><br/><br/>

            <?php   

$proses=mysqli_real_escape_string($kon, @$_GET['proses']);
$idcheckout=mysqli_real_escape_string($kon, @$_GET['idcheckout']);
if ($proses=="batalkan"){
    
    $hapus=mysqli_query($kon, "DELETE FROM checkout WHERE idcheckout='$idcheckout'");
    if($hapus){
        echo "Barang berhasil dihapus dari keranjang belanja";

    }else{
        echo "Barang gagal dihapus dari keranjang belanja";
    }
}
?>



<!--Menu Section Ends-->
<div class="main-content13">
    <div class="wrapper13">
        <h1>Perlu Pembayaran Pemesanan</h1>
        <br /><br />
        
        
        <table class="table13">
            <tr>
                <th><b>No</b></th>
                <th><b>Nama Pemesan</b></th>
                <th><b>Tanggal Pesan</b></th>
                <th><b>Status</b></th>
                <th><b>Action</b></th>
            </tr>
            <?php 
                // Mendapatkan id member yang login dari session
                $nomor=1;
                $iduser = $_SESSION['pelanggan']['iduser'];
                $ambil1=mysqli_query($kon, "SELECT * FROM user WHERE iduser='$iduser'");
                $pecah1=mysqli_fetch_array($ambil1);
                $ambil =mysqli_query($kon,"SELECT * FROM checkout WHERE iduser='$iduser'");
                while($pecah=mysqli_fetch_array($ambil)){
                    
                    ?>

<tr>
    <td><?php echo $nomor; ?></td>
    <td><?php echo $pecah['nama'] ?></td>
    <td><?php echo $pecah['tgl_checkout'] ?></td>
    <td><?php echo $pecah['status_pembelian'] ?></td>
    <td>
        <a href="detail-pembayaran.php?idcheckout=<?php echo $pecah['idcheckout']; ?>&&iduser=<?php echo $pecah1['iduser']; ?>" class="btn btn-primary btn-md">Bayar</a>
        <a href="pembayaran.php?idcheckout=<?php echo $pecah['idcheckout']; ?>&&proses=batalkan" class="btn btn-danger btn-md">Batalkan</a>
    </td>
</tr>
<?php $nomor++; ?>
		<?php } ?>
	</table>	

</div>
    </div>
<div class="pembayaran2">
    <p style="border: solid 1px #aaa; background: #ECF2E8; padding: 15px; -moz-border-radius: 15px; -khtml-border-radius: 15px; -webkit-border-radius: 15px; border-radius: 15px; margin: 0; text-align: justify; line-height: 23px; color: black; font-size: 17px">
    Silahkan lakukan pembayaran terlebih dahulu<br/><br/> Pembayaran Bisa Melalui Rekening Di Bawah Ini :
<br><br> Nama Bank : Bank BCA <br> No. Rek &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: 8691345912 <br> Nama &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: Dian Hamidah <br> Kode Bank&nbsp : 014 <br/><br/> Kemudian Lakukan Konfirmasi di menu konfirmasi pembayaran.</p>
</div>

</body>
</html>