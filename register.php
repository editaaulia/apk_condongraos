<?php 


include 'koneksi.php';

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

<div class="container-register">
  <div class="register">
          <h1>Register</h1>
            <form action="?proses=registrasi" method="post">
                <label>Username</label>
                <br>
                <input type="text" name="username" required>
                <br>
                <label>Nama Lengkap</label>
                <br>
                <input type="text" name="namalengkap" required>
                <br>
                <label>Email</label>
                <br>
                <input type="text" name="email" required>
                <br>
                <label>Password</label>
                <br>
                <input type="password" name="password" required>
                <br>
                <button type="submit" name="submit">Register</button>
                <p> Sudah punya akun?
                  <a href="index.php">Login di sini</a>
                </p>
            </form>
            <?php 
                if(isset($_POST["submit"])){
                    // Mengambil input dari form dan dimasukan ke variabel
                    $username = $_POST["username"];
                    $nama = $_POST["namalengkap"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];

                    // Mengecek apakah email sudah dipakai apa belum
                    $ambil = mysqli_query($kon,"SELECT * FROM user where email='$email'");
                    $emailcocok=mysqli_num_rows($ambil);
                    if($emailcocok==1){
                        echo"<script>alert('Email anda sudah digunakan'); </script>";
                        echo"<script>location='register.php'; </script>";
                        return false;
                    }

                    if($password == $password){
                        $insert=mysqli_query($kon,"INSERT INTO user (username,nama,email,password)
                        VALUES ('$username','$nama','$email','$password')");
                        echo"<script>alert('Akun Berhasil dibuat');</script>";
                        echo"<script>location='login.php';</script>";
                    }

                    



                }
            
            
            ?>
        </div>
</div>
        </body>
</html>