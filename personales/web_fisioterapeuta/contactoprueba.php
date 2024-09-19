<?php
	$status = array(
			'type'=>'success',
			'message'=>'Email enviado!'
		);
	error_reporting( E_ALL & ~( E_NOTICE | E_STRICT | E_DEPRECATED ) ); //Aquí se genera un control de errores "NO BORRAR NI SUSTITUIR"
	require_once "Mail.php"; //Aquí se llama a la función mail "NO BORRAR NI SUSTITUIR"
	
	if (isset($_POST['enviar']) {
	 	$name = $_POST['name'];
	 	$message = $_POST['message'];
	 	$email = $_POST['email'];
	 	$subject = $_POST['subject'];
	 	$telefono = $_POST['telefono'];

 	 	$to = 'contacto@fisioterapiavendrell.com'; //Aquí definimos quien recibirá el formulario
		$from = 'contacto@fisioterapiavendrell.com'; //Aquí definimos que cuenta mandará el correo, generalmente perteneciente al mismo dominio
		$host = 'smtp.fisioterapiavendrell.com'; //Aquí definimos cual es el servidor de correo saliente desde el que se enviaran los correos
		$username = 'contacto@fisioterapiavendrell.com'; //Aqui se define el usuario de la cuenta de correo
		$password = 'Stl020217Stl020217'; //Aquí se define la contraseña de la cuenta de correo que enviará el mensaje
		echo $message . " ".$name." asasas";
		$body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Telefono: '. $telefono . "\n\n" . 'Message: ' . $message;

		//A partir de aquí empleamos la función mail para enviar el formulario

		$headers = array ('From' => $from,
		'To' => $to,
		'Subject' => $subject);
		$smtp = Mail::factory('smtp',
		array ('host' => $host,
		'auth' => true,
		'Port' => 587,
		'username' => $username,
		'password' => $password));

		$mail = $smtp->send($to, $headers, $body);

		header("Location: contacto");
	}



	//Una vez aquí habremos enviado el mensaje mediante el formulario

	//El siguiente codigo muestra en pantalla un mensaje indicando que el mensaje ha sido enviado y a que cuenta ES OPCIONAL desde Acens lo incluimos para verificar que el formulario de prueba esta funcionando
?>
