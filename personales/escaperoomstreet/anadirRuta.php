<?php
	session_start();
	include 'connect.php';
	if (!isset($_SESSION['admin'])){
		header('Location: panelAdmin.php');
	} else if ($_SESSION['admin'] != 'Loborojo1') {
		header('Location: panelAdmin.php');
	}
	$sql2 = "SELECT grupo FROM ruta GROUP BY grupo";

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/10a1164e39.js" crossorigin="anonymous"></script>
	<title>Añadir Ruta</title>
	<style type="text/css">
		body {
			background-color: azure;
		}
		textarea {
			width: 90%;
			height: 10em;
			margin-left: 5%;
		}
		label {
			font-size: 20px;
			font-weight: bold;
		}
		h1 {
			text-align: center;
		}
		#grupo{
			margin-left: 5%;
	 		}
		/*.btn {
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
		}*/
		.btn{
			border: none;
			padding: 18px 37px 19px 30px;
			text-transform: capitalize;
			border-radius: 9px;
			text-decoration: none;
			cursor: pointer;
			color: #fff;
			background: linear-gradient(
		180deg
		, #65bce8 0%, #306485 100%);
			display: inline-block;
			/* font-weight: bold; */
			font-size: 24px;
			background-size: 10%;
			transition: 0.6s;
			box-shadow: 0px 7px 21px 0px rgb(0 0 0 / 12%);
			background-color: #00A19B;
			/* display: inline-block; */
			margin: 9px;
			padding-left: 39px;
		}
		.siguienteAtras{
			border: none;
		  padding: 17px 55px 16px 7px;
			text-transform: capitalize;
			border-radius: 9px;
			text-decoration:none;
			cursor: pointer;
			color: #fff;
			background: linear-gradient(180deg, #65bce8 0%, #306485 100%);
			display: inline-block;
			font-weight: bold;
			font-size: 24px;
			background-size: 10%;
			transition: 0.6s;
			box-shadow: 0px 7px 21px 0px rgb(0 0 0 / 12%);
			background-color: #00A19B;
			/* display: inline-block; */
			margin: 12px;
			padding-left: 57px;
		}
		.siguienteAtras.hover{
			background-position: 0 -50px;
    	transition: all .3s;
		}
	</style>
</head>
<body>
	<?php include 'menuFormularios.php'?>
	<div class="container" style="margin-top:70px;"> 
	<h1>Añadir Ruta</h1>
	<h1 id="titulo"></h1>
		<form action="" method="post">
		<select onchange="recibirRuta();" name="grupo" id="grupo">
			<?php
			$result = mysqli_query($enlace, $sql2);
			while($row = mysqli_fetch_array($result)) {
				echo "patata";
				echo "<option>".$row['grupo']."</option>";
		 };
		 ?>
		</select>
			<div id="textArea"></div>
			<input type="hidden" name="id_origen" id="id_origen">
			<input type="hidden" name="posicion" id="posicion" value=0>
		<div>
			<div class="row">
				<div class="col-4">
					<center><a href="#" onclick="atras();" class="btn btn-info">Atras</a><br></center>
				</div><br>
				<div class="col-4">
						<center><input type="submit" name="guardar" id="guardar" class="btn"></center>
					</div>
					<div class="col-4">
						<center><a href="#" onclick="siguiente();" class="btn btn-info">Siguiente</a></center>
					</div>
				</div>

				</div>
		</form>
	</div>


	<?php

	if(isset($_REQUEST["posicion"])){
		$posicion = $_REQUEST["posicion"];
	}else {
		$posicion=0;
	}
	$contador=0;
	$comprobador1=false;
	$comprobador2=false;
	function escribirTextArea(){
		global $comprobador1,$comprobador2,$contador,$enlace;
		if($comprobador1 != true || $comprobador2 != true){
			if(isset($_REQUEST['textArea'.$contador])){
				$textArea = $_REQUEST['textArea'.$contador];
				$textArea = addslashes($textArea);
				$id_origen = $_REQUEST['id_origen'];
				$grupo = $_REQUEST['grupo'];
				$id_destino = $_REQUEST['id_destino'.$contador];
				$sql = "SELECT ID FROM ruta WHERE id_origen = $id_origen AND id_destino = $id_destino";
				$resultado = mysqli_query($enlace, $sql);
				if (mysqli_num_rows($resultado) > 0) {
					$sql = "UPDATE ruta
					SET instrucciones = '$textArea'
					WHERE id_origen = $id_origen AND id_destino = $id_destino";
					$resultado = mysqli_query($enlace,$sql);
					} else {
					$sql = "INSERT INTO ruta (instrucciones, id_origen, id_destino,grupo)
			    	VALUES ('$textArea', $id_origen, $id_destino, $grupo)";
			    	$resultado = mysqli_query($enlace,$sql);
				}
				echo $sql;
				$contador = $contador + 1;
				escribirTextArea();
			}else{
				if($comprobador1 != true){
					$comprobador1=true;
					$contador = $contador + 1;
					escribirTextArea();
				}else{
					$comprobador2=true;
					$contador = $contador + 1;
					escribirTextArea();
				}
			}
		}

	}
	escribirTextArea();
	?>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript">
		var todosLosDatos = new Array();
		var posicion=<?php echo $posicion;?>;
		var datosRuta = new Array();
		function recibirRuta(){
			datosRuta = [];
			todosLosDatos = [];
			$.ajax({
				// la URL para la petición
				url : 'obtenerRuta.php',

				// la información a enviar
				// (también es posible utilizar una cadena de datos)
				data : { grupo : $("#grupo").val() },

				// especifica si será una petición POST o GET
				type : 'POST',

				// el tipo de información que se espera de respuesta
				dataType : 'json',

				// código a ejecutar si la petición es satisfactoria;
				// la respuesta es pasada como argumento a la función
				success : function(json) {
					for (var i=0;i < json.length;i++) {
						datosRuta.push(json[i]);
					}
					recibirClave();
				},

				// código a ejecutar si la petición falla;
				// son pasados como argumentos a la función
				// el objeto de la petición en crudo y código de estatus de la petición
				error : function(xhr, status) {
					console.log('Error');
				},

				// código a ejecutar sin importar si la petición falló o no
				complete : function(xhr, status) {
					console.log('Petición realizada');
				}

			});
		}

		function mostrarResultado(numero) {
			document.getElementById("titulo").innerHTML = todosLosDatos[numero].nombre;
		}

		function siguiente(){
			posicion++;
			if (posicion<todosLosDatos.length) {
				mostrarResultado(posicion);
				crearTextArea();
			} else {
				posicion--;
			}
			$("#posicion").val(posicion);
		}
		function atras(){
			if (posicion >0) {
				posicion--;
				mostrarResultado(posicion);
				crearTextArea();
				$("#posicion").val(posicion);
			}
		}
		function deClaveAClave(origen,destino){//Funcion que indica como llegar desde un punto clave a otro Parece que entra en conflicto con la letra i del metodo de leerArray y por eso le he puesto una J
			for(var i=0;i<datosRuta.length;i++){
				if(origen==datosRuta[i]['id_origen']){
					if(destino==datosRuta[i]['id_destino']){
						return datosRuta[i]['instrucciones'];
					}
				}
			}
		}
		function crearTextArea(){
			$("#textArea").html("");
			for (var i=0;i<todosLosDatos.length;i++){
				document.getElementById('id_origen').value = todosLosDatos[posicion].id;
				if (i!=posicion) {
					$("#textArea").append("<input type='hidden' name='id_destino"+i+"' value='"+todosLosDatos[i].id+"'>");
					$("#textArea").append("<center><label>"+todosLosDatos[posicion].nombre+" para "+todosLosDatos[i].nombre+"</label></center><br>");
					var resultadoClave = deClaveAClave(todosLosDatos[posicion].id,todosLosDatos[i].id);
					if (!vacio(resultadoClave)) {
						$("#textArea").append("<textarea name='textArea"+i+"'>"+resultadoClave+"</textarea><br>");
						$("#textArea").append("<input type='hidden' name='textArea"+i+"Anterior' value='"+resultadoClave+"'><br>");
					} else {
						$("#textArea").append("<textarea name='textArea"+i+"' rows='4' cols='50'></textarea><br>");
						$("#textArea").append("<input type='hidden' name='textArea"+i+"Anterior' value='"+resultadoClave+"'><br>");
					}
				}
			}
		}
		function vacio(cadena) {
		    return (!cadena || 0 === cadena.length);
		}
		function recibirClave(){
			$.ajax({
			// la URL para la petición
			url : 'obtenerClave.php',

			// la información a enviar
			// (también es posible utilizar una cadena de datos)
			data : { grupo : $("#grupo").val() },

			// especifica si será una petición POST o GET
			type : 'POST',

			// el tipo de información que se espera de respuesta
			dataType : 'json',

			// código a ejecutar si la petición es satisfactoria;
			// la respuesta es pasada como argumento a la función
			success : function(json) {
				for (var i=0;i < json.length;i++) {
					todosLosDatos.push(json[i]);
				}
				mostrarResultado(posicion);
				crearTextArea();

			},

			// código a ejecutar si la petición falla;
			// son pasados como argumentos a la función
			// el objeto de la petición en crudo y código de estatus de la petición
			error : function(xhr, status) {
				console.log('Error');
			},

			// código a ejecutar sin importar si la petición falló o no
			complete : function(xhr, status) {
				console.log('Petición realizada');
			}

		});
	}
	recibirRuta();
	</script>
</body>
</html>
