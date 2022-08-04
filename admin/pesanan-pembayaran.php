<?php 
session_start();
include "../koneksi.php";
    $cekuserlogin=$_SESSION['username'];

    if(empty($cekuserlogin)){
        header ("Location: ../login.php");
    }

    $idcheckout =mysqli_real_escape_string($kon,@$_GET['idcheckout']);
    $iduser =mysqli_real_escape_string($kon,@$_GET['iduser'] );
    $idpesanproduk =mysqli_real_escape_string($kon,@$_GET['idpesanproduk']);
    $ambil = mysqli_query($kon, "SELECT * FROM checkout WHERE idcheckout='$idcheckout'");
    $pecah = mysqli_fetch_array($ambil);



    if(isset($_POST['kirim']))
	{
        $update=mysqli_query($kon,"UPDATE checkout SET status_pembelian='Pengiriman' WHERE idcheckout='$idcheckout'");
        $hapus=mysqli_query($kon, "UPDATE pesanan set status='Kirim' WHERE iduser='$iduser'");
        if($update&&$hapus){
            echo "<script>alert('Status pesanan dalam pengiriman'); </script>";
            echo "<script>location='manage-pesanan.php'; </script>";
        }
            

    }
?>

<html>
    <head>
        <title>Condong Raos - Detail Pesanan</title>

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
            <h1>Pesanan Detail</h1>
            <br /><br />

	<table class="table2">

		<tr>
			<td>Nama Pemesan</td>
			<td><?php echo $pecah['nama']?></td>
        </tr>
        
        <tr>
            <td>Tanggal Pesan</td>
            <td><?php echo $pecah['tgl_checkout']?></td>
			
        </tr>
        
        <tr>
            <td>Waktu Pengiriman</td>
            <td><?php echo $pecah['waktu_pengiriman']?></td>
			
        </tr>

        <tr>
            <td>Telepon</td>
            <td><?php echo $pecah['notelp']?></td>
			
        </tr>
		
        <tr>
            <td>Alamat</td>
            <td><?php echo $pecah['alamat_pengiriman']?></td>
			
        </tr>
        
        <tr>
            <td>Total Bayar</td>
            <td><?php echo $pecah['subtotal']?></td>
			
        </tr>
        
        <tr>
            <td>Status</td>
            <td><?php echo $pecah['status_pembelian']?></td>
			
        </tr>

	</table>	


</div>
    </div>

    <!--List Pesanan-->
    <div class="main-content">
    <div class="wrapper">
            <h1>List Pesanan</h1>
            <br /><br />

            <table class="table1">
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga Satuan</th>
			<th>QTY</th>
            <th>Harga*</th>
			
		</tr>
        <?php
            $i=1;
            // $tampil=mysqli_query($kon,"SELECT * FROM pembelian a LEFT JOIN produk b on a.idproduk=b.idproduk WHERE idpesanproduk='$idpesanproduk'");
            $daftarbeli=mysqli_query($kon, "SELECT * FROM pesanan a LEFT JOIN produk b ON a.idproduk=b.idproduk WHERE iduser='$iduser' AND status='Confirmed'");
            while($cetak=mysqli_fetch_array($daftarbeli)){
                // $daftarbeli1=mysqli_fetch_array($daftarbeli);
        ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $cetak['namaproduk'] ?></td>
			<td><?php echo $cetak['harga']?></td>
            <td><?php echo $cetak['jumlah'] ?></td>
            <td><?php echo $cetak['subtotal']?></td>
		</tr>
        <?php $i++; }?>

		
		
	</table>
    <form method="post">
        <button class="btn btn-success btn-md mt-5" type="submit" name="kirim">Kirim Makanan</button>   
    </form>
</div

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