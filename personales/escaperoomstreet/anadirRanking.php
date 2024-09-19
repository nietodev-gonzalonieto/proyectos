<?php
	if (isset($_POST['nombreEquipo'])) {
		include "connect.php";
		$nombreEquipo = $_POST['nombreEquipo'];
		$pistas = $_POST['pistas'];
		$puntuacion = $_POST['puntuacion'];
		$tiempo = $_POST['tiempo'];
		$grupo = $_POST['grupo'];
		$query = "SELECT nombre_equipo from ranking WHERE nombre_equipo LIKE '$nombreEquipo'";
		$resultado = mysqli_query($enlace, $query);
		if (mysqli_num_rows($resultado) == 0) {
			$sql = "INSERT INTO ranking (nombre_equipo, pistas, puntuacion, tiempo, grupo) VALUES ('$nombreEquipo', $pistas, $puntuacion, '$tiempo', $grupo)";
			$resultat = mysqli_query($enlace, $sql);
			echo $sql;
		} else {
			echo "NO";	
		}
	} else {
		header('Location https://escaperoomstreet.com');
	}
?>