<?php 
session_start();
include "../koneksi.php";
    $cekuserlogin=$_SESSION['username'];

    if(empty($cekuserlogin)){
        header ("Location: ../login.php");
    }

    $idcheckout =mysqli_real_escape_string($kon,@$_GET['idcheckout']);
    $ambil = mysqli_query($kon, "SELECT * FROM pembayaran WHERE idcheckout='$idcheckout'");
    $pecah = mysqli_fetch_array($ambil);
?>

<html>
    <head>
        <title>Condong Raos - Detail Pembayaran</title>

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
            <li><a href="manage-order.php">Logout</a></li>
</ul>
    </div>
    </div>

    <!--Menu Section Ends-->
	<div class="main-content">
        <div class="wrapper">
            <h1>Detail Pembayaran</h1>
            <br /><br />

	<table class="table2">

		<tr>
			<td>Nama Pemesan</td>
			<td><?php echo $pecah['nama']?></td>
        </tr>
        
        <tr>
            <td>Total Pembayaran</td>
            <td><?php echo $pecah['jumlah']?></td>
        </tr>

        <tr>
			<td>Bukti Transaksi</td>
			<td><img src="../buktipembayaran/<?php echo $pecah['bukti_foto']; ?>"></td>
        </tr>

	</table>	


</div>
    </div>


<br/><br/><br/><br/><br/>
    <!--Footer Section Starts-->
 <div class="footer">
        <div class="wrapper">
           <p class="text-center">2021 All rights reserved, Condong Raos Developed By- <a href="#"> Edita Aulia </a> </p>
    </div>
    </div>
    <!--Footer Section Ends-->
 
    </body>
</html>