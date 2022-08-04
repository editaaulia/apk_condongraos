<?php
session_start();
include "koneksi.php";
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

            </div>
    </header>
    <?php
        $idpesanproduk=mysqli_real_escape_string($kon, @$_GET['idpesanproduk']);
        $proses=mysqli_real_escape_string($kon, @$_GET['proses']);
        
        

        if ($proses=="hapus"){
            
            $hapus=mysqli_query($kon, "DELETE FROM pesanan WHERE idpesanproduk='$idpesanproduk'");
            if($hapus){
                echo "Barang berhasil dihapus dari keranjang belanja";

            }else{
                echo "Barang gagal dihapus dari keranjang belanja";
            }
        }elseif($proses=="update"){
            $pesanproduk=mysqli_fetch_array(mysqli_query($kon, "SELECT * FROM proses_pesanan WHERE idpesanproduk='$idpesanproduk'"));
            $jumlah=mysqli_real_escape_string($kon, @$_POST['jumlah']);
            $subtotal=$pesanproduk['harga'] * $jumlah;
            $update=mysqli_query($kon, "UPDATE pesanan_proses SET jumlah='$jumlah', subtotal='$subtotal' WHERE idpesanproduk='$idpesanproduk'");
            if($update){
                echo "Jumlah dan Subtotal berhasil di ubah";
            }else{
                echo "Jumlah dan subtotal gagal di ubah";
            }
        }
    ?>
    <br/> <br/> <br/> <br/> 
   <!--Menu Section Ends-->
	<div class="main-content10">
        <div class="wrapper10">
            <h1>Keranjang Anda :</h1>
            <br /><br />
    
    <table class="table3">
        <tr>
            <th>Produk</th>
            <th>Details</th>
            <th>  </th>
            <th>  </th>
            <th>QTY</th>
            <th>Total</th>
            <th>  </th>
                    
        </tr>

            <?php
                $i=1;
                $totalakhir=0;
                $iduser=$_SESSION['pelanggan']['iduser'];
                $ambil=mysqli_query($kon,"SELECT * FROM user WHERE iduser='$iduser'");
                $pecah=mysqli_fetch_array($ambil);
                $daftarbeli=mysqli_query($kon, "SELECT * FROM pesanan a LEFT JOIN produk b ON a.idproduk=b.idproduk WHERE iduser='$iduser' AND status='Cart'");
                $fotobarang=mysqli_query($kon, "SELECT gambar FROM pesanan a LEFT JOIN produk b ON a.idproduk=b.idproduk WHERE iduser='$iduser' AND status='Cart'");
                while($daftarbeli1=mysqli_fetch_array($daftarbeli)){
                    $fotobarang1=mysqli_fetch_array($fotobarang);
            ?>

		<tr>
            <td><img src="<?php echo $fotobarang1['gambar']; ?>"></td>
			<td><b><?php echo $daftarbeli1['namaproduk']; ?></b> <br> <?php echo number_format($daftarbeli1['harga'],2); ?></td>
            <td>  </td>
            <td>  </td>
			<td><?php echo $daftarbeli1['jumlah']; ?></td>
            <td><?php echo number_format($daftarbeli1['subtotal'],2); ?></td>
            <td><a href="pesanan.php?idpesanproduk=<?php echo $daftarbeli1['idpesanproduk'] ?>&&proses=hapus"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
		</tr>

			<?php
                $totalakhir+=$daftarbeli1['subtotal']; }
            ?>
        <tr>
			<th>SUB TOTAL</th>
			<th>  </th>
            <th>  </th>
            <th>  </th>
			<th>  </th>
			<th><b><?php echo number_format($totalakhir,2); ?></b></th>
            <th>  </th>
		</tr>
		
	</table>	

    <br/><br/>
    <div class="keranjang1">
        <p> <b>Total Keranjang Belanja</b> <p>

        <table class="table4">
        <tr>
                <td><b>Total</b></td>
                <td><b><?php echo number_format($totalakhir,2); ?></b></td>
            </tr>
            </table>
            <br/>
            <a href="order.php?iduser=<?php echo $pecah['iduser']; ?>" class="btn btn-success btn-md">Selesai Belanja ></a>

    </div>
    </br>
    </br>
    </br>

    </div>  
    </div>

    <br/>

    </body>
</html>