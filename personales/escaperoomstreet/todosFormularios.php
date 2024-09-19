<?php
	
	include "connect.php";
	$sql = "SELECT COUNT(*) FROM clave";
	$sql2 = "SELECT COUNT(*) FROM lugar";
	$sql3 = "SELECT COUNT(*) FROM pruebas";
	$sql4 = "SELECT COUNT(*) FROM ruta";
	$sql5 = "SELECT COUNT(*) FROM sospechosos";

	$result = mysqli_query($enlace,$sql);

	$num_resul=mysqli_num_rows($result);

	$arraySql = array();
	$contadorClave=0;

	if (!isset($_SESSION['admin'])){
		header('Location panelAdmin.php');
	} else if ($_SESSION['admin'] != 'Loborojo1') {
		header('Location panelAdmin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body {
			background-color: azure;
		}
		textarea {
			width: 99%;
			height: 10em;
		}
		label {
			font-size: 20px;
			font-weight: bold;
		}
		h1 {
			text-align: center;
    	font-weight: bold;
    	font-family: sans-serif;
		}
		.btn {
			border: none;
			padding: 30px 67px 20px 7px;
			text-transform: capitalize;
			border-radius: 9px;
			text-decoration:none;
			cursor: pointer;
			color: #fff;
			background: linear-gradient(180deg, #65bce8 0%, #306485 100%);
			display: inline-block;
			font-weight: bold;
			font-size: 24px;
			background-size: 10%;
			transition: 0.6s;
			box-shadow: 0px 7px 21px 0px rgb(0 0 0 / 12%);
			background-color: #00A19B;
			/* display: inline-block; */
			margin: 12px;
			padding-left: 57px;
		}
		.btn:hover {
			background-position: 0 -50px;
    transition: all .3s;
			}
		.btn:active {
			position: relative;
			top: 1px;
		}
	</style>
</head>
<body>
	<div>

		<center><img src="images/icono/logoApp.png"></center>
		<div>
			<center>
				<?php while($row = mysqli_fetch_array($result)) {
					echo "<a href='anadirClave.php' class='btn'>Añadir Clave <br>".$row[0]."</a>";
					$contadorClave=$row[0];
				}

					$result = mysqli_query($enlace,$sql2);
					while($row = mysqli_fetch_array($result)) {
						echo "<a href='anadirLugar.php' class='btn'>Añadir Lugar <br> ".$row[0]."</a>";
						$contadorClave=$row[0];
					}

					$result = mysqli_query($enlace,$sql3);
					while($row = mysqli_fetch_array($result)) {
						echo "<a href='anadirPrueba.php' class='btn'>Añadir Prueba <br> ".$row[0]."</a>";
						$contadorClave=$row[0];
					}
					$result = mysqli_query($enlace,$sql4);
					while($row = mysqli_fetch_array($result)) {
						echo "<a href='anadirRuta.php' class='btn'>Añadir Ruta <br> ".$row[0]."</a>";
						$contadorClave=$row[0];
					}
					$result = mysqli_query($enlace,$sql5);
					while($row = mysqli_fetch_array($result)) {
						echo "<a href='anadirSospechoso.php' class='btn'>Añadir Sospechoso <br> ".$row[0]."</a>";
						$contadorClave=$row[0];
					}?>
			</div>
		</div>
	<!--include 'menuFormularios.php'-->
</body>
</html>
