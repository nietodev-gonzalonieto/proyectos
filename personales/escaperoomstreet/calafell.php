<?php
	if(!isset($_GET["nombreEquipo"])){
		header('Location: http://escape.calafellacasa.com/');
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
  <body style="background-color:#15649d;" onLoad="cargarNombreEquipo();">
	<br><center><img style="max-width:100%;border-radius:5px;" src="images/icono/estrellaLogo.png"></center>
    <div style="width:100%;" class="row instrucciones">
      <div class="col-12">
        <h1 class="instruccionesTitulo">INTRODUCCIÓ</h1>
        <p class="parrafo">
          Si ets aquí, vol dir que ets un gran detectiu que vol ajudar-nos a resoldre aquests misteri.<br><br>

			Les eines que necessitaràs per resoldre’l són: aquest telèfon mòbil i el teu ingeni. Confiem amb tú!<br>
			El Nadal de Calafell està a les teves mans, i tenint en compte aquest 2020… no podem quedar-nos sense!<br><br>

			Així doncs, et fem un breu resum del succés: <br><br>

			Fa uns dies, vam rebre una comunicació d’un membre de l’Ajuntament de Calafell que va denunciar un robatori d’un dels objectes més importants del patrimoni. Un objecte valorat en més de 500.000 euros que pertany al poble des de fa segles. És un objecte que representa l’arribada del Nadal a Calafell i dóna als habitants la il·lusió de començar les festes. Aquest objecte es tracta ni més ni menys d’una clau. Sí, sí, un clau d’or del segle XVI que forma part de les relíquies més importants de l’Estat. Aquesta clau, estava exposada de manera ocasional al Museu Casa Barral, ja que té una vinculació molt gran amb la literatura el món pescador. Cada any, per Nadal els Reis Mags feie entrega a l’Ajuntament per donar la benvinguda a les festes i el nou any. El seu robatori s’ha mantingut en secret. 
        </p>
	</div>
	</div>
	<center><img style="max-width:100%;border-radius:5px;" src="images/icono/llave.jpg"></center>
	<div style="width:100%;" class="row instrucciones">
	<div class="col-12">
		<p class="parrafo">
			Vam contractar un detectiu privat, el Sr. Johnson,  perquè investigués el cas de la manera més subtil possible, per no crear rebombori entre els habitants. Ell va aconseguir algunes pistes sobre on podia estar i qui podia haver estat. Va extreure alguns possibles sospitosos per avançar amb el cas. Però de cop i volta va desaparèixer i no tenim cap rastre d’ell. 
			Ara, fem un reclam a totes aquelles persones que vulguin ajudar-nos a resoldre aquest enigma i poder recuperar el Nadal. Creus que ets capaç d’ajudar-nos?
        </p>
        <p class="parrafo">
			Oferim una recompensa important!
        </p>
		<h1 class="instruccionesTitulo">INSTRUCCIONS, COM JUGAR?</h1>
        <p class="parrafo">
			- Per resoldre el misteri d’Escape Street Calafell hauràs d’utilitzar un telèfon mòbil amb accés a Internet.  <br>
			- Hauràs de seguir les indicacions i dirigir-te on et guiin les pistes del Detectiu Johnson. <br>
			- Si tens dubtes i necessites ajuda, podràs prémer l’icona en forma de detectiu. Et proporcionarà les pistes necessàries per resoldre l’enigma. Però recorda que cada pisa resta punts… Jo de tú, rumiaria una mica més!<br>
			- Al botó de dalt a la dreta, podràs veure tot el recorregut i tota la informació extreta de la teva investigació, perquè extreguis les teves conclusions.  <br>
			- Si no tens temps de finalitzar el joc, pots guardar-lo i continuar en una altre moment. <br>
			- Podràs jugar en grup o en solitari. Recorda que cada joc és diferent!<br>
			- Vols ser un detectiu molt top? Afanya’t i resol el misteri abans que ningú, així apareixeràs al rànking dels millors!<br>
			<br><center><img style="max-width:100%;border-radius:5px;" src="images/icono/logoApp.png"></center>
        </p>		
		<div class="col-12">
			<!--<img class="instruccionfoto" src="images/post/fondo.jfif" alt="">-->
		</div>
        <div class="boton">
        <!-- <center><a href="videoFinal.php" class="rainbow-button" alt="Jugar"></a></center>-->
		</div>
      </div>
    </div>
	<script>
	function cargarNombreEquipo(){
	<?php
		if(isset($_GET["nombreEquipo"])){
			$nombreEquipo = $_GET["nombreEquipo"];
			echo "localStorage.setItem('nombreEquipo', '$nombreEquipo');";
		}else{
			echo "localStorage.setItem('nombreEquipo', 'ESCAPISTAS');";
		}
	?>
	}
	</script>
  </body>
</html>
