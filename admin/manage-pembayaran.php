<?php 
session_start();
include "../koneksi.php";
    $cekuserlogin=$_SESSION['username'];

    if(empty($cekuserlogin)){
        header ("Location: ../login.php");
    }
?>
<html>
    <head>
        <title>Condong Raos - Pembayaran Masuk</title>

        <link href="../assets/css/admin.css" rel="stylesheet">
    </head>

    <body>
    <!--Menu Section Starts-->
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="manage-admin.php">Data Admin</a></li>
            <li><a href="manage-user.php">Data User</a></li>
            <li><a href="manage-produk.php">Data Produk</a></li>
            <li><a href="manage-kotaongkir.php">Kota & Ongkir</a></li>
            <li><a href="manage-pembayaran.php">Pembayaran</a></li>
            <li><a href="manage-pesanan.php">Pesanan</a></li>
            <li><a href="../logout.php">Logout</a></li>
</ul>
    </div>
    </div>

    <!--Menu Section Ends-->
	<div class="main-content">
        <div class="wrapper">
            <h1>Data Pembayaran Masuk</h1>
            <br /><br />

          
	<table class="table1">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Total</th>
			<th>Status</th>
            <th>*</th>
		</tr>
        <?php 
                // Mendapatkan id member yang login dari session
                $nomor=1;
                // $iduser = $_SESSION['pelanggan']['iduser'];
                // $ambil1=mysqli_query($kon, "SELECT * FROM user WHERE iduser='$iduser'");
                // $pecah1=mysqli_fetch_array($ambil1);
                $ambil =mysqli_query($kon,"SELECT * FROM checkout");
                while($pecah=mysqli_fetch_array($ambil)){
                            
        ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama'] ?></td>
			<td><?php echo $pecah['subtotal'] ?></td>
			<td><?php echo $pecah['status_pembelian'] ?></td>
			<td>
    <a href="detail-pembayaran.php?idcheckout=<?php echo $pecah['idcheckout']?>" class="btn-warning5">Detail</a>
    <a href="pesanan-pembayaran.php?idcheckout=<?php echo $pecah['idcheckout']?>&&idpesanproduk=<?php echo $pecah['idpesanproduk']?>" class="btn-secondary5">Pesanan</a>
    </td>
		</tr>
        <?php $nomor++; }?>

		
	</table>	
</br>
</br>
</br>

</div>
    </div>

    <br/>

    <!--Footer Section Starts-->
 <div class="footer">
        <div class="wrapper">
           <p class="text-center">2021 All rights reserved, Condong Raos Developed By- <a href="#"> Edita Aulia </a> </p>
    </div>
    </div>
    <!--Footer Section Ends-->
 
    </body>
</html>