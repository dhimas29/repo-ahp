<?php require('koneksi.php') ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Multidaya Medika</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="home/img/favicon.png" rel="icon">
    <link href="home/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="home/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="home/lib/nivo-slider/css/nivo-slider.css" rel="stylesheet">
    <link href="home/lib/owlcarousel/owl.carousel.css" rel="stylesheet">
    <link href="home/lib/owlcarousel/owl.transitions.css" rel="stylesheet">
    <link href="home/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="home/lib/animate/animate.min.css" rel="stylesheet">
    <link href="home/lib/venobox/venobox.css" rel="stylesheet">
    <style>
        .modal-dialog {
            position: relative;
            width: 400px;
        }
    </style>
    <!-- Nivo Slider Theme -->
    <link href="home/css/nivo-slider-theme.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="home/css/style.css" rel="stylesheet">

    <!-- Responsive Stylesheet File -->
    <link href="home/css/responsive.css" rel="stylesheet">
    <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body data-spy="scroll" data-target="#navbar-example">

    <div id="preloader"></div>

    <header>
        <!-- header-area start -->
        <div id="sticker" class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                        <!-- Navigation -->
                        <nav class="navbar navbar-default">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <!-- Brand -->
                                <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                                    <h1><span>Multidaya</span>Medika</h1>
                                    <!-- Uncomment below if you prefer to use an image logo -->
                                    <!-- <img src="home/img/logo.png" alt="" title=""> -->
                                </a>
                            </div>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="active">
                                        <a class="page-scroll" href="index.php#home">Home</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="index.php#about">About Us</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="index.php#galery">Galery</a>
                                    </li>
                                    <li>
                                        <a class="page-scroll" href="index.php#contact">Contact Us</a>
                                    </li>
                                    <li>
                                        <a href="infolowongan.php#lowongan" data-toggle="modal">Lowongan</a>
                                    </li>
                                    <li>
                                        <a href="#login" data-toggle="modal">Login</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- navbar-collapse -->
                        </nav>
                        <!-- END: Navigation -->
                    </div>
                </div>
            </div>
        </div>
        <!-- header-area end -->
    </header>
    <!-- header end -->

    <!-- Modal Lowongan -->
    <!-- Modal End Lowongan -->

    <!-- Modal Login -->
    <div class="modal fade" id="login">
        <form name="login" action="proses/proseslogin.php" method="POST" onSubmit="return validasi(this)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" bgcolor="black">
                        <!-- <img src="images/logo-kapa.png" width="30%" alt=""> -->
                        <!-- <h1><span>Multidaya</span>Medika</h1> -->
                        <div class="modal-title">
                            <center>
                                <h4>Login</h4>
                            </center>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <!-- <label for="username" class="col-sm-3 control-label">Username</label> -->
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="username" placeholder="Username">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- <label for="username" class="col-sm-3 control-label">Password</label> -->
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-lock"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-block" type="submit"> Masuk</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button class="btn btn-danger" type="reset" data-dismiss="modal">Batal</button> -->
                        <center><a href="#register" class="btn btn-success" data-toggle="modal" data-dismiss="modal"> Buat Akun Baru</a></center>
                        <!-- <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-user"></span> Daftar</button> -->
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Modal End Login -->

    <!-- Modal Register -->
    <div class="modal fade" id="register">
        <form name="login" action="proses/prosestambah.php?module=register&act=input" method="POST" onSubmit="return validasi(this)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" bgcolor="black">
                        <!-- <img src="images/logo-kapa.png" width="30%" alt=""> -->
                        <!-- <h1><span>Multidaya</span>Medika</h1> -->
                        <div class="modal-title">
                            <center>
                                <h4>Register</h4>
                            </center>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="fullname" placeholder="Fullname">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="email" class="form-control" name="email" placeholder="Email">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-envelope"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="username" placeholder="Username">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-lock"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <button class="btn btn-danger" type="reset" data-dismiss="modal">Batal</button> -->
                        <center><button class="btn btn-success" type="submit"> Daftar</button></center>
                        <!-- <br>
            <a href="#login" data-toggle="modal" data-dismiss="modal"> Sudah Memiliki Akun</button> -->
                        <!-- <button class="btn btn-info" type="submit"><span class="glyphicon glyphicon-user"></span> Daftar</button> -->
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- End Modal Register -->

    <!-- Start Slider Area -->

    <!-- End Slider Area -->

    <!-- Start About area -->

    <!-- End About area -->

    <!-- Start Service area -->
    <!-- End Service area -->
    <!-- Start Suscrive Area -->
    <div class="suscribe-area">

    </div>
    <!-- End Suscrive Area -->
    <!-- Start portfolio Area -->
    <div id="lowongan" class="portfolio-area area-padding fix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="section-headline text-center">
                        <h2>Pengumuman</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Start Portfolio -page -->
                <div id="accordion">
                    <?php $query = mysqli_query($conn, "SELECT * FROM postlowongan order by tanggal");
                    while ($row = mysqli_fetch_array($query)) :
                    ?>
                        <div class="card">
                            <div class="card-header" id="<?= $row['id'] ?>">
                                <h5 class="mb-0">
                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse<?= $row['id'] ?>" aria-expanded="false" aria-controls="collapse<?= $row['id'] ?>">
                                        <?= $row['judul'] ?>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapse<?= $row['id'] ?>" class="collapse" aria-labelledby="collapse<?= $row['id'] ?>" data-parent="#accordion">
                                <div class="card-body">
                                    <?= $row['tanggal'] ?>
                                    <?= $row['post'] ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- awesome-portfolio end -->

    <!-- Start Suscrive Area -->

    <!-- End Suscrive Area -->
    <!-- Start contact Area -->

    <!-- End Contact Area -->

    <!-- Start Footer bottom Area -->
    <footer>
        <div class="footer-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <div class="footer-logo">
                                    <h3><span style="color: #3ec1d5;">Multidaya</span>Medika</h3>
                                </div>

                                <p>Providing a complete solution for hospitals and health industries practices. With our dedication to our customers, our suppliers and to one another business practices.</p>

                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <h4>Our Vision</h4>
                                <p>
                                    Our vision is to become a Premier Regional Distributor for the healthcare industry in the market segment we serve. We will achieve it by building a company foundation with teamwork , leadership and excellent after sales service.
                                </p>
                                <div class="footer-contacts">
                                    <p><span>Tel:</span> +123 456 789</p>
                                    <p><span>Email:</span> contact@example.com</p>
                                    <p><span>Working Hours:</span> 9am-5pm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <h4>Our Suplier</h4>
                                <!-- <div class="flicker-img"> -->
                                <p><a href="#">Biotronik</a></p>
                                <p><a href="#">Occlutech</a></p>
                                <p><a href="#">Umbra Medical</a></p>
                                <p><a href="#">Teleflex (Arrow)</a></p>
                                <p><a href="#">Braile Biomedical</a></p>
                                <p><a href="#">Nipro</a></p>
                                <p><a href="#">Beijing Target Medical</a></p>
                                <p><a href="#">DeRoyal</a></p>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <h4>Address</h4>
                                <!-- <div class="flicker-img"> -->
                                <p>PT. Multidaya Medika
                                    Rukan Niaga Gunung Sahari Blok B-1
                                    Jl. Gunung Sahari Raya No.7
                                    Jakarta Pusat 10720
                                    Indonesia
                                <div class="footer-icons">
                                    <ul>
                                        <li>
                                            <a href="#"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-twitter"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-google"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-pinterest"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="copyright text-center">
                            <p>
                                &copy; Copyright <strong>2021 Faqih</strong>. All Rights Reserved
                            </p>
                        </div>
                        <div class="credits">
                            <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
              -->
                            <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="home/lib/jquery/jquery.min.js"></script>
    <script src="home/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="home/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="home/lib/venobox/venobox.min.js"></script>
    <script src="home/lib/knob/jquery.knob.js"></script>
    <script src="home/lib/wow/wow.min.js"></script>
    <script src="home/lib/parallax/parallax.js"></script>
    <script src="home/lib/easing/easing.min.js"></script>
    <script src="home/lib/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="home/lib/appear/jquery.appear.js"></script>
    <script src="home/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Contact Form JavaScript File -->
    <script src="home/contactform/contactform.js"></script>

    <script src="home/js/main.js"></script>
</body>

</html>