<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

    <title>Escape Street Calafell</title>
  </head>
   <body style="background-color:#15649d;">
	<img src="images/icono/ranking.jpg" style="width:100%;max-width:100%;">
		<div class="row" style="max-width:100%;">
			<div class="col-12">
				<center><h4 style="padding:20px;color:white;">RANKING ESCAPE STREET CALAFELL</h4></center>
			</div>
		</div>
		<div class="container">
			<div class="row" style="padding:20px;background-color:white;border-radius: 4px;">
				<div class="col-12">
					<table id="ranking">
						<thead>
							<tr>
								<th><center>Posició</center></th>
								<th><center>Nom</center></th>
								<th><center>Temps</center></th>
								<th><center>Pistes</center></th>
								<th><center>Puntuació</center></th>
								<th><center>Nucli</center></th>
							</tr>
						</thead>
						<tbody>
							<?php
								include "connect.php";
								if(isset($_GET["grupo"])){
									$grupo = $_GET["grupo"];
									$query = "SELECT nombre_equipo,tiempo,pistas,puntuacion,grupo from ranking where grupo = $grupo order by puntuacion desc";
								}else{
									$query = "SELECT nombre_equipo,tiempo,pistas,puntuacion,grupo from ranking order by puntuacion desc";
								}
								$resultado = mysqli_query($enlace, $query);
								$i=0;
								while ($fila = $resultado->fetch_assoc()) {
									$i++;
									echo "<tr>";
									echo "<td><center>".$i."</center></td>";
									echo "<td><center>".$fila["nombre_equipo"]."</center></td>";
									echo "<td><center>".$fila["tiempo"]."</center></td>";
									echo "<td><center>".$fila["pistas"]."</center></td>";
									echo "<td><center>".$fila["puntuacion"]."</center></td>";
									if($fila["grupo"]==7){
										echo "<td><center>Calafell Platja</center></td>";
									}else if($fila["grupo"]==8){
										echo "<td><center>Calafell Platja</center></td>";
									}else if($fila["grupo"]==1){
										echo "<td><center>Segur Calafell</center></td>";
									}else if($fila["grupo"]==2){
										echo "<td><center>Calafell Poble</center></td>";
									}else if($fila["grupo"]==5){
										echo "<td><center>Calafell Platja Infantil</center></td>";
									}else if($fila["grupo"]==4){
										echo "<td><center>Segur Calafell Infantil</center></td>";
									}elseif($fila["grupo"]==6){
										echo "<td><center>Calafell Platja Infantil</center></td>";
									}
									echo "</tr>";
								}
							?>
						</tbody>
					</table>

				</div>
				<div class="col-12">
					<h4>Filtra per nucli</h4>
				</div><br><br>
				<div class="col-12 col-lg-4" style="margin-top:20px;">
					<center><a href="ranking?grupo=7"><button type="button" class="btn btn-warning">Calafell Platja</button></a></center>
				</div>
				<div class="col-12 col-lg-4" style="margin-top:20px;">
					<center><a href="ranking?grupo=1"><button type="button" class="btn btn-warning">Segur de Calafell</button></a></center>
				</div>
				<div class="col-12 col-lg-4" style="margin-top:20px;">
					<center><a href="ranking?grupo=2"><button type="button" class="btn btn-warning">Calafell Poble</button></a></center>
				</div>
				<div class="col-12 col-lg-4" style="margin-top:20px;">
					<center><a href="ranking?grupo=5"><button type="button" class="btn btn-warning">Calafell Platja Infantil</button></a></center>
				</div>
				<div class="col-12 col-lg-4" style="margin-top:20px;">
					<center><a href="ranking?grupo=4"><button type="button" class="btn btn-warning">Segur de Calafell Infantil</button></a></center>
				</div>
			</div>
		</div>

   <script src="js/jquery.js"></script>
   <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
   <script>
		$(document).ready( function () {
			$('#ranking').DataTable({
				"order": [[0, "asc"]],
				"iDisplayLength": 100,
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
