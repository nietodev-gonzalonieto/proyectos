<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Escape Street Calafell</title>
  </head>
  <body onLoad="reiniciarJuego();" style="background-color:#15649d;;">
	<center>
		<div class="row">
			<div class="col-md-12">
				<center><img style="max-width:60%;border-radius:5px;margin-top:10px;" src="images/icono/estrellaLogo.png"></center>
			</div>
			<div class="col-12" style="margin-bottom:15px;margin-top:15px;">
				<a href="/?joc=0"><button style="width:60%;color:#15649d;font-weight:bold;" type="button" class="btn btn-warning">CALAFELL PLATJA</button></a>
			</div>
			<div class="col-12" style="margin-bottom:15px;margin-top:15px;">
				<a href="/?joc=1"><button style="width:60%;color:#15649d;font-weight:bold;" type="button" class="btn btn-warning">SEGUR DE CALAFELL</button></a>
			</div>
			<div class="col-12" style="margin-bottom:15px;margin-top:15px;">
				<a href="/?joc=2"><button style="width:60%;color:#15649d;font-weight:bold;" type="button" class="btn btn-warning">CALAFELL POBLE</button></a>
			</div>
			<div class="col-12" style="margin-bottom:15px;margin-top:15px;">
				<a href="/?joc=3"><button style="min-width:60%;color:#15649d;font-weight:bold;" type="button" class="btn btn-warning">CALAFELL PLATJA INFANTIL</button></a>
			</div>
			<div class="col-12" style="margin-bottom:15px;margin-top:15px;">
				<a href="/?joc=4"><button style="min-width:60%;color:#15649d;font-weight:bold;" type="button" class="btn btn-warning">SEGUR DE CALAFELL INFANTIL</button></a>
			</div>
			<div class="col-1" style="margin-bottom:15px;margin-top:15px;">
			</div>
			<div class="col-4" style="margin-bottom:15px;margin-top:15px;">
				<img src="images/pub/escapastic1.png" style="max-width:100%;">
			</div>
			<div class="col-2" style="margin-bottom:15px;margin-top:15px;">
			</div>
			<div class="col-4" style="margin-bottom:15px;margin-top:15px;">
				<img src="images/pub/logocalafell.png" style="max-width:100%;">
			</div>
		</div>
	</center>
        <script>
		  function reiniciarJuego(){
				if(localStorage.getItem('nombreEquipo')){
					nombreEquipo = localStorage.getItem('nombreEquipo');
					localStorage.clear();
					localStorage.setItem('nombreEquipo',nombreEquipo);
				}else{
					location.href="videoFinal";
				}
		  }
    </script>
  </body>
</html>
