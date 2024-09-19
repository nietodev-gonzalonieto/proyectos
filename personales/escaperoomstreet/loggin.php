<?php
	session_start();
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];
	if ($usuario == 'admin') {
		$_SESSION['user']='admin';
		if ($contrasena == 'Loborojo1') {
			$_SESSION['admin']="Loborojo1";	
			header('Location: todosFormularios.php');
		} else {
			header('Location: panelAdmin.php');
		}
	} else {
			header('Location: panelAdmin.php');
	}
?>
