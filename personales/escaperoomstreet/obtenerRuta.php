<?php
	include 'connect.php';
	$grupo = $_POST["grupo"];
	$query = "SELECT * FROM ruta where grupo = $grupo";
	$resultado = mysqli_query($enlace,$query);
	$arrayRuta = [];
	while ($fila = $resultado -> fetch_assoc()) {
		$clave = new stdClass();
		$clave->id = $fila['id'];
		$clave->id_destino = $fila['id_destino'];
		$clave->id_origen = $fila['id_origen'];		
		$clave->instrucciones = $fila['instrucciones'];
		array_push($arrayRuta, $clave);
	}
	$jsonRuta = json_encode($arrayRuta);
	echo $jsonRuta;
?>