<?php
	session_start();
	//include "connect.php";
	$sql = "SELECT * FROM lugar ORDER BY id desc";
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
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<title>Añadir Lugar</title>
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
	<?php include 'menuFormularios.php'?>
	<h1>Añadir Lugar</h1>
	<form method="post" enctype="multipart/form-data" action="anadirLugar">
		<label for="name">Nombre</label>
		<input type="text" name="nombre" id="nombre" required><br><br>
		<label for="name">Direccion</label>
		<input type="text" name="direccion" id="direccion" required><br><br>
	    <label for="fromClave">Direccion para volver al punto clave</label>
	    <input type="text" name="fromClave" id="fromClave" required><br><br>
	    <label for="goClave">Direccion para ir al punto clave</label>
	    <input type="text" name="goClave" id="goClave" required><br><br>
	    <label for="grupo">Grupo</label>
	    <input type="text" name="grupo" id="grupo" required><br><br>
	    <label for="longitud">Longitud</label>
	    <input type="text" name="longitud" id="longitud" required><br><br>
	    <label for="latitud">Latitud</label>
	    <input type="text" name="latitud" id="latitud" required><br><br>
	    <label for="archivoSubido">Sube un archivo:</label>
	    <input type="file" name="archivoSubido" id="archivoSubido" required><br>
	    <input type="hidden" name="idLugar" id="idLugar">
	   	<br><label>ID de Pruebas</label>
	   	<select name="id_prueba" id="id_prueba" required>
	   		<?php
				include 'connect.php';
				$arrayDescripcion = array();
			    $sql = 'SELECT id,descripcion FROM pruebas';
				$resultado = mysqli_query($enlace,$sql);
				echo "<label>ID de pruebas</label><br>";
				while ($fila = $resultado -> fetch_assoc()) {
					$arrayDescripcion[$fila['id']] = $fila['descripcion'];
					echo "<option value='".$fila['id']."'>
						".$fila['descripcion']."
					</option>";
				}
			?>
		</select><br>
		<br>
		<br>
		<br><label>ID de Clave</label>
		<select name="id_clave" required>
	   		<?php
			    $sql = 'SELECT id,nombre FROM clave';
				$resultado = mysqli_query($enlace,$sql);
				while ($fila = $resultado -> fetch_assoc()) {
					echo "<option value='".$fila['id']."'>
					".$fila['nombre']."
					</option>";
				}
			?>
		</select><br>
		<input type="submit" value="Enviar" name="subir"><br>
	</form>
</body>
</html>

<?php
	include "connect.php";

	if (isset($_REQUEST['subir'])) {
		$nombre = $_REQUEST['nombre'];
	    $direccion = $_REQUEST['direccion'];
	    $direccion = addslashes($direccion);
	    $archivoSubido = $_FILES['archivoSubido']['name'];
	    $fromClave = $_REQUEST['fromClave'];
	    $fromClave = addslashes($fromClave);
	    $goClave = $_REQUEST['goClave'];
	    $goClave = addslashes($goClave);
	    $grupo = $_REQUEST['grupo'];
	    $longitud = $_REQUEST['longitud'];
	    $latitud = $_REQUEST['latitud'];
	    $id_clave = $_REQUEST['id_clave'];
		$id_prueba = $_REQUEST['id_prueba'];
		$idLugar = $_REQUEST['idLugar'];

		if(isset($archivoSubido)){
			if (is_uploaded_file ($_FILES['archivoSubido']['tmp_name'])){
				$directorioRuta = "images/locales/";
				$nombreFichero = $_FILES['archivoSubido']['name'];
				$copiarFichero = true;
				$nombreCompleto = $directorioRuta . $nombreFichero;
				move_uploaded_file($_FILES['archivoSubido']['tmp_name'],$nombreCompleto);

		 	if (is_file($nombreCompleto)){
				$idUnico = time();
				$nombreFichero = $idUnico . "-" . $nombreFichero;
		 	}

			} else if ($_FILES['archivoSubido']['error'] == UPLOAD_ERR_FORM_SIZE){
				$maxsize = $_REQUEST['MAX_FILE_SIZE'];
				$errores[$archivoSubido] = "Demasiado grande el archivo , $maxsize bytes";
				$error = true;
			} else if ($_FILES['archivoSubido']['name'] == ""){
				$nombreFichero = '';
			}else{
				$errores[$archivoSubido] = "No se puede subir el fichero";
			 	$error = true;
			}
		}
		if (isset($_REQUEST['idLugar'])) {
			$sql = "UPDATE lugar SET  direccion = '$direccion', nombre = '$nombre', foto = '$archivoSubido', fromClave = '$fromClave', goClave = '$goClave', grupo = $grupo, longitud = $longitud, latitud = $latitud, id_clave = '$id_clave', id_prueba = '$id_prueba'
			WHERE id = '$idLugar'";

		    mysqli_query($enlace,$sql);
		} else {
			$sql = "INSERT INTO lugar (direccion, nombre, foto, fromClave, goClave, grupo, longitud, latitud, id_clave, id_prueba) VALUES " .
		    "('$direccion', '$nombre', '$archivoSubido', '$fromClave', '$goClave', $grupo, $longitud, $latitud, '$id_clave', '$id_prueba')";

		    mysqli_query($enlace,$sql);
	    }
	}
		$query = "SELECT * FROM lugar";

        $resultat = mysqli_query($enlace,$query);

?>
		<table id="tablaAutomatica" style="text-align: center; margin-left: 0px; width: 1887px;">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Direccion</th>
					<th>FromClave</th>
					<th>GoClave</th>
					<th>Grupo</th>
					<th>Longitud</th>
					<th>Latitud</th>
					<th>ID_Clave</th>
					<th>ID_Prueba</th>
					<th>Foto</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$contador=1;
					while ($obj = mysqli_fetch_assoc($result)) {
				 ?>
				 <tr>
					 <td><?php echo $obj["nombre"]?></td>
					 <td><?php echo $obj["direccion"]?></td>
					 <td><?php echo $obj["fromClave"]?></td>
					 <td><?php echo $obj["goClave"]?></td>
					 <td><?php echo $obj["grupo"]?></td>
					 <td><?php echo $obj["longitud"]?></td>
					 <td><?php echo $obj["latitud"]?></td>
					 <td><?php echo $obj["id_clave"]?></td>
					 <td><?php echo $obj["id_prueba"]?></td>
					 <td><img src='images/locales/<?php echo $obj["foto"]?>'></td>
					 <td><a href='borrar.php?nombrePagina=anadirLugar&nombreTabla=lugar&id=<?php echo $obj['id'];?>'><i class="fas fa-trash"></i></a></td>
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
