<?php
	session_start();
	include "connect.php";

	if (isset($_REQUEST['subir'])) {
		$pista1 = $_REQUEST['pista1'];
	    $pista2 = $_REQUEST['pista2'];
	    $pista3 = $_REQUEST['pista3'];
	    $resultado = $_REQUEST['resultado'];
	    $tipo = $_REQUEST['tipo'];
	    $descripcion = $_REQUEST['descripcion'];
	    $id = $_REQUEST['id'];
	    if (isset($_REQUEST['id'])) {
	    	$sql = "UPDATE pruebas SET pista1 = '$pista1', pista2 = '$pista3', resultado = '$resultado', tipo = '$tipo', descripcion = '$descripcion'
			WHERE id = '$id'";
			mysqli_query($enlace,$sql);
	    } else {
	    	$sql = "INSERT INTO pruebas (pista1, pista2, pista3, resultado, tipo, descripcion) VALUES " .
		    "('$pista1', '$pista2', '$pista3', '$resultado', '$tipo', '$descripcion')";
	    	mysqli_query($enlace,$sql);
	    }
	}
		$query = "SELECT * FROM pruebas";

        $resultat = mysqli_query($enlace,$query);

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
    <script src="https://kit.fontawesome.com/10a1164e39.js" crossorigin="anonymous"></script>
	<title>Añadir Pruebas</title>
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

	<style type="text/css">
		img {
			max-width: 87px;
			max-height: 87px;
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
	</style>
</head>
<body>
	<?php include 'menuFormularios.php'?>
	<a name="editar"></a>
	<div class="container" style="margin-top: 70px;">
		<h1 >Añadir Prueba</h1>
		<div class="row">
			<div class="col-1">
			</div>
			<div class="col-10">
				<form method="post" enctype="multipart/form-data" action="">
					<div class="form-group">
						<label for="pista1">Pista1</label>
						<input type="text" class="form-control" name="pista1" id="pista1" placeholder="Pista 1" required>
					</div>
					<div class="form-group">
						<label for="pista2">Pista2</label>
						<input type="text" class="form-control" name="pista2" id="pista2" placeholder="Pista 2" required>
					</div>
					<div class="form-group">
					    <label for="pista3">pista3</label>
					    <input type="text" class="form-control" name="pista3" id="pista3" placeholder="Pista 3" required>
					</div>
					<div class="form-group">
					    <label for="resultado">Resultado</label>
					    <input type="text" class="form-control" name="resultado" id="resultado" placeholder="Resultado" required>
					</div>
					<div class="form-group">
					    <label for="tipo">Tipo</label>
					    <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Tipo" required>
					</div>
					<div class="form-group">
					    <label for="descripcion">Descripcion</label>
					    <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion" required>
					</div>
					<input type="hidden" name="id" id="id">
					<input type=submit value="Enviar" name="subir" class="btn btn-primary btn-lg btn-block" style="height: 50px;"><br>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php
		echo "<table id='tabla'class='cell-border' style='text-align: center;'>
			<thead style='background-color: #333; color: white;'>
                <tr>
					<th>Id</th>
                    <th>Pista1</th>
                    <th>Pista2</th>
                    <th>Pista3</th>
                    <th>Resultado</th>
                    <th>Tipo</th>
                    <th>Descripción</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
			</thead><tbody>";
        while ($fila = mysqli_fetch_assoc($resultat)) {
            echo "<tr>
		    <td>".$fila['id']."</td>
                    <td>".$fila['pista1']."</td>
                    <td>".$fila['pista2']."</td>
                    <td>".$fila['pista3']."</td>
                    <td>".$fila['resultado']."</td>
                    <td>".$fila['tipo']."</td>
                    <td>".$fila['descripcion']."</td>
                    <td><a href='#editar'<button
				 	data-pista1='".$fila['pista1']."'
                    data-pista2='".$fila['pista2']."'
                    data-pista3='".$fila['pista3']."'
                    data-resultado='".$fila['resultado']."'
                    data-tipo='".$fila['tipo']."'
                    data-descripcion='".$fila['descripcion']."'
                    data-id='".$fila['id']."'
                    onclick='recogerDatos(this);' class='btn btn-primary' ><i class='far fa-edit'></i></a></button></td>
                    <td><a href='borrar.php?nombrePagina=anadirPrueba&nombreTabla=pruebas&id=".$fila['id']."'><i class='fas fa-trash'></i></a></td>
                </tr>";
        }
        echo "</tbody></table>";
		$query = "SELECT p.id,p.pista1,p.pista2,p.pista3,p.tipo,p.resultado,l.grupo,p.descripcion FROM `pruebas` as `p` inner join lugar as l ON l.id_prueba = p.id";

        $resultat = mysqli_query($enlace,$query);
		echo "<br><br><br><br><br>";
        echo "<table id='tabla2' class='cell-border' style='text-align: center;'>
			<thead style='background-color: #333; color: white;'>
                <tr>
					<th>Id</th>
                    <th>Pista1</th>
                    <th>Pista2</th>
                    <th>Pista3</th>
                    <th>Resultado</th>
                    <th>Tipo</th>
                    <th>Nucli</th>
                    <th>Descripcion</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr></thead></tbody>";
        while ($fila = mysqli_fetch_assoc($resultat)) {
            echo "<tr>
		   			<td>".$fila['id']."</td>
                    <td>".$fila['pista1']."</td>
                    <td>".$fila['pista2']."</td>
                    <td>".$fila['pista3']."</td>
                    <td>".$fila['resultado']."</td>
                    <td>".$fila['tipo']."</td>
                    <td>".$fila['grupo']."</td>
                    <td>".$fila['descripcion']."</td>
                    <td><a href='#editar'<button
				 	data-pista1='".$fila['pista1']."'
                    data-pista2='".$fila['pista2']."'
                    data-pista3='".$fila['pista3']."'
                    data-resultado='".$fila['resultado']."'
                    data-tipo='".$fila['tipo']."'
                    data-grupo='".$fila['grupo']."'
                    data-descripcion='".$fila['descripcion']."'
                    data-id='".$fila['id']."'
                    onclick='recogerDatos(this);' class='btn btn-primary' ><i class='far fa-edit'></i></a></button></td>
                    <td><a href='borrar.php?nombrePagina=anadirPrueba&nombreTabla=pruebas&id=".$fila['id']."'><i class='fas fa-trash'></i></a></td>
                </tr>";
        }
        echo "</tbody></table>";
?>
   <script src="js/jquery.js"></script>
   <script type="text/javascript">
		function recogerDatos(element) {
			console.log("paso");
			$('#pista1').val($(element).attr('data-pista1'));
			$('#pista2').val($(element).attr('data-pista2'));
			$('#pista3').val($(element).attr('data-pista3'));
			$('#resultado').val($(element).attr('data-resultado'));
			$('#tipo').val($(element).attr('data-tipo'));
			$('#grupo').val($(element).attr('data-grupo'));
			$('#descripcion').val($(element).attr('data-descripcion'));
			$('#id').val($(element).attr('data-id'));
		}
	</script>
   <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
   <script>
		$(document).ready( function () {
			$('#tabla').DataTable({
				"order": [[0, "desc"]],
				"scrollX": true,
				"autoWidth": false,
				"language":{
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "_MENU_",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Encara no tenim prou dades",
					"sInfo":           "_START_ - _END_ de _TOTAL_ registres",
					"sInfoEmpty":      "No hi han resultats",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
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

			});
			$('#tabla2').DataTable({
				"order": [[0, "desc"]],
				"scrollX": true,
				"autoWidth": false,
				"language":{
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "_MENU_",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Encara no tenim prou dades",
					"sInfo":           "_START_ - _END_ de _TOTAL_ registres",
					"sInfoEmpty":      "No hi han resultats",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
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
</body>
</html>
