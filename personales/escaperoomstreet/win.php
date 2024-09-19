<?php
	if(!isset($_GET["win"])){
		header("Location: index.php");
	}else{
		if($_GET["win"]!="win"){
			header("Location: index.php");
		}
	}	
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/jquery.js"></script>
    <title>CALAFELL STREET</title>
  </head>
  <body onLoad="cargarDatos();">
   <h1 class="instruccionesTitulo">ENHORABONA!</h1>
   <center><h4 style="color:white;">RECULL EL TEU REGAL.</h4></center>
  <center><div class="espaciadoSoloArriba textoBlanco active" id="presentacion">
		<center><div class="row" style="width:100%;">
			<div class="col-12">
				<div style="text-align:left;">
					<img src="images/icono/logo.png" style="border-radius:50px;border:2px solid #EB5B5B;">
					<span style="text-align:left;font-weight:bold;font-size:0.8em;">Diari Calafell</span><br>
				</div>
			</div>
			<br>
				<div class="col-12" style="margin-top:10px;">
				<div style="background-color:#00a19b;border-radius:2px;">
					<div style="font-size:1.8em;font-weight:bold;color:white;">CALAFELL DIARI</div>
					<span style="font-size:0.7em;position:relative;bottom:10px;"><?php echo date("d") . " " . date("m") . " " . date("Y"); ?></span>
					<div class="row">
						<div class="col-8">
							<div style="font-size:1.2em;font-weight:bold;">LLADRE ATRAPAT</div>
							<p>El lladre ha sigut atrapat, pel famós grup de detectius <b>"<span id="nombreEquipo"></span>"</b>. Han aconseguit atrapar el lladre en tan sols <b><span id="tiempoEmpleado"></span></b>.<br>A més han sol·licitat un total de <b><span id="pistasNecesarias"></span> pistes</b>.</p>
						</div>
						<div class="col-4">
						<img src="images\icono\estrellaLogo.png" style="max-width:100%;">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-6"><div style="text-align:left;font-size:1.2em;color:red;"><i onclick="corazon(this);" class="far fa-heart"></i></div></div>
					<div class="col-6"><div style="text-align:right;font-size:1.2em;"><i class="far fa-bookmark"></i></div></div><br>
					<div class="col-12"><div style="text-align:left;font-size:0.7em;font-weight:bold;"><span id="contadorMeGusta">12M</span> Me gusta</div></div>
					<div class="col-12"><div style="text-align:left;font-size:0.7em;font-weight:bold;">DiariCalafell</div> <div style="text-align:left;font-size:0.7em;">Atrapat! Els fàmosos detectius han resolt el cas, i per fi l'objecte robat torna al seu propietari.</div></div>
					<div class="col-12"><div style="text-align:left;font-size:0.7em;color:grey;">Hace 2 horas</div></div>
				</div>
		</div></center>
	</div>
	</div></center>
	<h3 class="instruccionesTitulo">Fes una captura y comparteix a <b style="color:#E1306C;">Instagram</b> amb el Hashtag <b style="color:#00a19b;">#EscapeCalafell</b> !</h3>
	
	<div class="container">
		<div class="row">
			<div class="col-12">
				<center><h4 style="color:white;">Tens un premi per participar</h4></center>
				<p>El teu premi t'esta esperant, hauràs de dirigir-te a qualsevol dels següents punts de recollida per obtenir-ho.</p>
				<p>Presenta quan arribis la captura d'adalt, i el nom del teu grup. Nómes es pot rebre el regal un cop, tot hi que pots tornar a jugar les vegades que vulguis.</p>
				<img src="images/icono/horarios.jpg" style="max-width:100%;border-radius:5px;">
			</div>
		</div>
		<div class="row">
			<div class="col-6">
			<div class="boton">
			  <center><a href="ranking" target="_blank" class="rainbow-button" alt="Veure Ranking"></a></center>
			</div>
			</div>
			<div class="col-6">
			<div class="boton">
			  <center><a href="reiniciarJuego" class="rainbow-button" alt="Tornar a Jugar"></a></center>
			</div>
			</div>
		</div>
    </div>
	<script src="js/jquery.js"></script>
	<script>
		var tiempo;
		var partida;
		function cargarDatos(){
			if(localStorage.getItem('partida')){
			partida = localStorage.getItem('partida');
			partida = JSON.parse(partida);
			if(localStorage.getItem('tiempo')){
				tiempo = Date.now();
				tiempo = tiempo - localStorage.getItem('tiempo');
				document.getElementById("tiempoEmpleado").textContent=millisToMinutesAndSeconds(tiempo);
			}if(localStorage.getItem('pistas')){
				document.getElementById("pistasNecesarias").textContent=localStorage.getItem('pistas');
			}
			document.getElementById("nombreEquipo").textContent=localStorage.getItem('nombreEquipo');
			enviarRanking();
			}else{
				location.href = "reiniciarJuego";
			}
		}
		function millisToMinutesAndSeconds(millis) {
		  var minutes = Math.floor(millis / 60000);
		  var seconds = ((millis % 60000) / 1000).toFixed(0);
		  return minutes + " minuts i " + (seconds < 10 ? '0' : '') + seconds+ " segons";
		}
		function minutos(millis) {
		  var minutes = Math.floor(millis / 60000);
		  return minutes;
		}
		function corazon(element){
			if($(element).hasClass("far")){
				$(element).removeClass("far");
				$(element).removeClass("fa-heart");
				$(element).addClass("fas");
				$(element).addClass("fa-heart");
			}else{
				$(element).removeClass("fas");
				$(element).removeClass("fa-heart");
				$(element).addClass("far");
				$(element).addClass("fa-heart");
			}
		}
		function enviarRanking(){
			var puntuacion = (1000-minutos(tiempo))-localStorage.getItem('pistas')*50;
			$.ajax({
					// la URL para la petición
					url : 'anadirRanking.php',

					// la información a enviar
					// (también es posible utilizar una cadena de datos)
					data : { grupo : partida[0][0]["grupo"], tiempo : millisToMinutesAndSeconds(tiempo), pistas : localStorage.getItem('pistas'), nombreEquipo :  localStorage.getItem('nombreEquipo'), puntuacion : puntuacion},

					// especifica si será una petición POST o GET
					type : 'POST',

					// el tipo de información que se espera de respuesta
					dataType : 'json',

					// código a ejecutar si la petición es satisfactoria;
					// la respuesta es pasada como argumento a la función
					success : function(json) {
						console.log("Bien");
					},

					// código a ejecutar si la petición falla;
					// son pasados como argumentos a la función
					// el objeto de la petición en crudo y código de estatus de la petición
					error : function(xhr, status) {
						console.log('Error');
					},

					// código a ejecutar sin importar si la petición falló o no
					complete : function(xhr, status) {
						console.log("completo");
					}
				});
		}
	</script>
	 <script src="https://kit.fontawesome.com/10a1164e39.js" crossorigin="anonymous"></script>
  </body>
</html>
