<?php 
	include 'connect.php';
	$grupo = $_POST["grupo"];
    $sql = "SELECT id, nombre, grupo FROM clave where grupo = $grupo";
	$resultado = mysqli_query($enlace,$sql);
	$arrayClave = [];
	while ($fila = $resultado -> fetch_assoc()) {
		$clave = new stdClass();
		$clave->id = $fila['id'];
		$clave->nombre = $fila['nombre'];
		$clave->grupo = $fila['grupo'];
		array_push($arrayClave, $clave);
	}
	$json = json_encode($arrayClave);
	echo $json;
?>