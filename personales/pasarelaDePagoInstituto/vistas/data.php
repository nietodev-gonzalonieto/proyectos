<?php
	session_start();
	include "connect.php";
	$sql = "SELECT * FROM comptes ORDER BY id desc";
	$result = mysqli_query($enlace,$sql);

  ini_set('display_errors', '0');



?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include 'menuFormularios.php'; ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<title>Compte</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!--link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"-->
  <link rel="stylesheet" href="//code.jquery.com/jquery-3.5.1.js">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js">
  <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
  <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js">
  <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js">

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




	<style type="text/css">
	#tablaAutomatica_wrapper{
		text-align: center;
	}
		#tablaAutomatica_filter{
			text-align: center;
			padding-right: 20%;
		}
		#tablaAutomatica_filter.label.input{
			width: 100%;
		}
		#tablaAutomatica_info{
			padding-left: 30%;
		}
		#tablaAutomatica_paginate{
			padding-right: 30%;
}
		}
		div.dt-buttons{
			text-align: center;
		}
		span{
			padding-right: 100px;

		}
		span:hover{
			background-color:none;
			color:orange;
		}
		img {
			max-width: 87px;
			max-height: 87px;
		}
		.btn {
		  	border: none;
		    padding: 18px 58px 18px 19px;
		    text-transform: capitalize;
		    border-radius: 6px;
		    cursor: pointer;
		    color: #fff;
		    display: inline-block;
		    font-size: 16px;
		    background-size: 10%;
		    transition: 0.6s;
		    box-shadow: 0px 7px 21px 0px rgba(0, 0, 0, 0.12);
		    background-color: #00A19B;
		}
		body{
		    background-color: azure;
		    font-size: 1em;
		    font-family: sans-serif;
		}
		h1{
		    text-align: center;
		    color: cadetblue;
        padding: 4%;
		}
		p{
		    text-align: center;
		}
		form{
		    width: 60%;
		    padding: 2%;
		    margin: 10px auto;
		}
		fieldset{ background-color: #FFF; }
		label, input{
		    display: block;
		    width: 48%;
		    height: 30px;
		    padding: 1%;
		    margin-bottom: 10px;
		}
		label{ float: left; }
		input{
		    float: right;
		    border: none;
		    box-shadow: 0 0 3px #AAA;
		}
		input[type="submit"]{
        width: 98%;
        padding-bottom: 3%;
		    background-color: #00A19B;
		    color: #FFF;
		}

    input[type="submit"]:hover{
      background-color: orange;
    }

		table{
		    width: 50%;
		    padding: 1%;
		    margin: 10px auto;
		}
		td{
		    box-shadow: 0 0 3px #CCC;
		    background-color: #FFF;
		}
		th{
		    text-align: left;
		    background-color: #333;
		    color: #FFF;
		}
		.dataTables_wrapper .dataTables_filter input {
			padding: initial;
			width: 100%;
		}

	</style>


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
	<h1>Afegir Compte</h1>
	<form method="post" enctype="multipart/form-data" action="tablaComptes">
		<label for="id">Id</label>
		<input type="text" name="id" required><br><br>
		<label for="establiment">Establiment</label>
		<input type="text" name="establiment" required><br><br>
			<label for="compte">Compte</label>
			<input type="text" name="compte" required><br><br>
			<label for="fuc">Fuc</label>
			<input type="text" name="fuc" required><br><br>
			<label for="clau">Clau</label>
			<input type="text" name="clau" required><br><br><br>

		<input type=submit value="Enviar" name="subir"><br>
	</form>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <div style="padding-top: 4%; padding-bottom: 4%;">
  <?php
  	include "connect.php";

  	if (isset($_REQUEST['subir'])) {
  		$id = $_REQUEST['id'];
  	    $establiment = $_REQUEST['establiment'];
  	    $compte = $_REQUEST['compte'];
  	    $fuc = $_REQUEST['fuc'];
  	    $clau = $_REQUEST['clau'];

  		$sql = "INSERT INTO comptes (id, establiment, compte, fuc, clau)
  		VALUES ('$id', '$establiment', '$compte', '$fuc', '$clau')";

  	    mysqli_query($enlace,$sql);
  	}
  		$query = "SELECT * FROM comptes";
          $resultat = mysqli_query($enlace,$query);
  	?>

  	<table id="tablaAutomatica" style="text-align: center; width: 70%;">
  		<thead>
  			<tr>
  				<th>id</th>
  				<th>establiment</th>
  				<th>compte</th>
  				<th>fuc</th>
  				<th>clau</th>
  				<th>Eliminar</th>
  			</tr>
  		</thead>
  		<tbody>
  			<?php
  				$contador=1;
  				while ($obj = mysqli_fetch_assoc($result)) {
  			 ?>
  			 <tr>
  				 <td><?php echo $obj["id"]?></td>
  				 <td><?php echo $obj["establiment"]?></td>
  				 <td><?php echo $obj["compte"]?></td>
  				 <td><?php echo $obj["fuc"]?></td>
  				 <td><?php echo $obj["clau"]?></td>
  				 <td><a href='borrar.php?nombrePagina=tablaComptes&nombreTabla=comptes&id=<?php echo $obj['id'];?>'><i class="fas fa-trash"></i></a></td>
  			 </tr>
  			<?php
  					$contador++;
  				}
  			?>
  		</tbody>
  	</table>
  </div>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.colVis.min.js"></script>
		<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script>
  $(document).ready(function(){
    var cTable = $('#tablaAutomatica').DataTable({
        searching: true,
        responsive: true,
        bLengthChange: false,
        "autoWidth": false,
        language: {
         searchPlaceholder: 'Busca per ID',
         sSearch: '',
         },
         dom: 'Bfrtip',
    buttons: [
      {
        extend: 'collection',
        text: 'Descarregar',
        className: 'btn-outline-secondary',
        buttons: [
          {
            extend: 'excelHtml5',
            className: 'btn-outline-secondary',
            exportOptions: {
              columns: ':visible'
            }
          },
          {
            extend: 'pdfHtml5',
            className: 'btn-outline-secondary',
            exportOptions: {
              columns: ':visible'
            }
          }
        ]
      },
      {
        extend: 'colvis',
        className: 'btn-outline-secondary',
        text: 'Filtrar per columna'
      },
    ]
    });
});
</script>
<footer id="footer" style="background-color:#f3ce54 ; color:#00365f">
  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong>INS Camí de Mar</strong>. Calafell
    </div>
  </div>
</footer><!-- End Footer -->
  </body>
</html>
