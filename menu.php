<?php 

session_start();
include 'koneksi.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Condong Raos</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/condongraos.JPG" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
        <div class="container d-flex">
            <div class="contact-info mr-auto">
                <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">info@condongraos.com</a>
                <i class="icofont-phone"></i> 0813 14385253
            </div>
            <div class="social-links">
                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
            </div>
        </div>
    </div>

    <?php if(!isset($_SESSION['pelanggan'])){
        echo"<script>alert('Silahkan Login Dahulu'); </script>";
        echo"<script>location='login.php'; </script>";
    }?>

    <?php
        
        $produk=mysqli_query($kon, "SELECT * FROM produk");
        $iduser=$_SESSION['pelanggan']['iduser'];
        $ambil=mysqli_query($kon,"SELECT * FROM user WHERE iduser='$iduser'");
        $pecah=mysqli_fetch_array($ambil);
        
        
    ?>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo mr-auto"><a href="index.php">CONDONG RAOS</a></h1>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="index.php">BERANDA</a></li>
                    <li><a href="tentang.php">TENTANG KAMI</a></li>
                    <li><a href="menu.php">MENU RAOS</a>
                    </li>
                    <li><a href="kontak.php">HUBUNGI KAMI</a></li>
                    <?php if (isset($_SESSION['pelanggan'])) : ?>
                        <li class="drop-down"><a href=#">PROFILE</a>
                            <ul>
                                <li><a href="#">Status Pembayaran</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <li><a href="login.php">MASUK</a></li>
                    <?php endif ?>
                    <li><a href="pesanan.php"><img src="assets/img/shopping-cart24.png" style="height: 20px;"></a></li>
                </ul>
            </nav>
            <!-- .nav-menu -->

        </div>
    </header>
    <!-- End Header -->

    <!--about-->
    </br>
    </br>
    </br>
    </br>
    </br>
    </br>
    <section class="menuraos">
        <div class="container">
            <h3>- MENU RAOS -</h3>
            <p>Kami menyediakan masakan sunda yang lezat, higienis dan terjangkau sesuai dengan kantong anda</p>
        </div>
    </section>

    <!-- cards -->
    <section class="menurek">
        <div class="container">
            <div class="content">
                <?php while($key = mysqli_fetch_array($produk)) { ?>
                    <div class="row mx-auto mt-5">
                        <div class="card mr-3 ml-3" style="width: 15rem;">
                            <img src="<?php echo $key['gambar'] ?>" class="card-img-top" alt="...">
                            <div class="card-body bg-light">
                                <h5 class="card-title"><?php echo $key['namaproduk'] ?></h5>
                                <p class="card-text">Rp. <?php echo $key['harga'] ?></p>
                                <hr class="garis" width="100%" align="center">
                                <center><a href="proses_pesanan.php?idproduk=<?php echo $key['idproduk'] ?>&&iduser=<?php echo $pecah['iduser']; ?>" class="btn btn-success">Pesan</a></center>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <!-- <div class="content">
                <?php // foreach($produk as $key){ ?>
                    <div class="row mx-auto mt-5">
                        <div class="card mr-3 ml-3" style="width: 15rem;">
                            <img src="<?php //echo $key['gambar'] ?>" class="card-img-top" alt="...">
                            <div class="card-body bg-light">
                                <h5 class="card-title"><?php //echo $key['namaproduk'] ?></h5>
                                <p class="card-text">Rp. <?php //echo $key['harga'] ?></p>
                                <hr class="garis" width="100%" align="center">
                                <a href="#" class="open-modal btn btn-warning" data-id="<?php //echo $key['idproduk']; ?>" data-toggle="modal">Lihat Detail</a>
                                <a href="proses_pesanan.php?idproduk=<?php //echo $key['idproduk'] ?>&&iduser=<?php echo $pecah['iduser']; ?>" class="btn btn-success">Pesan</a>
                            </div>
                        </div>
                    </div>
                <?php  ?>
            </div> -->

                
                </div>
    </section>
    </br>
    </br>
    <!--pagination-->
    <!-- <div class="slide">
        <div class="container">
            <ul class="pagination">
                <li>
                    <a href="#">
                    <span class="fas fa-angle-left"></span>
                        <span class="fas fa-angle-left"></span>
                    </a>
                </li>
                <li><a href="menu.php">1</a></li>
                <li><a href="menu2.php">2</a></li>
                <li><a href="menu3.php">3</a></li>
                <li><a href="menu4.php">4</a></li>
                <li>
                    <a href="#">
                        <span class="fas fa-angle-right"></span>
                        <span class="fas fa-angle-right"></span>
                    </a>
                </li>
            </ul>
        </div>

    </div> -->


    <!-- ======= Footer ======= -->
    <footer>
        <div class="container">
            <h4>CONDONG RAOS - MASAKAN SUNDA</h4>
            <h5>Lezat | Higienis | Murah | Pelayanan Ramah</h5>
            <small>Copyright &copy; 2021 - EditaAulia. All Rights Reserved.</small>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $(".bg-loader").hide
        })
    </script> -->


    <!-- Script JavaScript Buat Nampilin Modal -->
<script>
        $(function() {
            $(document).on('click','.open-modal',function(e) {
                e.preventDefault();
                $("#get-data").modal('show');
                $.post('data.php', {id:$(this).attr('data-id')},
                    function(html){
                        $(".modal-body").html(html);
            });
            });

        });

</script>

    <!-- Modal -->
    <div class="modal fade" id="get-data" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Detail Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">KEMBALI</button>
                    <button type="button" class="btn btn-success">PESAN</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="menu2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="assets/img/ayamgoreng.JPG">
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Nama Menu</th>
                                    <td>AYAM GORENG</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>Rp. 13.000</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">KEMBALI</button>
                    <button type="button" class="btn btn-success">PESAN</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="menu3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="assets/img/ayamserundeng.JPG">
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Nama Menu</th>
                                    <td>AYAM SERUNDENG</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>Rp. 13.000</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">KEMBALI</button>
                    <button type="button" class="btn btn-success">PESAN</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="menu4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="assets/img/ayamopor.JPG">
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Nama Menu</th>
                                    <td>AYAM OPOR</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>Rp. 13.000</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">KEMBALI</button>
                    <button type="button" class="btn btn-success">PESAN</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="menu5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="assets/img/ikanmasbawal.JPG">
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Nama Menu</th>
                                    <td>IKAN MAS/MUJAIR GORENG</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>Rp. 13.000</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">KEMBALI</button>
                    <button type="button" class="btn btn-success">PESAN</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="menu6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="assets/img/lele.JPG">
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Nama Menu</th>
                                    <td>LELE GORENG/PESMOL</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>Rp. 9.000</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">KEMBALI</button>
                    <button type="button" class="btn btn-success">PESAN</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="menu7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="assets/img/ikanteribalado.JPG">
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Nama Menu</th>
                                    <td>IKAN TERI BALADO/PORSI</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>Rp. 7.000</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">KEMBALI</button>
                    <button type="button" class="btn btn-success">PESAN</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="menu8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Menu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="assets/img/ikanasinkipas.JPG">
                        </div>
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Nama Menu</th>
                                    <td>IKAN ASIN KIPAS BALADO/PORSI</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td>Rp. 7.000</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">KEMBALI</button>
                    <button type="button" class="btn btn-success">PESAN</button>
                </div>
            </div>
        </div>
    </div>





    </main>
    <!-- End #main -->



    <div id="preloader"></div>
    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counterup/counterup.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>