<?php
require "../app/config.php";

$title = "Inici - INS Cami de Mar";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Font Awesome CDN -->
  <script src="https://kit.fontawesome.com/a4df976903.js" crossorigin="anonymous"></script>

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/miCss.css" rel="stylesheet">
</head>
<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-none d-lg-block" style="background-color:#f3ce54">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="fas fa-reply" style="color:#00365f"></i><a href="https://www.inscamidemar.cat/">Tornar a INS Camí de Mar</a>

      </div>
      <div>
      <!--div class="social-links"-->
        <i class="fas fa-user-alt iniciarSesion"></i><a href="https://www.inscamidemar.cat/" class="iniciarSesion"style=";">Iniciar Sesión</a>
        <!--a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a-->
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center" style="background-color: #f6dd7e">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">

        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.html"><img src="assets/img/logo.jpg" alt="" class="img-fluid" style="height: 200p"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="#header" style="color:grey">Inici</a></li>
          <li><a href="#about">ESO</a></li>
          <li><a href="#about">Batxillerat</a></li>
          <li><a href="#services">Ciles Formatius</a></li>
          <li><a href="#portfolio">Profesorat</a></li>
          <li><a href="#team">Team</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main><!-- End #main -->

  </main><!-- End #main -->

<?php

include $templates->footer;

?>
