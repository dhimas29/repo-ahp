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
                    <a class="page-scroll" href="#home">Home</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#about">About Us</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#galery">Galery</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#contact">Contact Us</a>
                  </li>
                  <li>
                    <a href="infolowongan.php#lowongan">Lowongan</a>
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
  <div id="home" class="slider-area">
    <div class="bend niceties preview-2">
      <div id="ensign-nivoslider" class="slides">
        <img src="home/img/slider/slide1.jpg" alt="" title="#slider-direction-1" />
        <img src="home/img/slider/slide2.jpg" alt="" title="#slider-direction-2" />
        <img src="home/img/slider/slide3.jpg" alt="" title="#slider-direction-3" />
      </div>

      <!-- direction 1 -->
      <div id="slider-direction-1" class="slider-direction slider-one">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInDown" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Caardiology Medical From Distributor </h2>
                  <h2 class="title2"> Biotronik, Deroyal, Nipro </h2>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 2 -->
      <div id="slider-direction-2" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content text-center">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Cardiology Medical Devices Suppliers </h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- direction 3 -->
      <div id="slider-direction-3" class="slider-direction slider-two">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="slider-content">
                <!-- layer 1 -->
                <div class="layer-1-1 hidden-xs wow slideInUp" data-wow-duration="2s" data-wow-delay=".2s">
                  <h2 class="title1">Sparepart & Maintenance </h2>
                  <h2 class="title1">With the Best Service </h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Slider Area -->

  <!-- Start About area -->

  <!-- End About area -->

  <!-- Start Service area -->
  <div id="about" class="services-area area-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline services-head text-center">
            <h2>About Us</h2>
          </div>
          <br>
          <p class="section-headline services-head text-center">Quick facts about our Company</p>
          <!-- <div class="section-headline text-center"> -->
          <h2 class="text-center">See what we provide for Our Client</h2>
          <!-- </div> -->
          <hr>
        </div>
      </div>
      <div class="row text-center">
        <div class="services-contents">
          <!-- Start Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <!-- <a class="services-icon" href="#"> -->
                  <i class="services-icon fa fa-heart"></i>
                  <!-- </a> -->
                  <h4>Selling cardiology equipment</h4>
                  <p>
                    Selling cardiology equipment with good quality and the best price
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <!-- <a class="services-icon" href="#"> -->
                  <i class="services-icon fa fa-thumbs-up"></i>
                  <!-- </a> -->
                  <h4>Installation & Function Testing</h4>
                  <p>
                    Installation our equipment & Function Testing and make sure all works fine</p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <!-- <a class="services-icon" href="#"> -->
                  <i class="fa fa-cloud services-icon"></i>
                  <!-- </a> -->
                  <h4>Troubleshooting</h4>
                  <p>
                    Our best resources will soon be completed in case of problems</p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <!-- <a class="services-icon" href="#"> -->
                  <i class="fa fa-suitcase services-icon"></i>
                  <!-- </a> -->
                  <h4>Spare parts </h4>
                  <p>
                    We also provide original spare parts for the machine more durable </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <!-- <a class="services-icon" href="#"> -->
                  <i class="fa fa-leaf services-icon"></i>
                  <!-- </a> -->
                  <h4>Contract Services</h4>
                  <p>
                    Transparent service contract during the sale or after and maintenance</p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <!-- <a class="services-icon" href="#"> -->
                  <i class="fa fa-cog services-icon"></i>
                  <!-- </a> -->
                  <h4>Maintenance Services</h4>
                  <p>
                    Maintenance Services periodically so that the equipment always runs well</p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Service area -->
  <!-- Start Suscrive Area -->
  <div class="suscribe-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
          <div class="suscribe-text text-center">
            <h3>Multidaya Medika</h3>
            <!-- <a class="sus-btn" href="#">Get A quate</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Suscrive Area -->
  <!-- Start portfolio Area -->
  <div id="galery" class="portfolio-area area-padding fix">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="section-headline text-center">
            <h2>Galery</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- Start Portfolio -page -->
        <div class="awesome-project-content">
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 design development">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="home/img/galery/galery1.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="home/img/galery/galery1.jpg">
                      <h4>Business City</h4>
                      <span>Web Development</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 photo">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="home/img/galery/galery2.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="home/img/galery/galery2.jpg">
                      <h4>Blue Sea</h4>
                      <span>Photosho</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 design">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="home/img/galery/galery3.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="home/img/galery/galery3.jpg">
                      <h4>Beautiful Nature</h4>
                      <span>Web Design</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 photo development">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="home/img/galery/galery4.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="home/img/galery/galery4.jpg">
                      <h4>Creative Team</h4>
                      <span>Web design</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 development">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="home/img/galery/galery5.jpg" alt="" /></a>
                <div class="add-actions text-center text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="home/img/galery/galery5.jpg">
                      <h4>Beautiful Flower</h4>
                      <span>Web Development</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
          <!-- single-awesome-project start -->
          <div class="col-md-4 col-sm-4 col-xs-12 design photo">
            <div class="single-awesome-project">
              <div class="awesome-img">
                <a href="#"><img src="home/img/galery/galery6.jpg" alt="" /></a>
                <div class="add-actions text-center">
                  <div class="project-dec">
                    <a class="venobox" data-gall="myGallery" href="home/img/galery/galery6.jpg">
                      <h4>Night Hill</h4>
                      <span>Photoshop</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- single-awesome-project end -->
        </div>
      </div>
    </div>
  </div>
  <!-- awesome-portfolio end -->

  <!-- Start Suscrive Area -->
  <div class="suscribe-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs=12">
          <div class="suscribe-text text-center">
            <h3>Multidaya Medika</h3>
            <!-- <a class="sus-btn" href="#">Get A quate</a> -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Suscrive Area -->
  <!-- Start contact Area -->
  <div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
      <div class="contact-overly"></div>
      <div class="container ">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Contact us</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-mobile"></i>
                <p>
                  Call : +62 811 163996 / +62 811 929605
                </p>

              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-envelope-o"></i>
                <p>
                  Email: gracewd@multidayamedika.com<br>
                  <!-- <span>Web: www.example.com</span> -->
                </p>
              </div>
            </div>
          </div>
          <!-- Start contact icon column -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="contact-icon text-center">
              <div class="single-icon">
                <i class="fa fa-map-marker"></i>
                <p>
                  Location : PT. Multidaya Medika<br>
                  Rukan Niaga Gunung Sahari<br>
                  Blok B-1Jl. Gunung Sahari Raya <br>
                  No.7 Jakarta Pusat 10720 Indonesia
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- Start Google Map -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <!-- Start Map -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31735.200744433678!2d106.834487!3d-6.14412!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5bccd9f0d7961112!2sPT.Multidaya%20Medika!5e0!3m2!1sen!2sid!4v1619041543444!5m2!1sen!2sid" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <!-- End Map -->
          </div>
          <!-- End Google Map -->

          <!-- Start  contact -->
          <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="form contact-form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
          </div>
          <!-- End Left contact -->
        </div>
      </div>
    </div>
  </div>
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