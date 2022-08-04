<?php 
session_start();
include "../koneksi.php";
    $cekuserlogin=$_SESSION['username'];

    if(empty($cekuserlogin)){
        header ("Location: ../login.php");
    }

    $idcheckout =mysqli_real_escape_string($kon,@$_GET['idcheckout']);
    $ambil = mysqli_query($kon, "SELECT * FROM checkout WHERE idcheckout='$idcheckout'");
    $pecah = mysqli_fetch_array($ambil);
?>


<?php
    //proses simpan data
    
     if(isset($_POST['kirim'])){
         
        //  $status=$_POST['status'];
         $status=mysqli_real_escape_string($kon, @$_POST['status']);

    
         $update=mysqli_query($kon,"UPDATE checkout SET status_pembelian = '$status' WHERE idcheckout='$idcheckout' ");
         if($update){
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

        <form action="?edit=simpan" method="post" enctype="multipart/form-data">

            <table class="tbl-30">
            <!-- <tr>
            <td>Nama: </td>
            <td>
                <input type="text" name="nama" value="<?php echo $pecah['nama']?>" required="required">
            </td>
            </tr>

            <tr>
            <td>Harga: </td>
            <td>
                <input type="text" name="harga" value="<?php echo $pecah['subtotal']?>"required="required">
            </td>
            </tr> -->
            
            <tr>
            <td>Status: </td>
            <td>
                <input type="text" name="status" >
            </td>
            </tr>

            <!-- <tr>
            <td>Select Image: </td>
            <td>
                <input type="file" name="gambar">
            </td>
            </tr> -->
<tr>
    <td colspan="2">
        <button name="kirim" class="btn-secondary">Simpan Data</button>

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