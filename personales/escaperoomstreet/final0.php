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
				<div class="col-12"><img src="images/post/post.jpg" style="border-radius:2px;max-width:100%;">
				<div class="row">
					<div class="col-6"><div style="text-align:left;font-size:1.2em;color:red;"><i onclick="corazon(this);" class="far fa-heart"></i></div></div>
					<div class="col-6"><div style="text-align:right;font-size:1.2em;"><i class="far fa-bookmark"></i></div></div><br>
					<div class="col-12"><div style="text-align:left;font-size:0.7em;font-weight:bold;"><span id="contadorMeGusta">340</span> Me gusta</div></div>
					<div class="col-12"><div style="text-align:left;font-size:0.7em;font-weight:bold;">DiariCalafell</div> <div style="text-align:left;font-size:0.7em;">Després de diversos dies d’exposició a la Casa Barral, ha sigut sustret l’objecte més preciat de la ciutat.</div></div>
					<div class="col-12"><div style="text-align:left;font-size:0.7em;color:grey;">Hace 2 horas</div></div>
				</div>
			<div class="col-12">
				
				<p style="text-align:justify;margin-left:0px;">Com molt bé sabràs, l’objecte més preciat ha sigut robat. És per això que necessitem la teva ajuda perquè utilitzis les teves eines detectivesques per resoldre un cas que ningú sap resoldre.</p>
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
				<img src="images/icono/mapa.jpg" style="border-radius:5px;max-width:100%;">
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
			  <img class="sospechoso" src="images\sospechosos\adultos\1.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">39</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\espana.png"></div>
				</div>
			  <p style="font-size:0.8em;">Miguel Marco Gol</p>
			</div>
			
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\2.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">68</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\china.png"></div>
				</div>
			  <p style="font-size:0.8em;">Mario Neta</p>
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\3.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">48</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\espana.png"></div>
				</div>
			  <p style="font-size:0.8em;">Valdomero a la Plancha</p>
			</div>
		  <!--fila dos-->
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\4.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">49</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\espana.png"></div>
				</div>
			  <p style="font-size:0.8em;">Juan Macho Seco</p>
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\5.jpg" onClick="eliminarSospechoso(this)">
			  	<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">49</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\alemania.png"></div>
				</div>
			  <p style="font-size:0.8em;">Lola Mento</p>
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\6.jpg" onClick="eliminarSospechoso(this)">
			  	<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">35</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\brasil.png"></div>
				</div>
			  <p style="font-size:0.8em;">Estela Gartija</p>
			</div>
		  <!--fila tres-->
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\7.jpg" onClick="eliminarSospechoso(this)">
			  	<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">25</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\china.png"></div>
				</div>
			  <p style="font-size:0.8em;">Paca Sarte</p>
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\8.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">23</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\reino-unido.png"></div>
				</div>
			  <p style="font-size:0.8em;">Elmer Curio</p>
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\9.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">25</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\reino-unido.png"></div>
				</div>
			  <p style="font-size:0.8em;">Marcia Ana</p>
			</div>
		  <!--fila cuatro-->
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\10.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">17</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\italia.png"></div>
				</div>
			  <p style="font-size:0.8em;">Oscar Acol</p>
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\11.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">30</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\italia.png"></div>
				</div>
			  <p style="font-size:0.8em;">Aquiles Castro</p>
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\12.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">55</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\reino-unido.png"></div>
				</div>
			  <p style="font-size:0.8em;">Armando Bronca Segura</p>
			</div>
		  <!--fila cinco-->
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\13.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">63</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\francia.png"></div>
				</div>
			  <p style="font-size:0.8em;">Luz Cuesta Mogollón</p>
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\14.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">85</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\brasil.png"></div>
				</div>
			  <p style="font-size:0.8em;">Rubén Fermizo</p>
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\15.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">17</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\francia.png"></div>
				</div>
			  <p style="font-size:0.8em;">Ramon Ponte Alegre</p>
			</div>
		  <!--fila seis-->
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\16.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">17</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\italia.png"></div>
				</div>
			  <p style="font-size:0.8em;">Elena Nito</p>
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\17.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">29</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\francia.png"></div>
				</div>
			  <p style="font-size:0.8em;">Luis Brazo Dorado</p>
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\18.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">55</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\alemania.png"></div>
				</div>
			  <p style="font-size:0.8em;">Elvis Tek</p>
			  </div>
		  <!--fila siete-->
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\19.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">32</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\espana.png"></div>
				</div>
			  <p style="font-size:0.8em;">Matías Queroso</p>
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\20.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">21</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\francia.png"></div>
				</div>
			  <p style="font-size:0.8em;">Elsa Polindo</p>
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\21.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">42</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\alemania.png"></div>
				</div>
			  <p style="font-size:0.8em;">Rafael Nieto</p>
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\22.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">35</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\espana.png"></div>
				</div>
			  <p style="font-size:0.8em;">Inés Queleto</p>
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\23.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">16</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\china.png"></div>
				</div>
			  <p style="font-size:0.8em;">Helen Chufe</p>
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\24.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">25</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\china.png"></div>
				</div>
			  <p style="font-size:0.8em;">Elsa Pato</p>
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\25.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">18</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\espana.png"></div>
				</div>
			  <p style="font-size:0.8em;">Luz Rojas</p>
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\26.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">45</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\reino-unido.png"></div>
				</div>
			  <p style="font-size:0.8em;">Aquiles Brinco</p>
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\27.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">58</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\china.png"></div>
				</div>
			  <p style="font-size:0.8em;">Armando Casas</p>
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\28.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">58</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\espana.png"></div>
				</div>
			  <p style="font-size:0.8em;">Igor Dito</p>
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\29.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">58</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\china.png"></div>
				</div>
			  <p style="font-size:0.8em;">Elsa Capunta</p>
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\30.jpg" onClick="eliminarSospechoso(this)">
				<div class="row">
					<div class="col-6"><span style="color:white;font-size:0.6em;">65</span></div>
					<div class="col-6"><img style="width:30px;padding:2px;" src="images\sospechosos\banderas\reino-unido.png"></div>
				</div>
			  <p style="font-size:0.8em;">Ana Tomía</p>
			  </div>
		  </div>
		  </center>
     
      </div>
	  <center>
		<div id="prueba1" class="espaciadoAbajoSolo textoBlanco" style="display:none;">
			<div class="row">
				<div class="col-12">
					<div id="prueba1Estado0">
						<p>Al propietari d’aquest establiment li agrada passar desapercebut i anotar en el seu diari online totes les coses que veu, apuntant el dia i l’hora.</p>
						<p>Hem intentat parlar amb ell però no ens ha sigut possible. Intentarem accedir al seu diari personal, però segons les anotacions de l’anterior detectiu, haurem d’esbrinar el codi d’accés. 
						“Pots utilitzar el teu telèfon mòbil per reflexionar”
						</p>
						<img src="images/pruebas/prueba1/pluma.jfif" style="max-width:100%;"><br><br>
						<p style="color:red;" id="textoErrorPrueba1"></p><br>
						<div class="form-group">
							<input class="form-control" type="text" id="textoPrueba1" placeholder="Codi d'accés">
						</div>
						
						<button onclick="comprobarPrueba1();" type="button" class="btn btn-info"><i class="fas fa-at"></i> COMPROVAR CODI</button>
					</div>
					<div id="prueba1Estado1" style="display:none;">
						<div style="background-color:#FFD547;padding:5px;margin-top:5px;">
						<h4 style="background-color:#47B1FF;padding:20px;">DIARI PROPIETARI</h4>
						<p style="color:black;font-weight:bold;">- 09:15 h. La senyora María va a buscar el pa com cada dia.</p>
						<p style="color:black;font-weight:bold;">- 09:17 h. El senyor Jaume i una noia jove es troben i parlen una estona. Semblen contents.</p>
						<p style="color:black;font-weight:bold;">- 09:20 h. La senyora Pepeta es dirigeix a casa seva molt cansada.</p>
						<p style="color:black;font-weight:bold;" class="respuestaEstablecimiento"  onclick="guardarPruebaDiario();">- 09:21 h. Una persona que no he vist mai, porta un objecte amagat: (<b><span id="resultadoPrueba1"></span></b>).</p>
						<p style="color:black;font-weight:bold;">- 09:23h: 09:22 h. Una senyora morena entrega una carta a la casa de davant.</p>
						<p style="color:black;font-weight:bold;">FES CLIC A LA INFORMACIÓ RELLEVANT, PER ENMAGATZEMAR-LA AL HISTORIAL</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="prueba2" class="espaciadoAbajoSolo textoBlanco" style="display:none;">
			<div class="row">
				<div class="col-12">
					<img src="images/pruebas/prueba2/segur.jpg" style="max-width:100%;"><br><br>
				</div>
			</div><br><br>
			<div class="row">
				<div class="col-12">
					<div style="background-color:#075e54">
						<div class="row">
							<div class="col-2">
							<img src="images/pruebas/prueba2/peine.jpg" style="margin-top:5px;width:40px;border-radius:50px;background-color:white;padding:3px;">
							</div>
							<div class="col-4">
								<div style="text-align:left;font-weight:bold;">Cosmètica<br><span id="escrbiendo" style="font-size:0.7em;">En linea</span></div>
							</div>
							<div class="col-6">
								<p style="text-align:right;font-weight:bold;"><i class="fas fa-video"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-phone-alt"></i></p>
							</div>
						</div>
					</div>
					<div style="background-color:#E8DCCF;"><br>
						<div class="row">
							<div class="col-11" style="text-align: left;">
							<div style="border-radius:5px;color:black;display:inline-block;padding:5px;background-color:#dcf8c6; text-align:left;">Hola, sé que estàs investigant el cas de la clau de Calafell&nbsp;&nbsp;<div style="text-align:right;font-size:0.7em;">18:57 <span style="font-size:0.5em;color:#34b7f1"></span></div></div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-3">
							</div>
							<div class="col-9" style="text-align: right;">
							<div style="text-align:left;border-radius:5px;color:black;display:inline-block;padding:5px;background-color:#dcf8c6;">Hola, sí, qui ets?&nbsp;&nbsp;<div style="text-align:right;font-size:0.7em;">18:57</span> <span style="font-size:0.5em;color:#34b7f1"><i class="fas fa-check-double"></i></div></div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-11" style="text-align: left;">
							<div style="border-radius:5px;color:black;display:inline-block;padding:5px;background-color:#dcf8c6; text-align:left;">No t'ho puc dir, guarda'm com perruquera, no vull que ningú s'assabenti de qui sóc&nbsp;&nbsp;<div style="text-align:right;font-size:0.7em;">18:57</div></div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-4">
							</div>
							<div class="col-8" style="text-align: right;">
							<div style="border-radius:5px;color:black;display:inline-block;padding:5px;background-color:#dcf8c6;text-align:left;">mmm, d'acord. Quina informació tens?&nbsp;&nbsp;<div style="text-align:right;font-size:0.7em;">18:57</span> <span style="font-size:0.5em;color:#34b7f1"><i class="fas fa-check-double"></i></div></div>
							</div>
						</div><br>
						<div class="row">
							<div class="col-11" style="text-align: left;">
							<div style="border-radius:5px;color:black;display:inline-block;padding:5px;background-color:#dcf8c6;">Que tenen en comú les fotos de dalt?&nbsp;&nbsp;<span style="font-size:0.7em;">18:57</span></div>
							</div>
						</div><br>
						<div class="row" id="respuestaPrueba2_2" style="display:none;">
							<div class="col-3">
							</div>
							<div class="col-9" style="text-align: right;">
							<div style="border-radius:5px;color:black;display:inline-block;padding:5px;background-color:#dcf8c6;text-align:left;"><span id="respuestaWhatsappQueEnvian"></span>&nbsp;&nbsp;<div style="text-align:right;font-size:0.7em;">18:57</span> <span style="font-size:0.5em;color:#34b7f1"><i class="fas fa-check-double"></i></div></div>
							</div>
						</div><br>
						<div class="row"  onclick="guardarPruebaDiario();" id="respuestaPrueba2_1" style="display:none;">
							<div class="col-9" style="text-align: left;">
							<div style="border-radius:5px;color:black;display:inline-block;padding:5px;background-color:#dcf8c6;"><b><span id="respuestaPrueba2" ></span></b>&nbsp;&nbsp;<span style="font-size:0.7em;">18:57</span></div>
							</div>
						</div>
						
						
						<br>
					</div>
					<div style="background-color:#ece5dd">
						<div class="row">
							<div class="col-1">
								<div style="color:grey;margin-top:7px;"><i class="far fa-grin-alt"></i></div>
							</div>
							<div class="col-9">
								<div class="form-group">
									<input class="form-control" id="resultadoPrueba2" type="text" placeholder="Escribe un mensaje">
								</div>
							</div>
							<div class="col-1">
								<div style="color:grey;margin-top:7px;font-size:1.2em;" onclick="comprobarPrueba2();"><i  class="fas fa-paper-plane"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<p>Fes clic sobre el missatge que contesti un cop enviis el resultat correcte, per guardar-ho a l'historial que tenim sobre el sospitós.</p>
				</div>
			</div>
		</div>
		<div id="prueba3" class="espaciadoAbajoSolo textoBlanco" style="display:none;">
			<div class="row">
				<div class="col-12">
					<div id="prueba3Estado0">
						<p>Aquest establiment està replet d’articles interessants que ens poden donar moltes pistes sobre el principal sospitós del robatori. Per accedir als arxius de trànsit secrets, haurem de desxifrar aquest codi de símbols.</p>
						<p>Per accedir al mapa de transcripcions, posem la teva ment a prova:</p>
						<img src="images\pruebas\prueba3\operacionPrueba3.jpg" style="max-width:100%;"><br><br>
						<div class="form-group">
							<input class="form-control" type="text" id="textoPrueba3" placeholder="Resultat">
						</div>
						<p style="color:red;" id="textoErrorPrueba3"></p>
						<button onclick="comprobarPrueba3();" type="button" class="btn btn-info"><i class="fas fa-at"></i> COMPROVAR RESULTAT</button>
					</div>
					<div id="prueba3Estado1" style="display:none;">
						<img src="images/pruebas/prueba3/prueba3Deportes.jpg" style="max-width:100%;">
						<br><br><br>
						<div class="form-group">
							<input class="form-control" type="text" id="textoPrueba3Estado1" placeholder="Resultat">
						</div>
						<p style="color:red;" id="textoErrorPrueba3"></p>
						<button onclick="comprobarPrueba3Estado1();" type="button" class="btn btn-info"><i class="fas fa-at"></i> COMPROVAR RESULTAT</button>
					</div>
					<div id="prueba3Estado2" style="display:none;">
						<p>Benvingut/da als nostres arxius de trànsit secrets. Segons hem pogut comprovar per les pistes i anotacions que hem trobat de la policia, la informació que tenim és: <br><span onclick="guardarPruebaDiario();" class="respuestaEstablecimiento"  id="resultadoPrueba3"></span></p>
						<p>Fes clic sobre l'informació que et dóna l'establiment per guardar-ho a l'historial que tenim sobre el sospitós.</p>
					</div>
				</div>
			</div>
		</div>
		<div id="prueba4" class="espaciadoAbajoSolo textoBlanco" style="display: none;">
			<div class="row">
				<div class="col-12">
					<center><span style="color:red;" id="textoErrorPrueba4Estado1"></span>
					<span id="countdown"></span>
					<span style="color:red;" id="textoErrorPrueba4Estado12"></span></center>
					<div id="prueba4Estado1" >
						<P>Bé, amb aquesta transcripció descobrireu el color preferit que amaga el propietari.</P>
						<!--<img src="images/pruebas/prueba4/prueba4Letras.jpg" style="max-width:100%;">-->
						<p>Pulsa el color correcte</p>
						<div class="row">
							<!--3 Primeros colores-->
							<div class="col-4" style="background-color: #0E25C0; height: 7em;" onclick="modalPrueba4();"></div>
							<div class="col-4" style="background-color: #F400A1; height: 7em;" onclick="modalPrueba4(true);"></div>
							<div class="col-4" style="background-color: #FFDE59; height: 7em;" onclick="modalPrueba4();"></div>
						</div>
						<div class="row">
							<!--3 Segundos colores-->
							<div class="col-4" style="background-color: #7ED956; height: 7em;" onclick="modalPrueba4();"></div>
							<div class="col-4" style="background-color: black; height: 7em;" onclick="modalPrueba4();"></div>
							<div class="col-4" style="background-color: #9D4B01; height: 7em;" onclick="modalPrueba4();"></div>
						</div>
						<div class="row">
							<!--3 Terceros colores-->
							<div class="col-4" style="background-color: #FF914C; height: 7em;" onclick="modalPrueba4();"></div>
							<div class="col-4" style="background-color: #FF1717; height: 7em;" onclick="modalPrueba4();"></div>
							<div class="col-4" style="background-color: #5CE1E6; height: 7em;" onclick="modalPrueba4();"></div>
						</div>
					</div>
					<div id="prueba4Estado2" style="display:none;">
						<img src="images/pruebas/prueba4/prueba4Diario.png" style="max-width:100%;">
						<p>Guardar resposta al diari personal, fent clic.</p>
						<span onclick="guardarPruebaDiario();" class="respuestaEstablecimiento"  id="resultadoPrueba4"></span></p>
						<p>Fes clic sobre l'informació que et dóna l'establiment per guardar-ho a l'historial que tenim sobre el sospitós.</p>
					</div>
				</div>
			</div>
		</div>
		<div id="prueba5" class="espaciadoAbajoSolo textoBlanco" style="display:none;">
			<div class="row" id="prueba5Parte1">
				<div class="col-12">
				<p>En aquest Escape Room creiem que han sigut testimonis del robatori o del culpable. Però no serà tan fàcil que ens proporcionin informació. Haurem d’ajudar-los.</p>
				<p>En Jose no pot accedir al seu magatzem perquè ha perdut les claus. Les tenia dins del joc, però l’ha estat buscant i no les troba enlloc. Connecta't a les càmeres de seguretat i ajuda'l.</p>
				<center><button onclick="comenzarBarraProgreso(0);" type="button" class="btn btn-info"><i class="fas fa-laptop-code"></i> HACK CAM</button></center>
				</div>
			</div>
			<div class="row" id="prueba5Parte2" style="display:none;">
				<div class="col-12" id="prueba5Parte2Barra">
					<h4>Accedint a les càmeres de seguretat</h4>
					<div class="progress">
					  <div id="barraProgresoPrueba5" class="progress-bar" style="width: 0%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
					</div>
					<center><div style="font-size:0.7;" id="mensajesHackeoCamaras"><i class="fas fa-wifi"></i> Establint connexiò wifi...</div></center>
				</div>
				<div class="col-12" id="prueba5Parte2Error" style="display:none;">
					<h4 style="color:red;"><i class="fas fa-exclamation-triangle"></i> S'ha detectat un accés no autoritzat.</h4>
					<p>Ep! Introdueix el codi de seguretat per accedir a les gravacions</p>
					<p id="codigoIncorrectoPrueba5" style="display:none;color:red;">Error! Introdueix el codi correcte.</p>
					<div class="form-group">
						<input class="form-control" type="text" id="textoPrueba5Codigo" placeholder="Resultat">
					</div>
					<button onclick="comprobarCodigoPrueba5();" type="button" class="btn btn-info"><i class="fas fa-laptop-code"></i> COMPROVAR RESULTAT</button>
					
				</div>
				<div class="col-12" id="prueba5Parte3" style="display:none;">
					<p>Ajuda a trobar les claus del magatzem fent clic sobre elles a les càmeres de seguretat.</p>
					<h4>CÀMERES DE SEGURETAT</h4>
					<img id="imagen0Prueba5" src="images/pruebas/prueba5/platja/camara0.jfif" style="max-width:100%;">
					<img id="imagen1Prueba5" src="images/pruebas/prueba5/platja/camara1.jfif" style="display:none;max-width:100%;">
					<img id="imagen2Prueba5" onclick="prueba5ClicImagen(event);" src="images/pruebas/prueba5/platja/camara2.jfif" style="display:none;max-width:100%;">
					<img id="imagen3Prueba5" src="images/pruebas/prueba5/platja/camara3.jfif" style="display:none;max-width:100%;"><br><br>
					<button onclick="prueba5atras();" type="button" class="btn btn-info"><i class="fas fa-arrow-left"></i></button>
					<button onclick="prueba5siguiente();" type="button" class="btn btn-info"><i class="fas fa-arrow-right"></i></button>
					
				</div>
				<div class="row" id="resultadoPrueba5" style="display:none;">
				<div class="col-12">
					<p>Perfecte! L’amo de l’establiment està molt agraït que l’hagis ajudat. Ens diu el següent:</p>
					<div onclick="guardarPruebaDiario()" class="respuestaEstablecimiento" id="resultadoPrueba5Final"></div>
					<p>Fes clic sobre l'informació que et dóna l'establiment per guardar-ho a l'historial que tenim sobre el sospitós.</p>
				</div>
				</div>
				
			</div>
		</div>
		<div id="prueba6" class="espaciadoAbajoSolo textoBlanco" style="display:none;">
			<div class="row" id="prueba6Parte1">
				<div class="col-12">
				<p>El botiguer ens ha comunicat que hi ha empremtes dactilars pel seu aparador. Hem d’investigar a qui poden pertànyer.</p>
				<p>Selecciona el tipus d’empremta que veus a l’aparador. </p>
				<div id="errorHuellaDactilar" style="display:none;">
					<span style="color:red;">T'has equivocat, torna a provar en </span>
					<span id="huellaCuentaAtras" style="color:red;"></span>
					<span style="color:red;"> segons.</span>
				</div>
					<div id="huellasDactilares">
						<div class="row">
							<div class="col-4">
								<img src="images/pruebas/prueba6/1.png" onclick="huellaDactilarComprobar();" style="max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/pruebas/prueba6/2.png" onclick="huellaDactilarComprobar();" style="max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/pruebas/prueba6/3.png" onclick="huellaDactilarComprobar();" style="max-width:100%;">
							</div>
						</div><br>
						<div class="row">
							<div class="col-4">
								<img src="images/pruebas/prueba6/4.png" onclick="huellaDactilarComprobar(true);" style="max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/pruebas/prueba6/5.png" onclick="huellaDactilarComprobar();" style="max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/pruebas/prueba6/6.png" onclick="huellaDactilarComprobar();" style="max-width:100%;">
							</div>
						</div>
						<div class="row">
							<div class="col-4">
								<img src="images/pruebas/prueba6/7.png" onclick="huellaDactilarComprobar();" style="max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/pruebas/prueba6/8.png" onclick="huellaDactilarComprobar();" style="max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/pruebas/prueba6/9.png" onclick="huellaDactilarComprobar();" style="max-width:100%;">
							</div>
						</div>
						<div class="row">
							<div class="col-4">
								<img src="images/pruebas/prueba6/10.png" onclick="huellaDactilarComprobar();" style="max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/pruebas/prueba6/11.png" onclick="huellaDactilarComprobar();" style="max-width:100%;">
							</div>
							<div class="col-4">
								<img src="images/pruebas/prueba6/12.png" onclick="huellaDactilarComprobar();" style="max-width:100%;">
							</div>
						</div>
						
					</div>
				</div>
			</div>
			<div class="row" id="prueba6Parte2" style="display:none;">
				<div class="col-12">
					<h4> Ep! Verifica que ets tú. </h4>
					<p id="codigoIncorrectoPrueba6" style="display:none;color:red;">Error! Introdueix el codi correcte.</p>
					<div class="form-group">
						<input class="form-control" type="text" id="textoPrueba6Codigo" placeholder="Resultat">
					</div>
					<button onclick="comprobarCodigoPrueba6();" type="button" class="btn btn-info">COMPROVAR RESULTAT</button>
					
				</div>
				
			</div>
			<div class="row" id="resultadoPrueba6" style="display:none;">
			<div class="col-12">
				<p>El botiguer ens ha dit:</p>
				<div onclick="guardarPruebaDiario()" class="respuestaEstablecimiento"  id="resultadoPrueba6Final"></div>
				<p>Fes clic sobre l'informació que et dóna l'establiment per guardar-ho a l'historial que tenim sobre el sospitós.</p>
			</div>
			</div>
		</div>
		<div id="prueba7" class="espaciadoAbajoSolo textoBlanco" style="display:none;">
			<div class="row" id="prueba7Parte1">
				<div class="col-12">
				<p>Per accedir a la informació confidencial, has de saber quin filtre aplicar al missatge secret. </p>
				<img src="images/pruebas/prueba7/equivalencias.jpg" style="max-width:100%;">
				</div>
				<div class="col-4">
					<br><button onclick="aplicarFiltro('blue');" type="button" style="background-color:blue;" class="btn btn-info">Blau</button>
				</div>
				<div class="col-4">
					<br><button onclick="aplicarFiltro('green');" type="button" style="background-color:green;" class="btn btn-info">Verd</button>
				</div>
				<div class="col-4">
					<br><button onclick="aplicarFiltro('purple');" type="button" style="background-color:purple;" class="btn btn-info">Lila</button>
				</div>
				<div class="col-4">
					<br><button onclick="aplicarFiltro('yellow');" type="button" style="background-color:yellow;color:black;" class="btn btn-info">Groc</button>
				</div>
				<div class="col-4">
					<br><button onclick="aplicarFiltro('red');" type="button" style="background-color:red;" class="btn btn-info">Vermell</button>
				</div>
				<div class="col-4">
					<br><button onclick="aplicarFiltro('pink');" type="button" style="background-color:pink;color:black;" class="btn btn-info">Rosa</button>
				</div>
				<div class="col-12" style="margin-top:15px;">
					<div id="aplicarFiltroAqui" style="position:absolute;opacity:0.8;"></div>
					<img id="imagenFiltroColores" src="images/pruebas/prueba7/texto.jpg" style="border-radius:5px;max-width:100%;">
				</div>
				<div class="col-12">
					<div class="form-group" style="margin-top:20px;">
						<p id="resultadoIncorrectoPrueba7" style="display:none;color:red;">Error! Introdueix el resultat correcte.</p>
						<input class="form-control" type="text" id="resultadoPrueba7" placeholder="Introdueix el resultat"><br>
						<button onclick="comprobarResultadoPrueba7();" type="button" class="btn btn-info">COMPROVAR RESULTAT</button>
					</div>
				</div>
			</div>
			<div class="row" id="prueba7Parte2" style="display:none;">
				<div class="col-12">
					<p>El botiguer ens ha dit:</p>
					<div onclick="guardarPruebaDiario()" class="respuestaEstablecimiento"  id="resultadoPrueba7Final"></div>
					<p>Fes clic sobre l'informació que et dóna l'establiment per guardar-ho a l'historial que tenim sobre el sospitós.</p>
				</div>
			</div>
			
		</div>
		<div id="prueba8" class="espaciadoAbajoSolo textoBlanco"  style="display:none;">
			<div class="row" id="prueba8Parte1">
				<div class="col-12">
					<p>Des d’aquest establiment ens han comunicat que s’han trobat interferències al telèfon. Tenim sospites que el culpable ha estat per aquí i ha fet diverses trucades. La mestressa de l’establiment està molt espantada i no ens dirà res. Haurem de descobrir-ho accedint al satèl·lit. Descobreix quin prefix ha fet servir el culpable </p>
				</div>
				<div class="col-6">
					<br><button onClick="mostrarFotoPrueba8('foto1');"  type="button" class="btn btn-info"><i class="fas fa-phone-square-alt"></i> Telèfons</button>
				</div>
				<div class="col-6">
					<br><button onClick="mostrarFotoPrueba8('foto2');" type="button" class="btn btn-info"><i class="fas fa-compass"></i> Brúixola</button>
				</div>
				<div class="col-12">
					<img id="foto1" src="images/pruebas/prueba8/telefono.jpg" style="margin-top:10px;display:none;max-width:100%;border-radius:3px;">
					<div id="foto2" style="display:none;"><p><b>El cercle vermellós ha d’apuntar a les 12h.</b></p><img src="images/pruebas/prueba8/rueda.jpg" style="margin-top:10px;max-width:100%;border-radius:3px;"></div><br><br>
				</div>
				<div class="col-12">
					<div class="form-group">
						<p id="codigoIncorrectoPrueba8" style="display:none;color:red;">Error! Introdueix el prefixe correcte.</p>
						<input class="form-control" type="text" id="prefijoPrueba8" placeholder="Introdueix el prefixe"><br>
						<button onclick="comprobarPrefijoPrueba8();" type="button" class="btn btn-info">COMPROVAR RESULTAT</button>
					</div>
				</div>
			</div>
			<div class="row" id="resultadoPrueba8" style="display:none;">
			<div class="col-12">
				<p>El botiguer ens ha dit:</p>
				<div onclick="guardarPruebaDiario()" class="respuestaEstablecimiento" id="resultadoPrueba8Final"></div>
				<p>Fes clic sobre l'informació que et dóna l'establiment per guardar-ho a l'historial que tenim sobre el sospitós.</p>
			</div>
			</div>

		</div>
		<div id="prueba10" class="espaciadoAbajoSolo textoBlanco" style="display:none;">
			<div class="row" id="prueba10Parte1">
				<div class="col-12">
					<p>Accés a les càmeres que té l’ajuntament en aquest punt del poble.<br>
						Per accedir, has de verificar el punt de la càmera a través d’aquesta prova.<br>
						Quin establiment hi ha davant?
					</p>
					<p id="codigoIncorrectoPrueba10" style="display:none;color:red;">Aquesta imatge no representa la cafeteria que tens davant.</p>
				</div>
				<div class="col-4">
					<img src="images/pruebas/prueba10/1.jpg" onclick="comprobarPrueba10(false);" style="border-radius:3px;max-width:100%;"><br><br>
				</div>
				<div class="col-4">
					<img src="images/pruebas/prueba10/11.jpg" onclick="comprobarPrueba10(true);" style="border-radius:3px;max-width:100%;"><br><br>
				</div>
				<div class="col-4">
					<img src="images/pruebas/prueba10/3.jpg" onclick="comprobarPrueba10(false);" style="border-radius:3px;max-width:100%;"><br><br>
				</div>
				<div class="col-4">
					<img src="images/pruebas/prueba10/4.jpg" onclick="comprobarPrueba10(false);" style="border-radius:3px;max-width:100%;"><br><br>
				</div>
				<div class="col-4">
					<img src="images/pruebas/prueba10/5.jpg" onclick="comprobarPrueba10(false);" style="border-radius:3px;max-width:100%;"><br><br>
				</div>
				<div class="col-4">
					<img src="images/pruebas/prueba10/6.jpg" onclick="comprobarPrueba10(false);" style="border-radius:3px;max-width:100%;"><br><br>
				</div>
				<div class="col-4">
					<img src="images/pruebas/prueba10/7.jpg" onclick="comprobarPrueba10(false);" style="border-radius:3px;max-width:100%;"><br><br>
				</div>
				<div class="col-4">
					<img src="images/pruebas/prueba10/8.jpg" onclick="comprobarPrueba10(false);" style="border-radius:3px;max-width:100%;"><br><br>
				</div>
				<div class="col-4">
					<img src="images/pruebas/prueba10/9.jpg"onclick="comprobarPrueba10(false);" style="border-radius:3px;max-width:100%;"><br><br>
				</div>
				
			</div>
			<div class="row" id="prueba10Parte2" style="display:none;">
				<div class="col-12" id="prueba10Parte2Barra">
					<div class="progress">
					  <div id="barraProgresoPrueba10" class="progress-bar" style="width: 0%" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
					</div>
					<center><div>Hackejant càmeres de seguretat</div></center>
				</div>
				<div class="col-12" id="prueba10Parte2Codigo" style="display:none;">
					<img id="prueba10Imagen" src="images/pruebas/prueba10/platja/1.jpg" style="border-radius:10px;max-width:100%;"><br><br>
					<button onclick="prueba10atras();" type="button" class="btn btn-info"><i class="fas fa-arrow-left"></i></button>
					<button onclick="prueba10siguiente();" type="button" class="btn btn-info"><i class="fas fa-arrow-right"></i></button><br><br>
					<p id="codigoIncorrectoPrueba10Parte2" style="display:none;color:red;">El codi no es correcte</p>
					<div class="form-group">
						<input class="form-control" type="text" id="codigoPrueba10" placeholder="Introdueix el codi que apareix a la fotografia"><br>
						<button onclick="comprobarCodigoPrueba10();" type="button" class="btn btn-info">COMPROVAR RESULTAT</button>
					</div>
				</div>
			</div>
			<div class="row" id="prueba10Parte3" style="display:none;">
				<div class="col-12">
					<h4>Perfecte! Hem aconseguit desxifrar el codi. </h4>
					<p>El botiguer, està molt agraït i ens ha dit:</p>
					<div onclick="guardarPruebaDiario()" class="respuestaEstablecimiento"  id="resultadoPrueba10Final"></div>
					<p>Fes clic sobre l'informació que et dóna l'establiment per guardar-ho a l'historial que tenim sobre el sospitós.</p>
				</div>
			</div>
		</div>
		<div id="prueba11" class="espaciadoAbajoSolo textoBlanco" style="display:none;">
			<div class="row" id="prueba11Parte1">
				<div class="col-12">
					<p>En aquest establiment els agrada molt la sopa ben calenta, sobretot a l’hivern. La propietària de l’establiment no ens donarà cap informació fins que trobem la recepta de la sopa perfecta. Així que, endavant.</p>
					<p>Hi ha uns quants números que sobren, fes clic als números que vulguis descartar</p>
				</div>
				<div class="col-12">
					<table style="border:1px solid;width:100%;">
						<tr>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>3</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>8</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>1</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>6</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>7</span></td>
						</tr>
						<tr>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>3</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>4</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>5</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>7</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>9</span></td>
						</tr>
						<tr>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>5</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>7</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>4</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>4</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>1</span></td>
						</tr>
						<tr>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>4</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>1</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>2</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>5</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>3</span></td>
						</tr>
						<tr>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>8</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>3</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>2</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>3</span></td>
							<td style="border:1px solid orange;text-align:center;padding:10px;font-size:1.6em;color:#E1DEDE;font-weight:bold;" onclick="tachar(this);"><span>5</span></td>
						</tr>
					</table><br>
				</div>
				<div class="col-12">
					<div class="form-group">
						<p id="codigoIncorrectoPrueba11" style="display:none;color:red;">Error! Introdueix el número correcte.</p>
						<input class="form-control" type="text" id="codigoPrueba11" placeholder="Introdueix el número de la sort"><br>
						<button onclick="comprobarCodigoPrueba11();" type="button" class="btn btn-info">COMPROVAR RESULTAT</button>
					</div>
				</div>
			</div>
			<div class="row" id="prueba11Parte2" style="display:none;">
				<div class="col-12">
					<p>La propietaria ens ha dit:</p>
					<div onclick="guardarPruebaDiario()" class="respuestaEstablecimiento"  id="resultadoPrueba11inal"></div>
					<p>Fes clic sobre l'informació que et dóna l'establiment per guardar-ho a l'historial que tenim sobre el sospitós.</p>
				</div>
			</div>
		</div>
		<div id="prueba12" class="espaciadoAbajoSolo textoBlanco" style="display:none;">
			<div class="row" id="prueba12Parte1">
				<div class="col-12">
					<p>En aquest establiment tenen clar que el culpable ha comès un gran error. Abans que ens expliquin què han vist i com ens poden ajudar haurem d’ajudar-los a resoldre el seu problema.</p> 
					<audio controls>
					  <source src="images/pruebas/prueba12/morse.mp3" type="audio/mpeg">
					Your browser does not support the audio element.
					</audio>
					<p>Resulta que han rebut un missatge de veu però no entenen absolutament res.</p>
					<div class="form-group">
						<p id="codigoIncorrectoPrueba12" style="display:none;color:red;">Error! Introdueix el codi correcte.</p>
						<input class="form-control" type="text" id="codigoPrueba12" placeholder="Introdueix el codi de la nota de veu"><br>
						<button onclick="comprobarCodigoPrueba12();" type="button" class="btn btn-info">COMPROVAR RESULTAT</button>
					</div>
				</div>
				
			</div>
			<div class="row" id="prueba12Parte2" style="display:none;">
				<div class="col-12">
					<h4>Perfecte! Hem aconseguit desxifrar el codi. </h4>
					<p>El botiguer, està molt agraït i ens ha dit:</p>
					<div onclick="guardarPruebaDiario()" class="respuestaEstablecimiento"  id="resultadoPrueba12Final"></div>
					<p>Fes clic sobre l'informació que et dóna l'establiment per guardar-ho a l'historial que tenim sobre el sospitós.</p>
				</div>
			</div>
		</div>
		
		<div id="prueba13" class="espaciadoAbajoSolo textoBlanco" style="display:none;">
			<div id="prueba13Estado1">
			<div class="row">
				<div class="col-12">
				<h4>Aconsegueix el número secret del botiguer</h4>
				<p>Amb el panell que tens a sota, fent clic a 2 números correlatius, apareixerán 2 números nous. Un cop els tinguis, introdueix-los al espai que tens a sota i podrás accedir a la informació.</p>
				</div>
			</div>
		<div class="scrollableLateral">
			<div class="row">
				<!--PRIMERA FILA PRIMERA PARTE-->
				<div class="col-6" style="padding: 0px;">
					<div class="row">
						<!-- 1  -->
						<div class="col-2">
							<div class="tablaBordesPrueba4">9</div>
						</div>
						<!-- 2 -->
						<div class="col-2">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<!-- 3-->
						<div class="col-2">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<!-- 4-->
						<div class="col-2">
							<div class="tablaBordesPrueba4">1</div>
						</div>
						<!-- 5-->
						<div class="col-2">
							<div class="tablaBordesPrueba4">1</div>
						</div>
						<!-- 6-->
						<div class="col-2">
							<div class="tablaBordesPrueba4">9</div>
						</div>
						<!--7 -->
						<div class="col-2">
							<div class="tablaBordesPrueba4">9</div>
						</div>
						<!-- 8 -->
						<div class="col-2">
							<div class="tablaBordesPrueba4">2</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">2</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">3</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">2</div>
						</div>
						<!-- 1  -->
						<div class="col-2">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<!-- 2 -->
						<div class="col-2">
							<div class="tablaBordesPrueba4">2</div>
						</div>
						<!-- 3-->
						<div class="col-2">
							<div class="tablaBordesPrueba4">0</div>
						</div>
						<!-- 4-->
						<div class="col-2">
							<div class="tablaBordesPrueba4">2</div>
						</div>
						<!-- 5-->
						<div class="col-2">
							<div class="tablaBordesPrueba4">6</div>
						</div>
						<!-- 6-->
						<div class="col-2">
							<div class="tablaBordesPrueba4">2</div>
						</div>
						<!--7 -->
						<div class="col-2">
							<div class="tablaBordesPrueba4">9</div>
						</div>
						<!-- 8 -->
						<div class="col-2">
							<div class="tablaBordesPrueba4">2</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">3</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">2</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">6</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">3</div>
						</div>
						<!-- 1  -->
						<div class="col-2">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<!-- 2 -->
						<div class="col-2">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<!-- 3-->
						<div class="col-2">
							<div class="tablaBordesPrueba4">6</div>
						</div>
						<!-- 4-->
						<div class="col-2">
							<div class="tablaBordesPrueba4">3</div>
						</div>
						<!-- 5-->
						<div class="col-2">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<!-- 6-->
						<div class="col-2">
							<div class="tablaBordesPrueba4">2</div>
						</div>
						<!--7 -->
						<div class="col-2">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<!-- 8 -->
						<div class="col-2">
							<div class="tablaBordesPrueba4">2</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">3</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">2</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">2</div>
						</div>
						<!-- 1  -->
						<div class="col-2">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<!-- 2 -->
						<div class="col-2">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<!-- 3-->
						<div class="col-2">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<!-- 4-->
						<div class="col-2">
							<div class="tablaBordesPrueba4">1</div>
						</div>
						<!-- 5-->
						<div class="col-2">
							<div class="tablaBordesPrueba4">1</div>
						</div>
						<!-- 6-->
						<div class="col-2">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<!--7 -->
						<div class="col-2">
							<div class="tablaBordesPrueba4"></div>
						</div>
						<!-- 8 -->
						<div class="col-2">
							<div class="tablaBordesPrueba4"></div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4"></div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4"></div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4"></div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4"></div>
						</div>
					</div>
				</div>
				<div class="col-6" style="padding: 0px;">
					<div class="row">
						<div class="col-2">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-6">
							<div class="tablaBordesPrueba4"></div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">2</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">3</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">4</div>
						</div>
						<div class="col-6">
							<div class="tablaBordesPrueba4"></div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">1</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">1</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">1</div>
						</div>
						<div class="col-6">
							<div class="tablaBordesPrueba4"></div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">3</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">2</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">9</div>
						</div>
						<div class="col-6">
							<div class="tablaBordesPrueba4"></div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">9</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">3</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">9</div>
						</div>
						<div class="col-6">
							<div class="tablaBordesPrueba4"></div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">2</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">3</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">8</div>
						</div>
						<div class="col-6">
							<div class="tablaBordesPrueba4"></div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">5</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">6</div>
						</div>
						<div class="col-2">
							<div class="tablaBordesPrueba4">8</div>
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
			<div class="col-12">
				<div class="form-group">
					<p id="codigoIncorrectoPrueba13" style="display:none;color:red;">Error! Introdueix el codi correcte.</p>
					<input class="form-control" type="text" id="codigoPrueba13" placeholder="Introdueix el número amagat"><br>
					<button onclick="comprobarCodigoPrueba13();" type="button" class="btn btn-info">COMPROVAR RESULTAT</button>
				</div>
			</div>
		</div>
			<div id="prueba13Estado2" style="display:none;">
				<div class="col-12">
					<h4>Perfecte! Hem aconseguit desxifrar el codi. </h4>
					<p>El botiguer, està molt agraït i ens ha dit:</p>
					<div onclick="guardarPruebaDiario()" class="respuestaEstablecimiento"  id="resultadoPrueba13Final"></div>
					<p>Fes clic sobre l'informació que et dóna l'establiment per guardar-ho a l'historial que tenim sobre el sospitós.</p>
				</div>
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
			  <img class="sospechoso" src="images\sospechosos\adultos\1.jpg" data-sospechoso="1" onClick="elegirSospechoso(this)">
			</div>
			
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\2.jpg" data-sospechoso="2" onClick="elegirSospechoso(this)">
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\3.jpg" data-sospechoso="3" onClick="elegirSospechoso(this)">
			</div>
		</div><br>
		<div class="row">
		  <!--fila dos-->
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\4.jpg" data-sospechoso="4" onClick="elegirSospechoso(this)">
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\5.jpg" data-sospechoso="5" onClick="elegirSospechoso(this)">
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\6.jpg" data-sospechoso="6" onClick="elegirSospechoso(this)">
			</div>
		</div><br>
		<div class="row">
		  <!--fila tres-->
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\7.jpg" data-sospechoso="7" onClick="elegirSospechoso(this)">
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\8.jpg" data-sospechoso="8" onClick="elegirSospechoso(this)">
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\9.jpg" data-sospechoso="9" onClick="elegirSospechoso(this)">
			</div>
		</div><br>
		<div class="row">
		  <!--fila cuatro-->
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\10.jpg" data-sospechoso="10" onClick="elegirSospechoso(this)">
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\11.jpg" data-sospechoso="11" onClick="elegirSospechoso(this)">
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\12.jpg" data-sospechoso="12" onClick="elegirSospechoso(this)">
			</div>
		</div><br>
		<div class="row">
		  <!--fila cinco-->
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\13.jpg" data-sospechoso="13" onClick="elegirSospechoso(this)">
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\14.jpg" data-sospechoso="14" onClick="elegirSospechoso(this)">
			</div>
			<div class="col-4">
			  <img class="sospechoso" src="images\sospechosos\adultos\15.jpg" data-sospechoso="15" onClick="elegirSospechoso(this)">
			</div>
		</div><br>
		<div class="row">
		  <!--fila seis-->
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\16.jpg" data-sospechoso="16" onClick="elegirSospechoso(this)">
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\17.jpg" data-sospechoso="17" onClick="elegirSospechoso(this)">
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\18.jpg" data-sospechoso="18" onClick="elegirSospechoso(this)">
			  </div>
		</div><br>
		<div class="row">
		  <!--fila siete-->
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\19.jpg" data-sospechoso="19" onClick="elegirSospechoso(this)">
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\20.jpg" data-sospechoso="20" onClick="elegirSospechoso(this)">
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\21.jpg" data-sospechoso="21" onClick="elegirSospechoso(this)">
			  </div>
		</div><br>
		<div class="row">
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\22.jpg" data-sospechoso="22" onClick="elegirSospechoso(this)">
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\23.jpg" data-sospechoso="23" onClick="elegirSospechoso(this)">
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\24.jpg" data-sospechoso="24" onClick="elegirSospechoso(this)">
			  </div>
		</div><br>
		<div class="row">
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\25.jpg" data-sospechoso="25" onClick="elegirSospechoso(this)">
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\26.jpg" data-sospechoso="26" onClick="elegirSospechoso(this)">
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\27.jpg" data-sospechoso="27" onClick="elegirSospechoso(this)">
			  </div>
		</div><br>
		<div class="row">
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\28.jpg" data-sospechoso="28" onClick="elegirSospechoso(this)">
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\29.jpg" data-sospechoso="29" onClick="elegirSospechoso(this)">
			  </div>
			  <div class="col-4">
				<img class="sospechoso" src="images\sospechosos\adultos\30.jpg" data-sospechoso="30" onClick="elegirSospechoso(this)">
			  </div>
		</div>
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
					<small style="color:grey;" class="form-text">S'ha d'escriure com apareix al cartell (sense apòstrof, si s'escau)</small>
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
				  		<img src="images/icono/testigo.jpg" style="border-radius:50px;max-width: 100%;">
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
				  		<img src="images/icono/testigo.jpg" style="border-radius:50px;max-width: 100%;">
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
				  		<img src="images/icono/testigo.jpg" style="border-radius:50px;max-width: 100%;">
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
				<center><span onclick="mostrar('sospechosos',1);"><i style="color:white;font-size:30px;margin:10px;" class="fas fa-user-ninja"></i></span></center>
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
	  var totalDeTiendas = 6;
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
			tiendaUsuario = tiendaUsuario.replace(/["'‘]/g, "");
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
			$("#prueba13").hide();
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
				var nuevoGrupo = 5;
				nuevoGrupo =Math.floor(Math.random() * (9 - 7)) + 7;
				$.ajax({
					// la URL para la petición
					url : 'crearJuegoNuevo.php',

					// la información a enviar
					// (también es posible utilizar una cadena de datos)
					data : { grupo : nuevoGrupo },

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
			$("#destino0").append("<h4><i class='fas fa-map-marker-alt'></i> Partint del Centre civic,</h4>");
			if(partida[0][0]["id_clave"]==21){			//En caso de que la tienda tenga como referencia el punto de partida
				$("#destino0").append("<h4>Com arribar al primer destí:</h4> <p><i class='fas fa-map-marker-alt'></i> " + partida[0][0]["fromClave"] + "</p>");
			}else{										//En el caso de que la tienda no tenga como referencia el punto de partida, lo llevará al monumento más cercano a la tienda y de ahí a la propia tienda.
				$("#destino0").append("<h4>Com arribar al primer destí:</h4> <p><i class='fas fa-map-marker-alt'></i> " + deClaveAClave(21,partida[0][0]["id_clave"]) + "</p>");
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
		
		function comprobarPrueba1(){
			if($("#textoPrueba1").val().trim()==obtenerResultado(partida[0][tiendaActualNumero-1].id_prueba)){
				$("#resultadoPrueba1").html(datosLadronActual(false));
				$("#prueba1Estado0").hide();
				$("#prueba1Estado1").show();
			}else{
				$("#textoErrorPrueba1").html("Error, codigo incorrecto");
			}
		}
		function guardarPruebaDiario(){
			$("#siguientePruebaModal").modal("show");
		}
		function guardarPruebaDiarioSiguiente(){
			$("#siguientePruebaModal").modal("hide");
			historialSiguiente(datosLadronActual(true));
		}
		function comprobarPrueba2(){
			$("#respuestaWhatsappQueEnvian").html($("#resultadoPrueba2").val());
			resultadoPrueba2Texto = $("#resultadoPrueba2").val();
			resultadoPrueba2Texto = resultadoPrueba2Texto.toUpperCase();
			resultadoPrueba2Texto = resultadoPrueba2Texto.split(" ");
			//resultadoPrueba2Texto = resultadoPrueba2Texto.trim();
			var controlPrueba2=false;
			for(var i=0;i<resultadoPrueba2Texto.length;i++){
				if(resultadoPrueba2Texto[i]=="BLAU" || resultadoPrueba2Texto[i]=="AZUL"){
					controlPrueba2=true;
				}
			}
			if(controlPrueba2){
				$("#respuestaPrueba2").html(datosLadronActual(false));
				$("#respuestaPrueba2_2").show();
				$("#escrbiendo").html("Escribiendo...");
				setTimeout(function(){ mostrarPrueba2Whatsapp() }, 5000);
				$("#resultadoPrueba2").val("");
				$("#resultadoPrueba2").prop( "disabled", true );
			}else{
				errorYoNoHariaEso('Si poses això creurà que no ets tu. Has de posar només la resposta correcta.', 'resultadoPrueba2');
			}
		}
		function mostrarPrueba2Whatsapp(){
			$("#escrbiendo").html("En linea");
			$("#respuestaPrueba2_1").show();
			
		}
		function errorYoNoHariaEso(texto, idInput) {
			$('#yoNoHariaEso').modal('show');
			$('#textoYoNoHariaEso').html(texto);
			$("#"+idInput).val("");
		}
		// Prueba 3
		function comprobarPrueba3(){
				var resultado = document.getElementById('textoPrueba3').value;
				if (resultado == 16) {
					$("#prueba3Estado0").hide();
					$("#prueba3Estado1").show();
				}else{
					errorYoNoHariaEso('Error, codigo incorrecto', 'textoErrorPrueba3');
				}
			}
		function comprobarPrueba3Estado1() {
			var resultado = document.getElementById('textoPrueba3Estado1').value;
			resultado = resultado.toUpperCase();
			resultado = resultado.trim();
			if (resultado == 'PESCADOR') {
				$("#prueba3Estado0").hide();
				$("#prueba3Estado1").hide();
				$("#prueba3Estado2").show();
				$("#resultadoPrueba3").html(datosLadronActual(false));
			} else {
				errorYoNoHariaEso('Error, codigo incorrecto', 'textoErrorPrueba3');
			}
		}
		// Prueba 4
		var totalTime = 30;
		var totalTimeExtra = 0;
		function modalPrueba4(verdadero) {
			if (verdadero) {
				totalTime=30;
				totalTimeExtra=0;
				$("#prueba4Estado1").hide();
				$("#prueba4Estado2").show();
				$("#resultadoPrueba4").html(datosLadronActual(false));
			} else {
				totalTime = 30 + totalTimeExtra;
				$("#textoErrorPrueba4Estado1").html("Hauràs d'esperar");
				$("#textoErrorPrueba4Estado12").html("segons per equivocar-te (cada cop seran més)");
				errorYoNoHariaEso("Hauràs d'esperar "+totalTime+" segons per equivocar-te (cada cop seran més)");
				$("#prueba4Estado1").hide();

				comprobarPrueba4Estado1Erroneo();
			}
		}
		function comprobarPrueba4Estado1Erroneo() {
			if(totalTime==0){
				totalTimeExtra = totalTimeExtra + 10;
				$("#prueba4Estado1").show();
				$("#textoErrorPrueba4Estado1").html("");
				$("#textoErrorPrueba4Estado12").html("");
				$("#countdown").html("");
			} else {
				totalTime--;
				$("#countdown").html(totalTime);
				setTimeout(function(){ comprobarPrueba4Estado1Erroneo(); }, 1000);
			}	
		}
		//Prueba 5
		
		function comenzarBarraProgreso(numero){
			$("#prueba5Parte1").hide();
			$("#prueba5Parte2").show();
			if(numero<50){
				if(numero==10){
					$("#mensajesHackeoCamaras").html('<i class="fas fa-signal"></i> Preparant connexió a servidor remot');
				}else if(numero==20){
					$("#mensajesHackeoCamaras").html('<i class="fas fa-wifi"></i> Intercanviant dades amb el host');
				}else if(numero==30){
					$("#mensajesHackeoCamaras").html('<i class="fas fa-signal"></i> Activant el chip 5G per controlar a la població');
				}
				else if(numero==40){
					$("#mensajesHackeoCamaras").html('<i class="fas fa-wifi"></i> Deshabilitant la gravació de les SmartTV');
				}
				$("#barraProgresoPrueba5").css("width",numero+"%");
				$("#barraProgresoPrueba5").html(numero+"%");
				numero++;
				setTimeout(function(){ comenzarBarraProgreso(numero); }, 500);
			}else if(numero==50){
				$("#prueba5Parte2Error").show();
				$("#prueba5Parte2Barra").hide();
			}else if(numero<100){
				$("#barraProgresoPrueba5").css("width",numero+"%");
				$("#barraProgresoPrueba5").html(numero+"%");
				numero++;
				setTimeout(function(){ comenzarBarraProgreso(numero); }, 500);
				if(numero==60){
					$("#mensajesHackeoCamaras").html('<i class="fas fa-signal"></i> Esborrant rastre remot');
				}else if(numero==70){
					$("#mensajesHackeoCamaras").html('<i class="fas fa-wifi"></i> Hackejant el sistema informàtic');
				}else if(numero==80){
					$("#mensajesHackeoCamaras").html('<i class="fas fa-signal"></i>  Capturant paquets https');
				}
				else if(numero==90){
					$("#mensajesHackeoCamaras").html('<i class="fas fa-wifi"></i> Desxifrant codi secret de les càmeres');
				}
			}else{
				$("#prueba5Parte3").show();
				$("#prueba5Parte2Barra").hide();
			}
			
		}
		
		function comprobarCodigoPrueba5(){
			prueba5Param = $("#textoPrueba5Codigo").val();
			prueba5Param = prueba5Param.toUpperCase();
			prueba5Param = prueba5Param.trim();
			if(prueba5Param=="130Y"){
				$("#prueba5Parte2Barra").show();
				$("#prueba5Parte2Error").hide();
				comenzarBarraProgreso(51);
			}else{
				$("#codigoIncorrectoPrueba5").show();
				$("#textoPrueba5Codigo").val("");
			}
		}
		var contadorPrueba5 = 0;
		function prueba5siguiente(){
			$("#imagen0Prueba5").hide();
			$("#imagen1Prueba5").hide();
			$("#imagen2Prueba5").hide();
			$("#imagen3Prueba5").hide();
			contadorPrueba5++;
			if(contadorPrueba5>3){
				contadorPrueba5=0;
				$("#imagen0Prueba5").show();
			}else{
				$("#imagen"+contadorPrueba5+"Prueba5").show();
				
			}
		}
		
		function prueba5atras(){
			$("#imagen0Prueba5").hide();
			$("#imagen1Prueba5").hide();
			$("#imagen2Prueba5").hide();
			$("#imagen3Prueba5").hide();
			contadorPrueba5--;
			if(contadorPrueba5<0){
				contadorPrueba5=3;
				$("#imagen3Prueba5").show();
			}else{
				$("#imagen"+contadorPrueba5+"Prueba5").show();
				
			}
		}
		
		function prueba5ClicImagen(e){
			widthImagenPrueba5 = document.getElementById("imagen2Prueba5").clientWidth;
			widthImagenPrueba5min = widthImagenPrueba5 - (widthImagenPrueba5/4) - (widthImagenPrueba5/4);
			widthImagenPrueba5max = widthImagenPrueba5;
			heightImagenPrueba5 = document.getElementById("imagen2Prueba5").clientHeight;
			heightImagenPrueba5min = 0;
			if(e.offsetX == undefined){ // para firefox
				x = e.pageX - $(this).offset().left;
				y = e.pageY - $(this).offset().top;
			}
			else{ // chrome
				x = e.offsetX;
				y = e.offsetY;
			}
			if(x>widthImagenPrueba5min && x<widthImagenPrueba5max){
				if(heightImagenPrueba5min<x){
					$("#prueba5Parte3").hide();
					$("#resultadoPrueba5").show();
					$("#resultadoPrueba5Final").html(datosLadronActual(false));
				}
				
			}
		}
		
		//Prueba 6
		
		function huellaDactilarComprobar(param){
			if (param) {
				totalTime=30;
				totalTimeExtra=0;
				$("#prueba6Parte2").show();
				$("#prueba6Parte1").hide();
			}else{
				totalTime = 30 + totalTimeExtra;
				$("#errorHuellaDactilar").show();
				$("#huellasDactilares").hide();
				comprobarPrueba6Estado1Erroneo();
			}
		}
		function comprobarPrueba6Estado1Erroneo() {
			if(totalTime==0){
				totalTimeExtra = totalTimeExtra + 10;
				$("#huellasDactilares").show();
				$("#errorHuellaDactilar").hide();
			} else {
				totalTime--;
				$("#huellaCuentaAtras").html(totalTime);
				setTimeout(function(){ comprobarPrueba6Estado1Erroneo(); }, 1000);
			}	
		}
		function comprobarCodigoPrueba6(){
			prueba6Param = $("#textoPrueba6Codigo").val();
			prueba6Param = prueba6Param.toUpperCase();
			prueba6Param = prueba6Param.trim();
			if(prueba6Param=="1359"){
				$("#resultadoPrueba6").show();
				$("#prueba6Parte2").hide();
				$("#resultadoPrueba6Final").html(datosLadronActual(false));
			}else{
				$("#codigoIncorrectoPrueba6").show();
				$("#textoPrueba6Codigo").val("");
			}
		}
		
		//Prueba 7
		
		function aplicarFiltro(color){
			if(color=="red"){
				$("#imagenFiltroColores").attr("src","images/pruebas/prueba7/texto2.jpg");
			}else{
				$("#imagenFiltroColores").attr("src","images/pruebas/prueba7/texto.jpg");
			}
			$("#aplicarFiltroAqui").css("width",document.getElementById("imagenFiltroColores").width);
			$("#aplicarFiltroAqui").css("height",document.getElementById("imagenFiltroColores").height);
			$("#aplicarFiltroAqui").css("background-color",color);
		}
		
		function comprobarResultadoPrueba7(){
			prueba7Param = $("#resultadoPrueba7").val();
			prueba7Param = prueba7Param.toUpperCase();
			prueba7Param = prueba7Param.trim();
			if(prueba7Param=="MEDITERRANI"){
				$("#prueba7Parte2").show();
				$("#prueba7Parte1").hide();
				$("#resultadoPrueba7Final").html(datosLadronActual(false));
			}else{
				$("#resultadoIncorrectoPrueba7").show();
				$("#resultadoPrueba7").val("");
			}
		}
		
		//Prueba 8
		
		function mostrarFotoPrueba8(foto){
			$("#"+foto).toggle(300);
		}
		
		function comprobarPrefijoPrueba8(){
			prueba8Param = $("#prefijoPrueba8").val();
			prueba8Param = prueba8Param.toUpperCase();
			prueba8Param = prueba8Param.trim();
			if(prueba8Param=="69"){
				$("#resultadoPrueba8").show();
				$("#prueba8Parte1").hide();
				$("#resultadoPrueba8Final").html(datosLadronActual(false));
			}else{
				$("#codigoIncorrectoPrueba8").show();
				$("#prefijoPrueba8").val("");
			}
		}
		
		//PRUEBA 10
		
		function comprobarPrueba10(param){
			if(param){
				$("#prueba10Parte1").hide();
				$("#prueba10Parte2").show();
				barraPrueba10(0);
			}else{
				$("#codigoIncorrectoPrueba10").show();
			}
		}
		
		function barraPrueba10(numero){
			if(numero>100){
				$("#prueba10Parte2Barra").hide();
				$("#prueba10Parte2Codigo").show();
			}else{
				$("#barraProgresoPrueba10").css("width",numero+"%");
				$("#barraProgresoPrueba10").html(numero+"%");
				numero++;
				setTimeout(function(){ barraPrueba10(numero); }, 100);
			}
		}
		function comprobarCodigoPrueba10(){
			prueba10Param = $("#codigoPrueba10").val();
			prueba10Param = prueba10Param.toUpperCase();
			prueba10Param = prueba10Param.trim();
			if(prueba10Param=="2509"){
				$("#prueba10Parte3").show();
				$("#prueba10Parte2").hide();
				$("#resultadoPrueba10Final").html(datosLadronActual(false));
			}else{
				$("#codigoIncorrectoPrueba10Parte2").show();
				$("#codigoPrueba10").val("");
			}	
			
		}
		
		var contadorPrueba10 = 0;
		function prueba10siguiente(){
			contadorPrueba10++;
			if(contadorPrueba10>4){
				contadorPrueba10=0;
			}
			$("#prueba10Imagen").attr("src","images/pruebas/prueba10/platja/"+contadorPrueba10+".jpg");
		}
		
		function prueba10atras(){
			contadorPrueba10--;
			if(contadorPrueba10<0){
				contadorPrueba10=4;
			}
			$("#prueba10Imagen").attr("src","images/pruebas/prueba10/platja/"+contadorPrueba10+".jpg");
		}
		
		
		//prueba 11
		
		function tachar(elemento){
			if($(elemento).children('span').is(":visible")){
				$(elemento).children('span').hide();
			}else{
				$(elemento).children('span').show();
			}
		}
		
		function comprobarCodigoPrueba11(){
			prueba11Param = $("#codigoPrueba11").val();
			prueba11Param = prueba11Param.toUpperCase();
			prueba11Param = prueba11Param.trim();
			if(prueba11Param=="3"){
				$("#prueba11Parte2").show();
				$("#prueba11Parte1").hide();
				$("#resultadoPrueba11inal").html(datosLadronActual(false));
			}else{
				$("#codigoIncorrectoPrueba11").show();
				$("#codigoPrueba11").val("");
			}
		}
		
		//PRUEBA 12
		
		function comprobarCodigoPrueba12(){
			prueba12Param = $("#codigoPrueba12").val();
			prueba12Param = prueba12Param.trim();
			if(prueba12Param=="4213"){
				$("#prueba12Parte2").show();
				$("#prueba12Parte1").hide();
				$("#resultadoPrueba12Final").html(datosLadronActual(false));
			}else{
				$("#codigoIncorrectoPrueba12").show();
				$("#codigoPrueba12").val("");
			}
		}
		
		//PRUEBA 13
		
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
				console.log(esconderNumero[i]);
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
		
		function comprobarCodigoPrueba13(){
			prueba13Param = $("#codigoPrueba13").val();
			prueba13Param = prueba13Param.trim();
			if(prueba13Param=="96"){
				$("#prueba13Estado2").show();
				$("#prueba13Estado1").hide();
				$("#resultadoPrueba13Final").html(datosLadronActual(false));
			}else{
				$("#codigoIncorrectoPrueba13").show();
				$("#codigoPrueba13").val("");
			}
		}
		
		
		
		function pintarHistorial(){
			$("#historial").html("<center><h3 style='color:white;'>Informació obtinguda</h3></center><br>");
			if(localStorage.getItem('historial')){
				historial = JSON.parse(localStorage.getItem('historial'));
				for(var i=0;i<historial["tiendas"].length;i++){
					$("#historial").append('<center><div class="row"><div class="col-12">'+"<div class='tituloTienda'>"+ historial["tiendas"][i].tienda+"</div>"+'</div></div></center>');
					$("#historial").append('<center><div class="row"><div class="col-12"><p>La informació que tenim de aquest establiment és:</p><p>'+"<h4 style='color:white;'>"+ historial["tiendas"][i].valor+"</h4>"+'</div></div><center>');
				}
			}else{
				$("#historial").append('<center><div class="row"><div class="col-12"><h4 style="color:white;">Encara no tens cap informació troba el culpable preguntant pel poble</h4></div></div></center>');
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