<?php 
session_start();
include "../koneksi.php";
    $cekuserlogin=$_SESSION['username'];

    if(empty($cekuserlogin)){
        header ("Location: ../login.php");
    }

?>

<html>
<?php 
    $proses=mysqli_real_escape_string($kon,@$_GET['proses']);
    if($proses=="hapus"){
        $idadmin=mysqli_real_escape_string($kon,$_GET['idadmin']);
    
        $hapus=mysqli_query($kon,"DELETE FROM admin WHERE idadmin='$idadmin'");
        if($hapus){
            echo "<h3>Hapus Data Berhasil</h3>";
        }else{
            echo "<h3>Hapus Data Gagal</h3>";
        }
    }


?>
    <head>
        <title>Condong Raos - Admin</title>

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
            <h1>Data Admin</h1>
            <br /><br />

            <!-- Button to Add Admin -->
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            
            <br /><br /><br /><br />

	<table class="table1">
		<tr>
			<th>No</th>
			<th>Full Name</th>
			<th>Username</th>
			<th>*</th>
			
		</tr>
        <?php
            $i=1;
            $tampil=mysqli_query($kon,"SELECT * FROM admin");
            while($cetak=mysqli_fetch_array($tampil)){
        ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $cetak['nama'] ?></td>
			<td><?php echo $cetak['email']?></td>
			<td>
    <a href="manage-admin.php?idadmin=<?php echo $cetak['idadmin']; ?>&&proses=hapus" class="btn-danger">Delete Admin</a>
    
    </td>
		</tr>
        <?php $i=$i+1; }?>
		
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