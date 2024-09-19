<?php
	session_start();
	include "connect.php";
	$sql = "SELECT * FROM sospechosos ORDER BY id desc";
	$result = mysqli_query($enlace,$sql);

	if (!isset($_SESSION['admin'])){
		header('Location: panelAdmin.php');
	} else if ($_SESSION['admin'] != 'Loborojo1') {
		header('Location: panelAdmin.php');
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<?php include 'menuFormularios.php'; ?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<title>Añadir Sospechosos</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
	<style type="text/css">

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
		    padding: 2%;
		    background-color: #00A19B;
		    color: #FFF;
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
	</style>
</head>
<body>
	<h1>Añadir Sospechosos</h1>
	<form method="post" enctype="multipart/form-data" action="anadirSospechoso?admin=Loborojo1">
		<label for="pista0">Pista0</label>
		<input type="text" name="pista0" required><br><br>
		<label for="pista1">Pista1</label>
		<input type="text" name="pista1" required><br><br>
	    <label for="fromClave">Pista2</label>
	    <input type="pista2" name="pista2" required><br><br>
	    <label for="goClave">Pista3</label>
	    <input type="pista3" name="pista3" required><br><br>
	    <label for="grupo">Pista4</label>
	    <input type="pista4" name="pista4" required><br><br>
	    <label for="longitud">Pista5</label>
	    <input type="pista5" name="pista5" required><br><br>
	    <label for="latitud">Numero Sospechosos</label>
	    <input type="numsospechoso" name="numsospechoso" required><br><br>
		<input type=submit value="Enviar" name="subir"><br>
	</form>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

<?php
	include "connect.php";

	if (isset($_REQUEST['subir'])) {
		$pista0 = $_REQUEST['pista0'];
	    $pista1 = $_REQUEST['pista1'];
	    $pista2 = $_REQUEST['pista2'];
	    $pista3 = $_REQUEST['pista3'];
	    $pista4 = $_REQUEST['pista4'];
	    $pista5 = $_REQUEST['pista5'];
	    $numsospechoso = $_REQUEST['numsospechoso'];

		$sql = "INSERT INTO sospechosos (pista0, pista1, pista2, pista3, pista4, pista5, numsospechoso)
		VALUES " ."('$pista0', '$pista1', '$pista2', '$pista3', '$pista4', '$pista5', $numsospechoso)";

	    mysqli_query($enlace,$sql);
	}
		$query = "SELECT * FROM sospechosos";
        $resultat = mysqli_query($enlace,$query);
	?>
	<table id="tablaAutomatica" style="text-align: center;">
		<thead>
			<tr>
				<th>pista0</th>
				<th>pista1</th>
				<th>pista2</th>
				<th>pista3</th>
				<th>pista4</th>
				<th>pista5</th>
				<th>numSospechosos</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$contador=1;
				while ($obj = mysqli_fetch_assoc($result)) {
			 ?>
			 <tr>
				 <td><?php echo $obj["pista0"]?></td>
				 <td><?php echo $obj["pista1"]?></td>
				 <td><?php echo $obj["pista2"]?></td>
				 <td><?php echo $obj["pista3"]?></td>
				 <td><?php echo $obj["pista4"]?></td>
				 <td><?php echo $obj["pista5"]?></td>
				 <td><?php echo $obj["numsospechoso"]?></td>
				 <td><a href='borrar.php?nombrePagina=anadirSospechoso&nombreTabla=sospechosos&id=<?php echo $obj['id'];?>'><i class="fas fa-trash"></i></a></td>
			 </tr>
			<?php
					$contador++;
				}
			?>
		</tbody>
	</table>
	<script src="https://kit.fontawesome.com/10a1164e39.js" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script>
		$(document).ready( function () {
			$('#tablaAutomatica').DataTable({
				"order": [[0, "desc"]],
				"iDisplayLength": 100,
				"scrollX": true,
				"autoWidth": false,
				"language":{
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Facturas",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Encara no tenim prou dades",
					"sInfo":           "",
					"sInfoEmpty":      "No hi han resultats",
					"sInfoFiltered":   "(filtrado de un total de MAX registros)",
					"sSearch":         "Cercar:",
					"sInfoThousands":  ",",
					"sLoadingRecords": "Carregant...",
					"oPaginate": {
						"sFirst":    "Primer",
						"sLast":     "Últim",
						"sNext":     "Següent",
						"sPrevious": "Anterior"
					},
					"oAria": {
						"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
						"sSortDescending": ": Activar para ordenar la columna de manera descendente"
					},
					"buttons": {
						"copy": "Copiar",
						"colvis": "Visibilitat"
					}
				}
			})
		});
	</script>
<?php include 'menuFormularios.php'?>
</body>
</html>
