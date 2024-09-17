<?php
ini_set('display_errors', '0');

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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- VENTANA DE LOGIN -->
	<link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
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
  <main style="background-color:#013660;"><!-- Start #main -->
    <div class="limiter">
      <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33" style="background-color: antiquewhite;">
          <form class="login100-form validate-form flex-sb flex-w">
            <span class="login100-form-title p-b-53">
              REGISTRE
            </span>


            <span class="txt1">
              Nom Usuari
            </span>
            <div class="wrap-input100 validate-input" data-validate = "Username is required">
              <input class="input100" type="text" name="username" >
              <span class="focus-input100"></span>
            </div>

            <span class="txt1">
              E-mail
            </span>
            <div class="wrap-input100 validate-input" data-validate = "Username is required">
              <input class="input100" type="mail" name="username" >
              <span class="focus-input100"></span>
            </div>

            <div class="p-t-13 p-b-9">
              <span class="txt1">
                Contrassenya
              </span>


            </div>
            <div class="wrap-input100 validate-input" data-validate = "Password is required">
              <input class="input100" type="password" name="pass" >
              <span class="focus-input100"></span>
            </div>

            <div class="p-t-13 p-b-9">
              <span class="txt1">
                Confirmar Contrassenya
              </span>


            </div>
            <div class="wrap-input100 validate-input" data-validate = "Password is required">
              <input class="input100" type="password" name="pass" >
              <span class="focus-input100"></span>
            </div>

            <div class="container-login100-form-btn m-t-17">
              <button class="login100-form-btn botonForm">
                Registrar-se
              </button>
            </div>
            <div class="container-login100-form-btn m-t-17">
              <button class="login100-form-btn" style="background-color: white;color:black">
                <img src="assets/login/images/icons/icon-google.png" alt="GOOGLE" style="padding-right: 10px;">
                Google
              </button>
            </div>
            <div class="w-full text-center p-t-55 hoverForm">
              <span class="txt2">
                Ja tens un compte?
              </span>

              <a href="#" class="txt2 bo1">
               Accedir
              </a>
            </div>

          </form>
        </div>
      </div>
    </div>


    <div id="dropDownSelect1"></div>
  </main><!-- End #main -->

<?php

include $templates->footer;

?>
  </body>
</html>
