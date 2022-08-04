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
        $nama=$_POST['nama'];
        $email=$_POST['email'];
        $password=$_POST['password'];

        $simpan=mysqli_query($kon,"INSERT INTO admin(email,password,nama) 
        VALUES('$email','$password','$nama')");
        if($simpan){
            echo "<h3>Input Data Berhasil</h3>";
        }else{
            echo "<h3>Input Data Gagal</h3>";
        }
    }

?>

<html>
    <head>
        <title>Condong Raos - Add Admin</title>

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
        <h1>Add Admin</h1>

        <br><br>

        <form action="?proses=simpan" method="post" enctype="multipart/form-data">

            <table class="tbl-30">
            <tr>
            <td>Full Name: </td>
            <td>
                <input type="text" name="nama" placeholder="Enter Your Name" required="required">
            </td>
            </tr>

            <tr>
            <td>Username: </td>
            <td>
                <input type="text" name="email" placeholder="Your Username" required="required">
            </td>
            </tr>

            <tr>
            <td>Password: </td>
            <td>
                <input type="password" name="password" placeholder="Your Password" required="required">
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