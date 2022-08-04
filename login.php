<?php
session_start();
include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Login Condong Raos </title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    
     <!-- Favicons -->
     <link href="assets/img/condongraos.JPG" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
    <link href="assets/css/login.css" rel="stylesheet">

</head>

<body>
  <?php
    $proses = mysqli_real_escape_string($kon, @$_GET['proses']);
    if ($proses == "login") {
        $email = mysqli_real_escape_string($kon, $_POST['username']);
        $password = mysqli_real_escape_string($kon, $_POST['password']);
        $cekakun = mysqli_num_rows(mysqli_query($kon, "SELECT * FROM admin WHERE email='$email' AND password='$password'"));
        $ambil = mysqli_query($kon, "SELECT * FROM user where email='$email' AND password='$password'");
        $cekakun1 = mysqli_num_rows($ambil);
        if ($cekakun != 0) { // untuk mengecek akun admin
            $_SESSION['username'] = $email;
            $_SESSION['password'] = $password;
            
            echo "<script>alert('Anda Berhasil Login sebagai Administrator'); </script>";
            echo "<script>location='admin/index.php'; </script>";
        } elseif ($cekakun1 != 0) { // untuk mengecek akun member
            $akun = mysqli_fetch_assoc($ambil);
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['pelanggan'] = $akun;
            echo "<script>alert('Anda Berhasil Login'); </script>";
            echo "<script>location='index.php'; </script>";
        } else {
            echo "<script>alert('Anda Gagal login'); </script>";
        }
    }

  ?>
<div class="container-login">
          <h1>Login</h1>
            <form action="?proses=login" method="post">
                <label for="username">Username</label><br>
                <input type="text" name="username" id="username" required><br>

                <label for="password">Password</label><br>
                <input type="password" name="password" id="password" required><br>

                <button type="submit" name="login">Log in</button>
                <p> Belum punya akun?
                  <a href="register.php">Register di sini</a>
                </p>
            </form>
        </div>

</body>
</html>