<?php
	if(!isset($_GET["fallas"])){
		header("Location: https://calafellacasa.com/escaperoom/");
	}else{
		if($_GET["fallas"]!="fail"){
			header("Location: https://calafellacasa.com/escaperoom/");
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
  <body onLoad="borrar();">
	<div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="instruccionesTitulo">HAS FALLAT!</h1>
        <p class="parrafo">
			El sospitós que has triat no era correcte...
			<br>Finalment el lladre era:<br> </p>
			<center><img id="imagenSospechoso" src="" style="max-width:100%;border-radius:2px;"><br></center>
			 <p class="parrafo">
			Pots tornar a provar un altre cop, hi haurà un nou lladre i qui sap si una nova ruta a investigar.
       </p>
        <div class="boton">
          <center><a href="https://escaperoomstreet.com/final" class="rainbow-button" alt="Tornar a Jugar"></a></center>
		</div>
      </div>
    </div>
    </div>
	<script src="js/jquery.js"></script>
	<script>
		function borrar(){
			if(localStorage.getItem('partida')){
				partida = localStorage.getItem('partida');
				partida = JSON.parse(partida);
				$("#imagenSospechoso").attr("src","images/sospechosos/adultos/"+partida[4][0]["numSospechoso"]+".jpg");
			}else{
				location.href="reiniciarJuego";
			}
			nombreEquipo = localStorage.getItem('nombreEquipo');
			localStorage.clear();
			localStorage.setItem('nombreEquipo',nombreEquipo);
		}
	</script>
  </body>
</html>
