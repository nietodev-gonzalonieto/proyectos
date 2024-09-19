<?php
	include "connect.php";

	$nombrePagina = $_GET['nombrePagina'];
	$nombreTabla = $_GET['nombreTabla'];
	$id = $_GET['id'];
	$sql = "DELETE FROM ".$nombreTabla." WHERE id = ".$id;
	mysqli_query($enlace,$sql);
	header('Location: '.$nombrePagina.'.php');
?>
