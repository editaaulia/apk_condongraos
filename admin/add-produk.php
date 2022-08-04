<?php 
session_start();
include "../koneksi.php";
    $cekuserlogin=$_SESSION['username'];

    if(empty($cekuserlogin)){
        header ("Location: ../login.php");
    }
?>


<?php
 //proses simpan data
    $proses=mysqli_real_escape_string($kon,@$_GET['proses']);
    if($proses=="simpan"){
        $nama_produk=$_POST['namaproduk'];
        $stok=$_POST['stok'];
        $harga=$_POST['harga'];

        $tanggal_input=date("Y-m-d");
        $waktu_input=date("H:i:s");
    
        $nama_gambar=@$_FILES['gambar']['name'];
        $tmp_gambar=@$_FILES['gambar']['tmp_name'];
        if(!empty($nama_gambar)){
            copy($tmp_gambar, "../assets/img/$nama_gambar");
        }
        $simpan=mysqli_query($kon,"INSERT INTO produk(namaproduk,harga,gambar,stok,tanggal_input,waktu_input) 
        VALUES('$nama_produk','$harga','assets/img/$nama_gambar','$stok','$tanggal_input','$waktu_input')");
        if($simpan){
            echo "<h3>Input Data Berhasil</h3>";
        }else{
            echo "<h3>Input Data Gagal</h3>";
        }
    }

?>


<html>
    <head>
        <title>Condong Raos - Add Produk</title>

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

<div class="main-content">
    <div class="wrapper">
        <h1>Add Produk</h1>

        <br><br>

        <form action="?proses=simpan" method="post" enctype="multipart/form-data">

            <table class="tbl-30">
            <tr>
            <td>Nama: </td>
            <td>
                <input type="text" name="namaproduk" placeholder="Nama Produk" required="required">
            </td>
            </tr>

            <tr>
            <td>Harga: </td>
            <td>
                <input type="text" name="harga" placeholder="Harga" required="required">
            </td>
            </tr>

            <tr>
            <td>Select Image: </td>
            <td>
                <input type="file" name="gambar">
            </td>
            </tr>
<tr>
    <td colspan="2">
        <button type="submit" name="submit" class="btn-secondary">Simpan Data</button>

    </td>
</tr>
</table>
        </from>
</div>
</div>

<!--Footer Section Starts-->
<div class="footer">
        <div class="wrapper">
           <p class="text-center">2021 All rights reserved, Condong Raos Developed By- <a href="#"> Edita Aulia </a> </p>
    </div>
    </div>
    <!--Footer Section Ends-->

    </body>
</html>