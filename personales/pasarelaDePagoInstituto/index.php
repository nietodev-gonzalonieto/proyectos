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
  <style media="screen">
      #titolPagament{
        text-align: center;
        padding: 5%;
        font-family: Montserrat-Medium;
        font-size: 39px;
        color: #555555;
      }
      #pagaments{
        padding-left: 20%;
        padding-right: 20%;

      }
      .descripcionTitulo{
        padding-left: 20%;
        padding-top: 3%;
      }

      .descriptionP{
        padding-left: 20%;
        padding-top: 1%;
      }
      .import{
        padding-left: 60%;
        font-size: 40px;
        padding-top: 5%;
      }
      .preu{
        padding-left: 1%;
        font-size: 60px;
        padding-top: 2%;
      }
      .mainPagaments{
        padding-bottom: 10%;
      }
  </style>
</head>
<body>

  <!-- ======= Top Bar ======= -->


  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center" style="background-color: #f6dd7e">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">

        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.html"><img src="assets/img/logo.jpg" alt="" class="img-fluid" style="height: 200p"></a>
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <i class="fas fa-user-alt iniciarSesion"></i><a href="https://www.inscamidemar.cat/" class="iniciarSesion"style=";">Iniciar Sesión</a>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
  <main class="mainPagaments"><!-- Start #main -->
    <h1 id="titolPagament">Pàgina de Pagaments</h1>
    <form id="pagaments">
      <div class="row">
        <div class="col">
          <label for="inputState" class="form-label">Selecciona el Curs</label>
           <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref"></select>
        </div>
        <div class="col">
          <label for="inputState" class="form-label">Opció de pagament</label>
         <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref"></select>
      </div>
    </div>
    </form>
    <div class="row">
      <h2 class="descripcionTitulo">Descripció:</h2>

    </div>
    <div class="row">
      <p class="descriptionP">Aqui se muestra la Descripción:</p>
    </div>
    <div class="row">
      <div class="col" style="padding-left: 2%;">
        <p class="import">Import:</p>
      </div>
      <div class="col">
        <p class="preu">100€</p>
      </div>
      <div class="col" style="padding-top: 1.5%;padding-right: 6%;">
        <button class="login100-form-btn botonForm" style="width: 50%;height: 80px;">
          Fer Pagament
        </button>
    </div>
  </div>
  </main><!-- End #main -->
<br>
<?php

include $templates->footer;

?>
  </body>
</html>
