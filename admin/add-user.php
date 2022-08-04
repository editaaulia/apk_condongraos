<html>
    <head>
        <title>Condong Raos - Add User</title>

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
        <h1>Add User</h1>

        <br><br>

        <form action="admin.php" method="POST">

            <table class="tbl-30">
            <tr>
            <td>Full Name: </td>
            <td>
                <input type="text" name="full_name" placeholder="Enter Your Name" required="required">
            </td>
            </tr>

            <tr>
            <td>Email: </td>
            <td>
                <input type="text" name="email" placeholder="Your Email" required="required">
            </td>
            </tr>

            <tr>
            <td>Status: </td>
            <td>
                <input type="text" name="status" placeholder="User" required="required">
            </td>
            </tr>
<tr>
    <td colspan="2">
        <input type="submit" name="submit" value="Add User" class="btn-secondary">

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