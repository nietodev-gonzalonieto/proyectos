<?php
	/*if(!isset($_GET["test"])){
		if($_GET["test"] != "test"){
			header('Location: http://escaperoomstreet.com');
		}
	}*/
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">

    <title>ESCAPE STREET CALAFELL</title>
  </head>
  <body onLoad="crearJuegoNuevo();">
  <div class="loader"></div>
  <div id="pub" style="height:100%;position:fixed;background-color:black;top:0px;z-index:99;display:none;"><img id="imagenPub" onclick="quitarPub();" style="max-width:100%;"src=""></div>
	<div class="header">
		<center><div class="row">
			<div class="col-6" style="text-align:left;">
				<img src="images/icono/logoApp.png" style="width:65px;margin-top:5px;">
			</div>
			<div class="col-6" style="text-align:right;">
				<i onclick="ayuda();" class="far fa-question-circle" style="color:white;font-size:28px;margin:10px;"></i>
				<i onclick="pintarHistorial();" style="color:white;font-size:25px;margin:10px;" class="fas fa-history"></i>	
			</div>
		</div>
	</div>
	<div class="espaciadoArriba textoBlanco active" id="presentacion">
		<div class="row">
			<center><div class="col-4">
				<img src="images/pub/escapastic.png" onclick="activarPub('0.jpg',this);" style="width:70px;border-radius:50px;border:2px solid #EB5B5B;">
				
					<div class="row">
						<div class="col-12">
							<div style="font-size:0.6em;">escapastic</div>
						</div>
						
					</div>
				
			</div></center>
			<div class="col-4">
				<center><img src="images/pub/calafell.jpg" onclick="activarPub('1.jpg',this);" style="width:70px;border-radius:50px;border:2px solid #EB5B5B;">
				
					<div class="row">
						<div class="col-12">
							<div style="font-size:0.6em;">Escape Room Calafell</div>
						</div>
					</div>
				</center>
			</div>
		</div>
		
		<center>
		<div class="row">
			<div class="col-12">
				<h3 id="nombreEquipo" style="margin-left:10px;">LOS ESCAPADORES</h3>
			</div>
			<div class="col-12">
				<div style="text-align:left;">
					<img src="images/icono/logo.png" style="border-radius:50px;border:2px solid #EB5B5B;">
					<span style="text-align:left;font-weight:bold;font-size:0.8em;">Diari Calafell</span><br>
				</div>
			</div>
			<br><br>
				<div class="col-12"><img src="images/post/reisapp.jpg" style="border-radius:2px;max-width:100%;">
				<div class="row">
					<div class="col-6"><div style="text-align:left;font-size:1.2em;color:red;"><i onclick="corazon(this);" class="far fa-heart"></i></div></div>
					<div class="col-6"><div style="text-align:right;font-size:1.2em;"><i class="far fa-bookmark"></i></div></div><br>
					<div class="col-12"><div style="text-align:left;font-size:0.7em;font-weight:bold;"><span id="contadorMeGusta">340</span> Me gusta</div></div>
					<div class="col-12"><div style="text-align:left;font-size:0.7em;font-weight:bold;">DiariCalafell</div> <div style="text-align:left;font-size:0.7em;">Després de diversos dies d’exposició a la Casa Barral, ha sigut sustret l’objecte més preciat de la ciutat.</div></div>
					<div class="col-12"><div style="text-align:left;font-size:0.7em;color:grey;">Hace 2 horas</div></div>
				</div>
			<div class="col-12">
				
				<p style="text-align:justify;margin-left:0px;">Com molt bé sabràs, l’objecte més preciat ha sigut robat, el que no saps és que l'objecte es virtual. Un dels emojis que hi ha a la pestanya de sospitosos, es el culpable. Ens pots ajudar a trobar el sospitós?</p>
				<p style="text-align:justify;margin-left:0px;">Hauràs de dirigir-te al teu primer destí.<br></p>
				<button onclick="asignarRutaActiva('destino0');" type="button" class="btn btn-warning"><i class="fas fa-map-marker-alt"></i> COMENÇAR A JUGAR</button>
			
			</div>
			
			</div></center>
		</div>
	</div>
	
	
	<div class="espaciadoArriba textoBlanco" id="partidaCerrada" style="display:none;">
		<div class="row">
			<center><div class="col-4">
				<img src="images/pub/escapastic.png" onclick="activarPub('0.jpg',this);" style="width:70px;border-radius:50px;border:2px solid #EB5B5B;">
				
					<div class="row">
						<div class="col-12">
							<div style="font-size:0.6em;">escapastic</div>
						</div>
						
					</div>
				
			</div></center>
			<div class="col-4">
				<center><img src="images/pub/calafell.jpg" onclick="activarPub('1.jpg',this);" style="width:70px;border-radius:50px;border:2px solid #EB5B5B;">
					<div class="row">
						<div class="col-12">
							<div style="font-size:0.6em;">Escape Room Calafell</div>
						</div>
					</div>
				</center>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<br>
				<center><h4>CONTINUAR PARTIDA</h4></center>
				<p style="text-align:justify;">Sembla que has tancat l'app abans de temps, vols continuar jugant la mateixa partida? o vols que en generem una de nova?</p>
				<p style="text-align:justify;">Per continuar jugant les indicacions que rebràs son desde el punt de partida inicial</p>
			</div>
			<div class="col-6">
				<center><button onclick="asignarRutaActiva('destino0');" type="button" class="btn btn-info"><i class="fas fa-map-marker-alt"></i> CONTINUAR</button></center>
			</div>
			<div class="col-6">
				<center><button onclick="confirmarNuevaPartida();" type="button" class="btn btn-warning"><i class="fas fa-map-marker-alt"></i> NOVA PARTIDA</button></center>
			</div>
		</div>
	</div>
	<div class="espaciadoArriba textoBlanco rutaActiva" id="destinoDefault" style="display:none;">
		<center><div class="row">
			<div class="col-12">
				<h4>Encara no tens una ruta establerta, visita la home (icona casa), per començar.</h4>
			</div>
			<div class="col-12">
				<img src="images/infantil/detective4.gif" style="border-radius:5px;max-width:100%;">
			</div>
		</div></center>
	</div>
	<div class="espaciadoArriba textoBlanco" id="destino0" style="display:none;"></div>
	<div class="espaciadoArriba textoBlanco" id="destino1" style="display:none;"></div>
	<div class="espaciadoArriba textoBlanco" id="destino2" style="display:none;"></div>
	<div class="espaciadoArriba textoBlanco" id="destino3" style="display:none;"></div>
	<div class="espaciadoArriba textoBlanco" id="destino4" style="display:none;"></div>
	<div class="espaciadoArriba textoBlanco" id="destino5" style="display:none;"></div>
	<div class="espaciadoArriba textoBlanco" id="destino6" style="display:none;"></div>
	<div class="espaciadoArribaSolo textoBlanco" id="0" style="display:none;"></div>
    <div class="espaciadoArribaSolo textoBlanco" id="1" style="display:none;"></div>
    <div class="espaciadoArribaSolo textoBlanco" id="2" style="display:none;"></div>
    <div class="espaciadoArribaSolo textoBlanco" id="3" style="display:none;"></div>
    <div class="espaciadoArribaSolo textoBlanco" id="4" style="display:none;"></div>
    <div class="espaciadoArribaSolo textoBlanco" id="5" style="display:none;"></div>
    <div class="espaciadoArribaSolo textoBlanco" id="6" style="display:none;"></div>
	<div id="sospechosos" class="espaciadoArriba" style="display:none;">
	<center>
      <!--fila uno-->
		<div class="row">
			<div class="col-12">
				<h4 style="color:white;">Possibles Sospitosos</h4><br>
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\1.png" onClick="eliminarSospechoso(this)">
			  <p style="font-size:0.8em;">Enamorat</p>
			</div>
			
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\2.png" onClick="eliminarSospechoso(this)">
			  <p style="font-size:0.8em;">Trist</p>
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\3.png" onClick="eliminarSospechoso(this)">
			  <p style="font-size:0.8em;">Riures</p>
			</div>
		  <!--fila dos-->
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\4.png" onClick="eliminarSospechoso(this)">
			  <p style="font-size:0.8em;">Pluramicas</p>
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\5.png" onClick="eliminarSospechoso(this)">
			  <p style="font-size:0.8em;">Vergonyos</p>
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\6.png" onClick="eliminarSospechoso(this)">
			  <p style="font-size:0.8em;">Ulleres</p>
			</div>
		  <!--fila tres-->
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\7.png" onClick="eliminarSospechoso(this)">
			  <p style="font-size:0.8em;">Llengua</p>
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\8.png" onClick="eliminarSospechoso(this)">
			  <p style="font-size:0.8em;">Rialler</p>
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\9.png" onClick="eliminarSospechoso(this)">
			  <p style="font-size:0.8em;">Noia</p>
			</div>
		  <!--fila cuatro-->
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\10.png" onClick="eliminarSospechoso(this)">
			  <p style="font-size:0.8em;">Maquillada</p>
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\11.png" onClick="eliminarSospechoso(this)">
			  <p style="font-size:0.8em;">Enfadat</p>
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\12.png" onClick="eliminarSospechoso(this)">
			  <p style="font-size:0.8em;">Senyor</p>
			</div>
		  
			  
		  </div>
		  </center>
     
      </div>
	  <center>
	  <div id="prueba1" class="espaciadoAbajoSolo textoBlanco" style="display:none;">
			<div class="row" id="prueba1Parte1">
				<div class="col-12">
					<h4> Accedeix al registre de claus, i selecciona la correcta. Ajuda al botiguer a entrar a la seva botiga. </h4><br><br>
					<center><img src="images/infantil/detective5.gif"></center><br><br>
					<button onclick="comprobarCodigoPrueba1();" type="button" class="btn btn-info">REGISTRE DE CLAUS</button>
				</div>
			</div>
			<div class="row" id="prueba1Parte2" style="display:none;">
				<div class="col-12">
				<p>El botiguer ens ha de dir alguna cosa important, però primer l'hem de ajudar a trovar les claus de la seva botiga.</p>
				<p>Selecciona el tipus d’empremta que veus a l’aparador. </p>
				<div id="errorHuellaDactilar" style="display:none;">
					<span style="color:red;">T'has equivocat, torna a provar en </span>
					<span id="huellaCuentaAtras" style="color:red;"></span>
					<span style="color:red;"> segons.</span>
				</div>
					<div id="huellasDactilares">
						<div class="row">
							<div class="col-4">
								<img src="images/infantil/prueba1/llave1.png" onclick="huellaDactilarComprobar();" style="max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/infantil/prueba1/llave2.png" onclick="huellaDactilarComprobar();" style="max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/infantil/prueba1/llave3.png" onclick="huellaDactilarComprobar();" style="max-width:100%;">
							</div>
						</div><br>
						<div class="row">
							<div class="col-4">
								<img src="images/infantil/prueba1/llave4.png" onclick="huellaDactilarComprobar();" style="max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/infantil/prueba1/llave5.png" onclick="huellaDactilarComprobar(true);" style="max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/infantil/prueba1/llave6.png" onclick="huellaDactilarComprobar();" style="max-width:100%;">
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<div class="row" id="resultadoPrueba1" style="display:none;">
				<div class="col-12">
					<p>El botiguer està molt agraït de la vostra ajuda i ens ha dit:</p>
					<div onclick="guardarPruebaDiario()" class="respuestaEstablecimiento" id="resultadoPrueba1Final"></div>
					<p>Fes clic sobre l'informació que et dóna l'establiment per guardar-ho a l'historial que tenim sobre el sospitós.</p>
				</div>
			</div>
		</div>
		<div id="prueba2" class="espaciadoAbajoSolo textoBlanco" style="display:none;">
			<div class="row" id="prueba2Parte1">
				<div class="col-12">
					<h4>Ajuda els Reis Margs a creuar el laberint </h4><br><br>
					<p>Els Reis Mags van creuant el laberint i van agafant regals per tothom. Ajuda a creuar el laberint i fes clic als regals que hi ha al camí per on passen. Així el botiguer ens ajudarà a saber qui és el sospitós.</p>
					<center><img src="images/infantil/detective5.gif"></center><br><br>
					<button onclick="comprobarCodigoPrueba2();" type="button" class="btn btn-info">LLISTA DE REGALS</button>
				</div>
			</div>
			<div class="row" id="prueba2Parte2" style="display:none;">
				<div class="col-12">
				<p>El botiguer ens ha de dir alguna cosa important, però primer l'hem de ajudar a trovar les claus de la seva botiga.</p>
				<p>Selecciona el tipus d’empremta que veus a l’aparador. </p>
				<center><div id="errorJuguete" style="display:none;color:red;">
					
				</div></center><br><br>
					<div>
						<div class="row">
							<div class="col-4">
								<img src="images/infantil/prueba2/bici.png" onclick="jugueteComprobar(true,this);" style="max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/infantil/prueba2/funko.png" onclick="jugueteComprobar(true,this);" style="max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/infantil/prueba2/gafas.png" onclick="jugueteComprobar(false,this);" style="max-width:100%;">
							</div>
						</div><br>
						<div class="row">
							<div class="col-4">
								<img src="images/infantil/prueba2/herramientas.png" onclick="jugueteComprobar(false,this);" style="max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/infantil/prueba2/iphone.png" onclick="jugueteComprobar(true,this);" style="max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/infantil/prueba2/perro.png" onclick="jugueteComprobar(true,this);" style="max-width:100%;">
							</div>
						</div>
						<div class="row">
							<div class="col-4">
								<img src="images/infantil/prueba2/robot.png" onclick="jugueteComprobar(true,this);" style="max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/infantil/prueba2/4raya.jpg" onclick="jugueteComprobar(true,this);" style="margin-top:10px;max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/infantil/prueba2/tren.png" onclick="jugueteComprobar(true,this);" style="max-width:100%;">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row" id="resultadoPrueba2" style="display:none;">
				<div class="col-12">
					<p>El botiguer està molt agraït de la vostra ajuda i ens ha dit:</p>
					<div onclick="guardarPruebaDiario()" class="respuestaEstablecimiento" id="resultadoPrueba2Final"></div>
					<p>Fes clic sobre l'informació que et dóna l'establiment per guardar-ho a l'historial que tenim sobre el sospitós.</p>
				</div>
			</div>
		</div>
		<div id="prueba3" class="espaciadoAbajoSolo textoBlanco" style="display:none;">
			<div id="prueba3Parte1">
				<div class="row">
				<div class="col-12">
					<h4>AJUDA A RECICLAR</h4>
					<p>El botiguer necesita la nostra ajuda, i ens demana que reciclem la seva brossa, que ell no en sap.</p>
				</div>
					<div class="col-12">
						<p id="mensajeErrorPrueba3" style="color:red;display:none;"></p>
					</div>
					<div class="col-4">
						<img src="images/infantil/prueba3/papel.jpg" onclick="reciclaje(true,'azul',this);" style="border-radius:2px;max-width:100%">
					</div>
					<div class="col-4">
						<img src="images/infantil/prueba3/caja.jpg" onclick="reciclaje(true,'azul',this);" style="border-radius:2px;max-width:100%">
					</div>
					<div class="col-4">
						<img src="images/infantil/prueba3/botella_cristal.jpg" onclick="reciclaje(true,'verde',this);" style="border-radius:2px;max-width:100%">
					</div>
					<div class="col-4">
						<img src="images/infantil/prueba3/botella_plastico.jpg" onclick="reciclaje(true,'amarillo',this);" style="border-radius:2px;max-width:100%">
					</div>
					<div class="col-4">
						<img src="images/infantil/prueba3/cd.jpg" onclick="reciclaje(false,'cd',this);" style="border-radius:2px;max-width:100%">
					</div>
					<div class="col-4">
						<img src="images/infantil/prueba3/diari.jpg" onclick="reciclaje(false,'diari',this);" style="margin-top:10px;border-radius:2px;max-width:100%">
					</div>
					<div class="col-4">
						<img src="images/infantil/prueba3/bolsa.jpg" onclick="reciclaje(false,'bolsa',this);" style="margin-top:10px;border-radius:2px;max-width:100%">
					</div>
					<div class="col-4">
						<img src="images/infantil/prueba3/naranja.png" onclick="reciclaje(false,'nada',this);" style="margin-top:10px;border-radius:2px;max-width:100%">
					</div>
				</div><br><br>
				<div class="row">
					<div class="col-2"></div>
					<div class="col-8">
						<img src="images/pruebas/amarillo.jpg" onclick="reciclajeContenedor('amarillo');" style="max-width:100%;">
					</div>
					<div class="col-2"></div>
					<div class="col-2"></div>
					<div class="col-8" style="margin-top:15px;">
						<div id="dropzone">
							<img src="images/pruebas/azul.jpg" onclick="reciclajeContenedor('azul');" style="max-width:100%;">
						</div>
					</div>
					<div class="col-2"></div><div class="col-2"></div>
					<div class="col-8" style="margin-top:15px;">
						<img src="images/pruebas/verde.jpg" onclick="reciclajeContenedor('verde');" style="max-width:100%;">
					</div>
					<div class="col-2"></div>
				</div>
			</div>
			<div id="prueba3Parte2" style="display:none;">
				<div class="col-12">
					<p>El botiguer està molt agraït de la vostra ajuda i ens ha dit:</p>
					<div onclick="guardarPruebaDiario()" class="respuestaEstablecimiento" id="resultadoPrueba3Final"></div>
					<p>Fes clic sobre l'informació que et dóna l'establiment per guardar-ho a l'historial que tenim sobre el sospitós.</p>
				</div>
			</div>
		</div>
		<div id="prueba4" class="espaciadoAbajoSolo textoBlanco" style="display:none;">
			<div id="prueba4Estado1">
			<div class="row">
				<div class="col-12">
				<h4>Aconsegueix el número secret del botiguer</h4>
				<p>Amb el panell que tens a sota, fes clic als números següents 0456789. Un cop els tinguis introduits apareixerän 3 números nous.</p>
		<div class="scrollableLateral">
			<div class="row" style="width: 800px">
				<!--PRIMERA FILA PRIMERA PARTE-->
				<div class="col-6"  style="padding: 0px;">
					<div class="row">
						<!-- 1  -->
						<div class="col-1">
							<div class="tablaBordesPrueba4">6</div>
						</div>
						<!-- 2 -->
						<div class="col-1">
							<div class="tablaBordesPrueba4">6</div>
						</div>
						<!-- 3-->
						<div class="col-1">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<!-- 4-->
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<!-- 5-->
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<!-- 6-->
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<!--7 -->
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<!-- 8 -->
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
					</div>
				</div>
				<!--PRIMERA FILA SEGUNDA PARTE-->
				<div class="col-6"  style="padding: 0px;">
					<div class="row">
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">6</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">6</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">6</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
					</div>
				</div>
				<!--PRIMERA FILA PRIMERA PARTE-->
				<div class="col-6"  style="padding: 0px;">
					<div class="row">
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">6</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">6</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">6</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">6</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
					</div>
				</div>
				<!--PRIMERA FILA SEGUNDA PARTE-->
				<div class="col-6"  style="padding: 0px;">
					<div class="row">
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">0</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">6</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">6</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">6</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">0</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
					</div>
				</div>
			<div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">6</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">6</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
				</div>
			</div>
			<!--PRIMERA FILA SEGUNDA PARTE-->
			<div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
				</div>
			</div>
			<div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">6</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">6</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">6</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
				</div>
			</div>
			<!--PRIMERA FILA SEGUNDA PARTE-->
			<div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">6</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">6</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">6</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
				</div>
			</div><div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
				</div>
			</div>
			<!--PRIMERA FILA SEGUNDA PARTE-->
			<div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
				</div>
			</div><div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
				</div>
			</div>
			<!--PRIMERA FILA SEGUNDA PARTE-->
			<div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">9</div>
					</div>
				</div>
			</div><div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">8</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">8</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">8</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">8</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">8</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
				</div>
			</div>
			<!--PRIMERA FILA SEGUNDA PARTE-->
			<div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">8</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">8</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">8</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">8</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
				</div>
			</div><!--PRIMERA FILA PRIMERA PARTE-->
			<div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">8</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">8</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
				</div>
			</div>
			<!--PRIMERA FILA SEGUNDA PARTE-->
			<div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">8</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
				</div>
			</div>
			<div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">0</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
				</div>
			</div>
			<!--PRIMERA FILA SEGUNDA PARTE-->
			<div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">2</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">2</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
				</div>
			</div><div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">2</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">2</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
				</div>
			</div>
			<!--PRIMERA FILA SEGUNDA PARTE-->
			<div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">2</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">2</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
				</div>
			</div><div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">2</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">2</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
				</div>
			</div>
			<!--PRIMERA FILA SEGUNDA PARTE-->
			<div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
				</div>
			</div><div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
				</div>
			</div>
			<!--PRIMERA FILA SEGUNDA PARTE-->
			<div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">2</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
				</div>
			</div>			<!--PRIMERA FILA PRIMERA PARTE-->
			<div class="col-6"  style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">2</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">2</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">3</div>
					</div>
				</div>
			</div>
			<!--PRIMERA FILA SEGUNDA PARTE-->
			<div class="col-6" style="padding: 0px;">
				<div class="row">
					<div class="col-1">
						<div class="tablaBordesPrueba4">3</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">3</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">4</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">8</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">3</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">3</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">3</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">1</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">7</div>
					</div>
					<div class="col-1">
						<div class="tablaBordesPrueba4">8</div>
					</div>
				</div>
			</div>
			<div class="col-6" style="padding: 0px;">
					<div class="row">
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
					</div>
				</div>
				<!--PRIMERA FILA SEGUNDA PARTE-->
				<div class="col-6" style="padding: 0px;">
					<div class="row">
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">5</div>
						</div>
					</div>
				</div><div class="col-6" style="padding: 0px;">
					<div class="row">
						<div class="col-1">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
					</div>
				</div>
				<!--PRIMERA FILA SEGUNDA PARTE-->
				<div class="col-6"  style="padding: 0px;">
					<div class="row">
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">7</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-1">
							<div class="tablaBordesPrueba4">5</div>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<br><br>
		<div class="container noPaddingLeft" style="border: solid;">
			<div class="row" >		
				<div class="col-4 padding">
					<div class="cuadrado">
						<div class="modeloElegirBotones circulo" onclick="ocultar(1);">1</div>
					</div>
				</div>
				<div class="col-4 padding">
					<div class="cuadrado">
						<div class="modeloElegirBotones circulo" onclick="ocultar(2);">2</div>
					</div>
				</div>
				<div class="col-4 padding">
					<div class="cuadrado">
						<div class="modeloElegirBotones circulo" onclick="ocultar(3);">3</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-4 padding">
					<div class="cuadrado">
						<div class="modeloElegirBotones circulo" onclick="ocultar(4);">4</div>
					</div>
				</div>
				<div class="col-4 padding">
					<div class="cuadrado">
						<div class="modeloElegirBotones circulo" onclick="ocultar(5);">5</div>
					</div>
				</div>
				<div class="col-4 padding">
					<div class="cuadrado">
						<div class="modeloElegirBotones circulo" onclick="ocultar(6);">6</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-4 padding">
					<div class="cuadrado">
						<div class="modeloElegirBotones circulo" onclick="ocultar(7);">7</div>
					</div>
				</div>
				<div class="col-4 padding">
					<div class="cuadrado">
						<div class="modeloElegirBotones circulo" onclick="ocultar(8);">8</div>
					</div>
				</div>
				<div class="col-4 padding">
					<div class="cuadrado">
						<div class="modeloElegirBotones circulo" onclick="ocultar(9);">9</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-4 padding">
					<div class="cuadrado">
						<div class="modeloElegirBotones circulo" onclick="mostrarTodos();">C</div>
					</div>
				</div>
				<div class="col-4 padding">
					<div class="cuadrado">
						<div class="modeloElegirBotones circulo" onclick="ocultar(0);">0</div>
					</div>
				</div>
				<div class="col-4 padding">
					<div class="cuadrado">
						<div class="modeloElegirBotones circulo">E</div>
					</div>
				</div>
			</div>
		</div><br><br>
		<div class="form-group">
			<p id="codigoIncorrectoPrueba4" style="display:none;color:red;">Error! Introdueix el codi correcte.</p>
			<input class="form-control" type="text" id="codigoPrueba4" placeholder="Introdueix el codi per accedir"><br>
			<button onclick="comprobarCodigoPrueba4();" type="button" class="btn btn-info">COMPROVAR RESULTAT</button>
		</div>
		</div>
		</div>	
		</div>
			<div id="prueba4Estado2" style="display:none;">
				<p>El botiguer ens dona nova informació. Guarda la resposta al diari personal, fent clic.</p>
				<span onclick="guardarPruebaDiario();" class="respuestaEstablecimiento"  id="resultadoPrueba4Final"></span></p>
				<p>Fes clic sobre l'informació que et dóna l'establiment per guardar-ho a l'historial que tenim sobre el sospitós.</p>
			</div>
		</div>
		




		</center>
		
		<div id="escogerSospechoso" class="espaciadoArriba" style="display:none;">
	<center>
		<div class="row">
			<div class="col-12">
				<h4 style="color:white;">Ha arribat l'hora d'escollir el sospitós, recorda que no pots fallar. Si fallas comptarà com una pista més i baixarà la teva reputació.</h4>
				<p>Qui de tots es el lladre?</p>
			</div>
		</div>
      <!--fila uno-->
		<div class="row">
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\1.png" data-sospechoso="1" onClick="elegirSospechoso(this)">
			</div>
			
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\2.png" data-sospechoso="2" onClick="elegirSospechoso(this)">
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\3.png" data-sospechoso="3" onClick="elegirSospechoso(this)">
			</div>
		</div><br>
		<div class="row">
		  <!--fila dos-->
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\4.png" data-sospechoso="4" onClick="elegirSospechoso(this)">
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\5.png" data-sospechoso="5" onClick="elegirSospechoso(this)">
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\6.png" data-sospechoso="6" onClick="elegirSospechoso(this)">
			</div>
		</div><br>
		<div class="row">
		  <!--fila tres-->
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\7.png" data-sospechoso="7" onClick="elegirSospechoso(this)">
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\8.png" data-sospechoso="8" onClick="elegirSospechoso(this)">
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\9.png" data-sospechoso="9" onClick="elegirSospechoso(this)">
			</div>
		</div><br>
		<div class="row">
		  <!--fila cuatro-->
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\10.png" data-sospechoso="10" onClick="elegirSospechoso(this)">
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\11.png" data-sospechoso="11" onClick="elegirSospechoso(this)">
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\ninos\12.png" data-sospechoso="s12" onClick="elegirSospechoso(this)">
			</div>
		</div><br>
		  </center>
		
		</div>
	  <div class="modal fade" id="checkTienda" tabindex="-1" role="dialog" aria-labelledby="checkTienda" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Introdueix el nom de l'establiment</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			   
			  <div class="modal-body">
				<div class="form-group">
					<small style="color:grey;" class="form-text">S'ha d'escriure amb accents i tal com apareix al cartell.</small>
					<input type="text" class="form-control" id="respuestaTienda" placeholder="Nom de l'establiment">
					<small id="errorTienda" style="color:red;display:none;" class="form-text">El nom de l'establiment no es correcte.</small>
				</div>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-primary" onclick="comprobarTienda();">COMPROVAR</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">TANCAR</button>
			  </div>
			</div>
		  </div>
		</div>
		<div class="modal fade" id="yoNoHariaEso" tabindex="-1" role="dialog" aria-labelledby="yoNoHariaEso" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			 <div class="modal-header">
			  <div class="row">
				  	<div class="col-2">
				  		<img src="images/infantil/detectiu.jpg" style="border-radius:50px;max-width: 100%;">
				  	</div>
				  	<div class="col-10">
						<h5 class="modal-title" class="exampleModalLongTitle">Detectiu Johnson</h5>
					</div>
				</div>
				</div>
			   
			  <div class="modal-body">
					<span id="textoYoNoHariaEso"></span>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">TANCAR</button>
			  </div>
			</div>
		  </div>
		</div>
		<div class="modal fade" id="siguientePruebaModal" tabindex="-1" role="dialog" aria-labelledby="siguientePruebaModal" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			 <div class="modal-header">
			  <div class="row">
				  	<div class="col-2">
				  		<img src="images/infantil/detectiu.jpg" style="border-radius:50px;max-width: 100%;">
				  	</div>
				  	<div class="col-10">
						<h5 class="modal-title" class="exampleModalLongTitle">Detectiu Johnson</h5>
					</div>
				</div>
				</div>
			   
			  <div class="modal-body">
					Perfecte! Fes clic a guardar per afegir a l'historial aquesta dada rellevant sobre el sospitós i seguir amb la investigació.
			  </div>
			  <div class="modal-footer">
				<button type="button" onclick="guardarPruebaDiarioSiguiente();" class="btn btn-secondary">GUARDAR</button>
			  </div>
			</div>
		  </div>
		</div>
		<div class="modal fade" id="pistaTestigo" tabindex="-1" role="dialog" aria-labelledby="pistaTestigo" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			  <div class="modal-header">
			  	<div class="row">
				  	<div class="col-3">
				  		<img src="images/infantil/detectiu.jpg" style="border-radius:50px;max-width: 100%;">
				  	</div>
				  	<div class="col-9">
						<h5 class="modal-title" class="exampleModalLongTitle">Detectiu Johnson</h5>
					</div>
				</div>
			  </div>
				<div class="modal-body" id="modalPista">
					<div id="noHayPistas">Quan necessitis una pista contacta amb mi, però demanar-me ajuda farà baixar la teva reputació i prestigi.</div>
					<div id="todasLasPistas"></div>
					<div id="noHayMasPistas" style="display: none;">
						Només tens 3 pistes, no pots demanar més.
					</div>
			    </div>
			  <div class="modal-footer">
			  	<button type="button" class="btn btn-primary" style="display: none;" id="botonPista" onclick="escribirPista()">PISTA</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">TANCAR</button>
			  </div>
			</div>
		  </div>
		</div>
		<div class="modal fade" id="elegirSospechosoFinal" tabindex="-1" role="dialog" aria-labelledby="pistaTestigo" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			  <div class="modal-header">
			  	<div class="row">
				  	<div class="col-3">
				  		<img src="images/icono/gmail.png" style="border-radius:50px;max-width: 100%;">
				  	</div>
				  	<div class="col-9">
						<h4 class="modal-title" class="exampleModalLongTitle" style="border-bottom:1px solid black;font-size:0.8em;"><span style="color:grey;">Para </span> investigacions@fbi.com</h4>
						<h4 class="modal-title" class="exampleModalLongTitle" style="border-bottom:1px solid black;font-size:0.8em;"><span style="color:grey;"></span> Resultat de l'investigació</h4>
					</div>
				</div>
			  </div>
				<div class="modal-body" id="sospechosoFinal">
					<div id="maquinas"></div><br>
					<center><img src="" id="imagenSospechoso" style="display:none;max-width: 100%;"></center>
					<input type="hidden" id="sospechosoSeleccionado">
			    </div>
			  <div class="modal-footer">
				<p id="sospechosoMal" style="color:red;display:none;">La persona que has triat no es la correcta. Revisa bé l'historial així com els possibles sospitosos</p>
			  	<button type="button" class="btn btn-primary" onclick="confirmarSospechoso()">ENVIAR</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
			  </div>
			</div>
		  </div>
		</div>
		<div id="historial" class="espaciadoArriba" style="display:none;">
			
		</div>
		<div id="ayuda" class="espaciadoArriba" style="display:none;">
			<div class="row">
				<div class="col-12">
					<center><h4 style="color:white;">Ajuda</h4></center>
					<p style="margin-left:20px;text-align:justify;">Tenim una sèrie d’icones que ens ajudaran al llarg del joc.<br>
					<i style="color:white;font-size:20px;margin:10px;" class="fas fa-history"></i> Podrem accedir a l’historial de les pistes sempre que ho necessitem.<br>
					<i style="color:white;font-size:20px;margin:10px;" class="fas fa-home"></i> Serveix per accedir en qualsevol moment a la prova on estaves si surts o vas a un altre pestanya.<br>
					<i style="color:white;font-size:20px;margin:10px;" class="fas fa-map-marked-alt"></i> Serveix per rebre les indicacions per anar al següent establiment.<br>
					<i style="color:white;font-size:20px;margin:10px;" class="fas fa-user-secret"></i> Serveix per demanar pistes, sempre que estiguis a una prova que no aconsegueixis pots demanar un total de 3 pistes.<br>
					<i style="color:white;font-size:20px;margin:10px;" class="fas fa-user-ninja"></i> Aquí tenim el llistat de tots el sospitosos que podrem anar descartant amb la informació dels establiments.</p><br><br>
					<p style="text-align:justify;margin-left:20px;">L’objectiu del joc es aconseguir esbrinar qui ha robat la clau d’or del segle XVI del poble.<br>
					Per saber qui ha robat l’objecte, cada establiment ens donarà una pista.<br>
					Cada cop que arribin a un establiment hauran d’introduir el seu nom per poder accedir a la prova, el mòbil i el que trobeu a l’aparador us ajudarà a poder continuar.<br>
					Quan acabem una prova haurem de clicar sobre la informació que ens dóna l’establiment per guardar-la a l’historial <i style="color:white;font-size:20px;margin:10px;" class="fas fa-history"></i>.<br>
					Sempre que necessitem una ajuda o pista durant les proves es poden demanar a l’Icona <i style="color:white;font-size:20px;margin:10px;" class="fas fa-user-secret"></i> i podrem demanar un total de 3 pistes per prova(Recordeu que cada pista va restant punts)
					Necessitarem visitar un total de 6 establiments per aconseguir tota la informació sobre el sospitós. 
					Al finalitzar l’ultima pista haurem de seleccionar al sospitós que creiem que ha robat la clau i ho haurem aconseguit.
					Sempre que al finalitzar us equivoqueu en seleccionar el lladre comptabilitzarà com una pista més.</p>

					
				</div>
			</div>
		</div>
	
	
    <div class="footer">
		<center><div class="row">
			<div class="col-3">
				<center><span onclick="mostrar('active',2);"><i style="color:white;font-size:30px;margin:10px;" class="fas fa-home"></i></span></center>
			</div>
			<div class="col-3">
				<center><span onclick="mostrar('rutaActiva',2);"><i style="color:white;font-size:30px;margin:10px;" class="fas fa-map-marked-alt"></i></span></center>
			</div>
			<div class="col-3">
				<center><span data-toggle='modal' data-target='#pistaTestigo'><i style="color:white;font-size:30px;margin:10px;" class="fas fa-user-secret"></i></span></center>
			</div>
			<div class="col-3">
				<center><span onclick="mostrar('sospechosos',1);"><i style="color:white;font-size:30px;margin:10px;" class="fas fa-meh-rolling-eyes"></i></span></center>
			</div>
		</div></center>
	</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
	 <script src="https://kit.fontawesome.com/10a1164e39.js" crossorigin="anonymous"></script>
	 <script type="text/javascript">
		function cargar(){
			$(".loader").fadeOut("slow");
		}
		</script>
	  <script>
		function isMobile(){
			return (
				(navigator.userAgent.match(/Android/i)) ||
				(navigator.userAgent.match(/webOS/i)) ||
				(navigator.userAgent.match(/iPhone/i)) ||
				(navigator.userAgent.match(/iPod/i)) ||
				(navigator.userAgent.match(/iPad/i)) ||
				(navigator.userAgent.match(/BlackBerry/i))
			);
		}
		if (!isMobile()) {
			alert("Si no entres desde el mòvil no veuràs l'app correctament.");
		}
	  var lastIdPrueba = 0;
	  var contadorPista=1;
	  var rutaActual="destinoDefault";
	  var tiendaActual="";
	  var tiendaActualNumero=0;
	  var destino="destino0";
	  var puntoActual = 0;
	  var control = false;
	  var contadorDatosLadronActual = 0;
	  var totalDeTiendas = 4;
        function eliminarSospechoso(id){
          if ($(id).css("filter")=="grayscale(1)") {
            $(id).css({"filter":"grayscale(0)"});
          }else {
            $(id).css({"filter":"grayscale(1)"});
          }
        }
		function corazon(element){
			if($(element).hasClass("far")){
				$(element).removeClass("far");
				$(element).removeClass("fa-heart");
				$(element).addClass("fas");
				$(element).addClass("fa-heart");
				$("#contadorMeGusta").html("341");
			}else{
				$(element).removeClass("fas");
				$(element).removeClass("fa-heart");
				$(element).addClass("far");
				$(element).addClass("fa-heart");
				$("#contadorMeGusta").html("340");
			}
		}
		function siguiente(id,tiendaParam){
			$('#todasLasPistas').html("");
			$('#noHayMasPistas').hide();
			$('#noHayPistas').show();
			$('#botonPista').hide();
			if(tiendaParam){
				$('.btn-success').show();
				destinoqueToca = id;
				tiendaParam = tiendaParam.toUpperCase();
				tiendaParam = tiendaParam.trim();
				tiendaActual=tiendaParam;
				puntoActual++;
				contadorPista=1;
				asignarRutaActiva(id);
				guardarPartida();
			}else{
				ocultarTodo();
				$("#escogerSospechoso").show();
				$(".active").removeClass("active");
				$("#escogerSospechoso").addClass("active");
			}
		}
		
		function asignarRutaActiva(id){	
			$("#"+rutaActual).removeClass("rutaActiva");
			rutaActual=id;
			$("#"+id).addClass("rutaActiva");
			mostrar(id,1);
		}
		
		function comprobarTienda(){
			tiendaUsuario = $("#respuestaTienda").val();
			tiendaUsuario = tiendaUsuario.toUpperCase();
			tiendaUsuario = tiendaUsuario.trim();
			$("#respuestaTienda").val("");
			if(eliminarDiacriticos(tiendaActual)==eliminarDiacriticos(tiendaUsuario)){
				control=true;
				$("#errorTienda").hide();
				$('#checkTienda').modal('hide');
				$('.btn-success').hide();
				$(".active").removeClass("active");
				$("#"+tiendaActualNumero).addClass("active");
				mostrar(tiendaActualNumero,1);
				mostrarPrueba();
				$('#botonPista').show();
				tiendaActualNumero++;
			}else{
				$("#errorTienda").show();
			}
		}
		function mostrar(id,tipo){
			ocultarTodo();
			if(tipo==1){
				$("#"+id).show();
			}else if(tipo==2){
				$("."+id).show();
			}
		}
		function mostrarPrueba(){
			var pruebaMostrada = obtenerPrueba(partida[0][tiendaActualNumero].id_prueba);
			$("#prueba"+pruebaMostrada.tipo).show();
			$("#prueba"+pruebaMostrada.tipo).addClass("active");
		}
		function ocultarTodo(){
			$("#presentacion").hide();
			$("#partidaCerrada").hide();
			$("#sospechosos").hide();
			$("#destinoDefault").hide();
			$("#historial").hide();
			$("#ayuda").hide();
			$("#destino0").hide();
			$("#destino1").hide();
			$("#destino2").hide();
			$("#destino3").hide();
			$("#destino4").hide();
			$("#destino5").hide();
			$("#destino6").hide();
			$("#0").hide();
			$("#1").hide();
			$("#2").hide();
			$("#3").hide();
			$("#4").hide();
			$("#5").hide();
			$("#6").hide();
			$("#prueba1").hide();
			$("#prueba2").hide();
			$("#prueba3").hide();
			$("#prueba4").hide();
			$("#prueba5").hide();
			$("#prueba6").hide();
			$("#prueba7").hide();
			$("#prueba8").hide();
			$("#prueba10").hide();
			$("#prueba11").hide();
			$("#prueba12").hide();
			$("#juegoNuevo").hide();
			$("#escogerSospechoso").hide();
		}
		
		function obtenerPrueba(id_prueba){							//Funcion que obtiene toda la linea del objeto que tiene las pistas y el resultado.
			for(var h=0;h<partida[1].length;h++){
				if(id_prueba==partida[1][h]['id']){
					return partida[1][h];
				}
			}
		}
		function obtenerResultado(id_prueba){							//Funcion que obtiene toda la linea del objeto que tiene las pistas y el resultado.
			for(var h=0;h<partida[1].length;h++){
				if(id_prueba==partida[1][h]['id']){
					return partida[1][h].resultado;
				}
			}
		}
		function obtenerPista(id_prueba,numero){					//Funcion que te da una pista en función de la prueba y la dificultad de la pista que le pidamos.
			prueba = obtenerPrueba(id_prueba);
			return prueba["pista"+numero];
		}
		function deClaveAClave(origen,destino){					//Funcion que indica como llegar desde un punto clave a otro Parece que entra en conflicto con la letra i del metodo de leerArray y por eso le he puesto una J
			for(j=0;j<partida[3].length;j++){
				if(origen==partida[3][j]['id_origen']){
					if(destino==partida[3][j]['id_destino']){
						return partida[3][j]['instrucciones'];
					}
				}
			}
		}
		function comoIrAClave(origen){							//Funcion que indica como llegar desde el lugar tienda o sitio donde se realiza la prueba a el punto clave
			for(var i=0;i<partida[0].length;i++){
				if(origen==partida[0][i]['id']){
					return partida[0][i]['goClave'];
				}
			}
		}
		function comoLlegarDesdeClave(origen,destino){         //Funcion que indica como llegar desde el punto clave al lugar tienda o sitio donde se realiza la prueba
			for(var i=0;i<partida[0].length;i++){
				if(origen==partida[0][i]['id']){
					return partida[0][i]['fromClave'];
				}
			}
		}
		function acabarPartida(){
			localStorage.clear();
			location.reload();
		}
		function guardarPartida(){
				partidaGuardada = localStorage.getItem("partida");
				partidaGuardada = JSON.parse(partidaGuardada);
				partidaGuardada[0].splice(0,1);
				partidaGuardada = JSON.stringify(partidaGuardada);
				localStorage.setItem('partida', partidaGuardada);
		}
		function crearJuegoNuevo(){
			cargar();
			if(localStorage.getItem('nombreEquipo')){
				$("#nombreEquipo").html(localStorage.getItem('nombreEquipo'));
			}else{
				location.href="https://calafellacasa.com/escaperoom/";
			}
			//localStorage.clear();
			if(localStorage.getItem('partida')){ //localStorage.getItem('partida')    ACTIVAR ESTO PARA QUE CARGUE LA PARTIDA GUARDADA
				partida = localStorage.getItem('partida');
				partida = JSON.parse(partida);
				leerArray();
				
			}else{		
				$.ajax({
					// la URL para la petición
					url : 'crearJuegoNuevoNinos.php',

					// la información a enviar
					// (también es posible utilizar una cadena de datos)
					data : { grupo : 4 },

					// especifica si será una petición POST o GET
					type : 'POST',

					// el tipo de información que se espera de respuesta
					dataType : 'json',

					// código a ejecutar si la petición es satisfactoria;
					// la respuesta es pasada como argumento a la función
					success : function(json) {
						localStorage.setItem('tiempo',""+Date.now());
						localStorage.setItem('pistas',0);
						localStorage.setItem('partida', JSON.stringify(json));
						partida = localStorage.getItem('partida');
						partida = JSON.parse(partida);
					},

					// código a ejecutar si la petición falla;
					// son pasados como argumentos a la función
					// el objeto de la petición en crudo y código de estatus de la petición
					error : function(xhr, status) {
						console.log('Error');
					},

					// código a ejecutar sin importar si la petición falló o no
					complete : function(xhr, status) {
						leerArray();
					}
				});
			}
		}
		function leerArray(){         //Pintar Array
			console.log(partida);
			var idClaveActual=0;
			var destinoqueToca = 1;
			var destinoAnterior = 0; //Guardamos esta información para que en el caso de que nos interese se muestre la ida de la tienda al sitio clave.
			if(partida[0].length<totalDeTiendas){
				$(".active").removeClass("active");
				$("#partidaCerrada").addClass("active");
				mostrar("active",2);
			}
			tiendaActual = partida[0][0]["nombre"];  //ESTO SOLO FUNCIONA LA PRIMERA VEZ, LUEGO HABRÁ QUE CONTROLAR EN QUE TIENDA SE QUEDÓ EL USUARIO
			tiendaActual = tiendaActual.toUpperCase();
			tiendaActual = tiendaActual.trim();
			$("#0").append("<div class='tituloTienda'>"+ partida[0][0]["nombre"]+"<br><span style='font-size:0.6em;color:white;'>Revisa l'aparador en busca de pistes</span></div>");
			$("#destino0").append("<h4><i class='fas fa-map-marker-alt'></i> Dirigeix-te a les lletres del port</h4>");
			if(partida[0][0]["id_clave"]==19){			//En caso de que la tienda tenga como referencia el punto de partida
				$("#destino0").append("<h4>Com arribar al primer destí:</h4> <p><i class='fas fa-map-marker-alt'></i> " + partida[0][0]["fromClave"] + "</p>");
			}else{										//En el caso de que la tienda no tenga como referencia el punto de partida, lo llevará al monumento más cercano a la tienda y de ahí a la propia tienda.
				$("#destino0").append("<h4>Com arribar al primer destí:</h4> <p><i class='fas fa-map-marker-alt'></i> " + deClaveAClave(19,partida[0][0]["id_clave"]) + "</p>");
				$("#destino0").append("<p><i class='fas fa-map-marker-alt'></i> " + partida[0][0]["fromClave"] + "</p>");
			}
			$("#destino0").append("<center><button type='button' class='btn btn-success' data-toggle='modal' data-target='#checkTienda'><i class='fas fa-map-marker-alt'></i> HE ARRIBAT A L'ESTABLIMENT</button></center>");
			pruebaActual=obtenerPrueba(partida[0][0]["id_prueba"]);
			//$("#0").append("<br>Prueba a realizar: "+pruebaActual["tipo"]);
			if(partida[0].length>1){
				//$("#0").append("<br><center><button type='button' onclick='siguiente("+'"destino1","'+partida[0][1]["nombre"]+'"'+");' class='btn btn-light'>Siguiente</button></center>"); //boton siguiente hay que borrarlo cuando funcione el juego
				$("#0").append("<input type='hidden' value='destino1' id='siguienteDestino0'>");
				$("#0").append("<input type='hidden' value='"+partida[0][1]["nombre"]+"' id='siguienteTienda0'>");
			}/*else{
				$("#0").append("<br><center><button type='button' onclick='acabarPartida();' class='btn btn-light'>Acabar Juego</button></center>"); //boton siguiente hay que borrarlo cuando funcione el juego
				$("#0").append("Se acabó!");
			}*/
			//$("#destino"+destinoqueToca).append("<h4>Cómo llegar:</h4> <p><i class='fas fa-map-marker-alt'></i> " + partida[0][0]["goClave"] + "</p>");
			$("#destino0").append("<p><i class='fas fa-map-marker-alt'></i> Aquí tens una pista sobre l'establiment.</p><center><img style='max-width:100%;' src='images/locales/"+partida[0][0]["foto"]+"'></center><br><br>"); //En caso de que tengan el mismo monumento en común significa que estan cerca, y alomejor poniendo la imagen es suficiente para saber a donde tienen que ir
			$("#destino0").append("<center><img src='images/infantil/detective4.gif'></center>");
			idClaveActual=partida[0][0]["id_clave"];
			for(i=1;i<partida[0].length;i++){
				pruebaActual=obtenerPrueba(partida[0][i]["id_prueba"]);
				$("#"+i).append("<div class='tituloTienda'>"+ partida[0][i]["nombre"]+"<br><span style='font-size:0.6em;color:white;'>Revisa l'aparador en busca de pistes</span></div>");
				if(partida[0][i]['id_clave']==idClaveActual){
					//$("#destino"+destinoqueToca).append("<br> <p><i class='fas fa-map-marker-alt'></i> " + partida[0][i]["fromClave"] + "</p>");
					$("#destino"+destinoqueToca).append("<h4>Com arribar:</h4> <p><i class='fas fa-map-marker-alt'></i> Només tenim una pista sobre el següent establiment, és troba a prop d'on ets ara. Mira la fotografia i localitza'l.</p><center><img style='max-width:100%;' src='images/locales/"+partida[0][i]["foto"]+"'></center><br><br>"); //En caso de que tengan el mismo monumento en común significa que estan cerca, y alomejor poniendo la imagen es suficiente para saber a donde tienen que ir
				}else{
					$("#destino"+destinoqueToca).append("<p><i class='fas fa-map-marker-alt'></i> " + partida[0][destinoAnterior]["goClave"] + "</p>");
					$("#destino"+destinoqueToca).append("<p><i class='fas fa-map-marker-alt'></i> " + deClaveAClave(idClaveActual,partida[0][i]['id_clave']) + "</p>");
					$("#destino"+destinoqueToca).append("<p><i class='fas fa-map-marker-alt'></i> " + partida[0][i]["fromClave"] + "</p>");
					$("#destino"+destinoqueToca).append("<h4>Com arribar:</h4> <p><i class='fas fa-map-marker-alt'></i> Aquí tens una pista sobre l'establiment.</p><center><img style='max-width:100%;' src='images/locales/"+partida[0][i]["foto"]+"'></center><br><br>"); //En caso de que tengan el mismo monumento en común significa que estan cerca, y alomejor poniendo la imagen es suficiente para saber a donde tienen que ir
					$("#destino"+destinoqueToca).append("<center><img src='images/infantil/detective4.gif'></center>");
					idClaveActual=partida[0][i]["id_clave"];
				}
				$("#destino"+destinoqueToca).append("<center><button type='button' class='btn btn-success' data-toggle='modal' data-target='#checkTienda'><i class='fas fa-map-marker-alt'></i> HE ARRIBAT A L'ESTABLIMENT</button></center>");
				destinoqueToca++;
				//$("#"+i).append("<br>Prueba a realizar: "+pruebaActual["tipo"]);
				if(i+1!=partida[0].length){
					//$("#"+i).append("<br><center><button type='button' onclick='siguiente("+'"destino'+destinoqueToca+'","'+partida[0][i+1]["nombre"]+'"'+");' class='btn btn-light'>Siguiente</button></center>"); //boton siguiente hay que borrarlo cuando funcione el juego
					$("#"+i).append("<input type='hidden' value='destino"+destinoqueToca+"' id='siguienteDestino"+i+"'>");
					$("#"+i).append("<input type='hidden' value='"+partida[0][i+1]["nombre"]+"' id='siguienteTienda"+i+"'>");
				}
				/*else{
					$("#"+i).append("<br><center><button type='button' onclick='acabarPartida();' class='btn btn-light'>Acabar Juego</button></center>"); //boton siguiente hay que borrarlo cuando funcione el juego
					$("#"+i).append("Se acabó!");
				}*/
				destinoAnterior++;				
			}		
		}
		
		function guardarPruebaDiario(){
			$("#siguientePruebaModal").modal("show");
		}
		function guardarPruebaDiarioSiguiente(){
			$("#siguientePruebaModal").modal("hide");
			historialSiguiente(datosLadronActual(true));
		}
		function errorYoNoHariaEso(texto, idInput) {
			$('#yoNoHariaEso').modal('show');
			$('#textoYoNoHariaEso').html(texto);
			$("#"+idInput).val("");
		}
		var totalTime = 30;
		var totalTimeExtra = 0;
		//Prueba 1
		
		function huellaDactilarComprobar(param){
			if (param) {
				totalTime=30;
				totalTimeExtra=0;
				$("#prueba1Parte2").hide();
				$("#prueba1Parte1").hide();
				$("#resultadoPrueba1").show();
				$("#resultadoPrueba1Final").html(datosLadronActual(false));
			}else{
				totalTime = 30 + totalTimeExtra;
				$("#errorHuellaDactilar").show();
				$("#huellasDactilares").hide();
				comprobarPrueba1Estado1Erroneo();
			}
		}
		function comprobarPrueba1Estado1Erroneo() {
			if(totalTime==0){
				totalTimeExtra = totalTimeExtra + 10;
				$("#huellasDactilares").show();
				$("#errorHuellaDactilar").hide();
			} else {
				totalTime--;
				$("#huellaCuentaAtras").html(totalTime);
				setTimeout(function(){ comprobarPrueba1Estado1Erroneo(); }, 1000);
			}	
		}
		function comprobarCodigoPrueba1(){
			$("#prueba1Parte1").hide();
			$("#prueba1Parte2").show();
		}
		
		//PRUEBA 2
		contadorPrueba2=0;
		function comprobarCodigoPrueba2(){
			$("#prueba2Parte1").hide();
			$("#prueba2Parte2").show();
		}
		
		function jugueteComprobar(param,elem){
			$("#errorJuguete").show();
			if(param){
				$(elem).addClass("jugueteCorrecto");
				$("#errorJuguete").html("Per ara vas bé, continua així");
				$("#errorJuguete").css("color","#00a19b");
				contadorPrueba2++;
				if(contadorPrueba2==7){
					$("#prueba2Parte2").hide();
					$("#resultadoPrueba2").show();
					$("#resultadoPrueba2Final").html(datosLadronActual(false));
				}
			}else{
				$(".jugueteCorrecto").removeClass("jugueteCorrecto");
				$("#errorJuguete").html("T'has equivocat, torna a provar desde el principi.");
				$("#errorJuguete").css("color","red");
				contadorPrueba2=0;
			}
		}
		
		// Prueba 3
		var elementoSeleccionado;
		var tipoDeReciclaje;
		var contadorRecilcaje=0;
		function reciclaje(param,tipo,element){
			$(".jugueteCorrecto").removeClass("jugueteCorrecto");
			if(param){
				elementoSeleccionado=element;
				tipoDeReciclaje=tipo;
				$("#mensajeErrorPrueba3").hide();
				$(element).addClass("jugueteCorrecto");
			}else{
				$("#mensajeErrorPrueba3").show();
				$("#mensajeErrorPrueba3").html("Aquest article no l'hem de reciclar.");
			}
		}
		
		function reciclajeContenedor(tipo){
			if(tipo == tipoDeReciclaje){
				$(elementoSeleccionado).hide();
				elementoSeleccionado="";
				tipoDeReciclaje="";
				$("#mensajeErrorPrueba3").hide();
				contadorRecilcaje++;
				if(contadorRecilcaje==4){
					$("#prueba3Parte1").hide();
					$("#prueba3Parte2").show();
					$("#resultadoPrueba3Final").html(datosLadronActual(false));
				}
			}else{
				$("#mensajeErrorPrueba3").show();
				$("#mensajeErrorPrueba3").html("Aquest article no l'hem de col·locar aquí");
			}
		}
		
		
		// Prueba 4
		
		function comprobarCodigoPrueba4(){
			prueba14Param = $("#codigoPrueba4").val();
			prueba14Param = prueba14Param.trim();
			if(prueba14Param=="833"){
				$("#prueba4Estado1").hide();
				$("#prueba4Estado2").show();
				$("#resultadoPrueba4Final").html(datosLadronActual(false));
			}else{
				$("#codigoIncorrectoPrueba4").show();
				$("#codigoPrueba4").val("");
			}
		}
		function pintarHistorial(){
			$("#historial").html("<center><h3 style='color:white;'>Información recabada</h3></center><br>");
			if(localStorage.getItem('historial')){
				historial = JSON.parse(localStorage.getItem('historial'));
				for(var i=0;i<historial["tiendas"].length;i++){
					$("#historial").append('<center><div class="row"><div class="col-12">'+"<div class='tituloTienda'>"+ historial["tiendas"][i].tienda+"</div>"+'</div></div></center>');
					$("#historial").append('<center><div class="row"><div class="col-12"><p>La información que tenemos de este comercio es:</p><p>'+"<h4 style='color:white;'>"+ historial["tiendas"][i].valor+"</h4>"+'</div></div><center>');
				}
			}else{
				$("#historial").append('<center><div class="row"><div class="col-12"><h4 style="color:white;">Encara no tens informaciò guardada, visita els establiments que t`indica la APP</h4></div></div></center><center><img src="images/infantil/detective.gif"></center>');
			}
			mostrar("historial",1);
		}
		
		function ayuda(){
			mostrar("ayuda",1);
		}
		
		function historialSiguiente(valor){
			if(control){
				if(localStorage.getItem('historial')){
					historial = JSON.parse(localStorage.getItem('historial'));
					var historial2 = {
						"tienda" : tiendaActual,
						"valor" : valor
					};
					historial["tiendas"].push(historial2);
					localStorage.setItem('historial', JSON.stringify(historial));
				}else{
					var historial = {
					"tiendas" : [{
						"tienda" : tiendaActual,
						"valor" : valor
					}]};
					localStorage.setItem('historial', JSON.stringify(historial));
				}
				siguiente($("#siguienteDestino"+puntoActual).val(),$("#siguienteTienda"+puntoActual).val());
				control=false;
			}
		}
		function escribirPista(){
			if(control){
				$("#noHayPistas").hide();
				if (lastIdPrueba!=partida[1][puntoActual].id) {
				$('#todasLasPistas').html("");
				lastIdPrueba=partida[1][puntoActual].id;
				contadorPista=1;
				}
				if (contadorPista <4) {
					pistasPedidas = localStorage.getItem('pistas');
					pistasPedidas++;
					localStorage.setItem('pistas',pistasPedidas);
					$('#todasLasPistas').append("<b>Pista "+contadorPista+":</b> "+obtenerPista(partida[0][puntoActual].id_prueba, contadorPista)+"<br>");
				} else {
					$('#noHayMasPistas').show();
					$('#botonPista').hide();
				}
				contadorPista++;
			}
			
		}
		function datosLadronActual(param){
			var contadorDatosLadronActualFuncion = totalDeTiendas-partida[0].length;
			contadorDatosLadronActualFuncion= contadorDatosLadronActualFuncion+contadorDatosLadronActual;
			var datosLadronActualLocal = partida[4][0]["pista"+contadorDatosLadronActualFuncion];
			if(param && control){
				contadorDatosLadronActual++;
			}
			return datosLadronActualLocal;
		}
		function elegirSospechoso(elemento){
			$("#imagenSospechoso").attr("src",$(elemento).attr("src"));
			$("#sospechosoSeleccionado").val($(elemento).attr("data-sospechoso"));
			$("#elegirSospechosoFinal").modal("show");
			$("#sospechosoMal").hide();
			maquina("maquinas",textoSospechoso,20);
			/*if (window.confirm("Estas seguro de que el ladron es él?")) { 
				
			}*/
		}
		function confirmarSospechoso(){
			if($("#sospechosoSeleccionado").val()==partida[4][0]["numSospechoso"]){
				location.href = "win.php?win=win&sospechoso="+$("#sospechosoSeleccionado").val();
			}else{
				//location.href = "fallas.php?fallas=fail";
				pistasPedidas = localStorage.getItem('pistas');
				pistasPedidas++;
				localStorage.setItem('pistas',pistasPedidas);
				$("#sospechosoMal").show();
			}
		}	
		var timer;		
		function maquina(contenedor,texto,intervalo){
		   // Calculamos la longitud del texto
		   longitud = texto.length;
		   // Obtenemos referencia del div donde se va a alojar el texto.
		   $("#"+contenedor).html("");
		   clearInterval(timer);
		   cnt = document.getElementById(contenedor);
		   var i=0;
		   // Creamos el timer
		   timer = setInterval(function(){
			  // Vamos añadiendo letra por letra y la _ al final.
			  cnt.innerHTML = cnt.innerHTML.substr(0,cnt.innerHTML.length-1) + texto.charAt(i) + "|";
			  // Si hemos llegado al final del texto..
			  if(i >= longitud){
				 // Salimos del Timer y quitamos la barra baja (_)
				 clearInterval(timer);
				 cnt.innerHTML = cnt.innerHTML.substr(0,longitud);
				 $("#imagenSospechoso").show();
				 return true;
			  } else {
				 // En caso contrario.. seguimos
				 i++;
			  }},intervalo);
		}	
		var textoSospechoso = "Benvolgut responsable de la investigació, després de repassar totes les dades sobre el cas, recollir informació al carrer, interrogar testimonis i resoldre tota classe d'enigmes, per fi hem arribat a la conclusió que l'única persona que ha pogut robar les claus de Calafell és la persona de la imatge que adjuntem a continuació. Gràcies. Salutacions.";

		var controlPub=true;
		function activarPub(imagen,element){
			$(element).css("border","2px solid grey");
			if(controlPub){
				controlPub=false;
				$("#imagenPub").attr("src","images/pub/"+imagen);
				$("#pub").fadeIn(300);
				setTimeout(function(){ $("#pub").hide(300);controlPub=true; }, 3000);
			}
			
		}
		function quitarPub(){
			$("#pub").hide(300);
		}
		function eliminarDiacriticos(texto) {
			return texto.normalize('NFD').replace(/[\u0300-\u036f]/g,"");
		}
		
		function confirmarNuevaPartida(){
			var confirmarDecision = confirm("Estàs segur de voler començar una partida nova?"); 
            if (confirmarDecision) { 
                location.href="reiniciarJuego";
            }
		}
		function ocultar(numero) {
 		var esconderNumero = document.getElementsByClassName("tablaBordesPrueba4");
   		for(var i = 0; i < esconderNumero.length; i++) {
				if (esconderNumero[i].textContent == numero) {
				esconderNumero[i].style.visibility = "hidden";
				esconderNumero[i].parentElement.classList.add("sinFondoPrueba13");
			}
		}
		}
		
		function mostrarTodos() {
			$(".sinFondoPrueba13").removeClass("sinFondoPrueba13");
			var esconderSiete = document.getElementsByClassName("tablaBordesPrueba4"); 
			for(var i = 0; i < esconderSiete.length; i++){
				esconderSiete[i].style.visibility = "visible";
			}
		}
	</script>
	<style type="text/css">
	<!-- por defecto se pone negro en fullscreen hay que cambiarlo a blanco si queremos-->
		#patata:fullscreen { 
		background-color: white;
		}
		#patata:-webkit-full-screen {
			background-color: white;
		}
		#patata:-moz-full-screen {
			background-color: white;
		}
		.row{
			width:100%;
		}
	</style>
  </body>
</html>