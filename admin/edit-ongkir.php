<?php 
session_start();
include "../koneksi.php";
    $cekuserlogin=$_SESSION['username'];

    if(empty($cekuserlogin)){
        header ("Location: ../login.php");
    }

    $idongkir =mysqli_real_escape_string($kon,@$_GET['idongkir']);
    $ambil = mysqli_query($kon, "SELECT * FROM ongkir WHERE idongkir='$idongkir'");
    $pecah = mysqli_fetch_assoc($ambil);

?>


<?php
if (isset($_POST['submit']))
{
	$kon->query("UPDATE ongkir SET ongkir='$_POST[harga]' WHERE idongkir='$idongkir'");

	echo "<script>alert('data ongkir telah diubah');</script>";
	echo "<script>location='manage-kotaongkir.php';</script>";
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
        <h1>Edit Produk</h1>

        <br><br>

        <form method="post" enctype="multipart/form-data">

            <table class="tbl-30">
            <tr>
            <td>Harga Ongkir: </td>
            <td>
                <input type="number" class="form-control" name="harga" value="<?php echo $pecah['ongkir']; ?>">
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