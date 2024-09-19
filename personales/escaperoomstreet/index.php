<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <script src="js/jquery.js"></script>
    <title>Escape Street Calafell</title>
  </head>
  <body onLoad="cargarNombreEquipo();" style="background-color:#15649d;">
    <!--Aqui esta el video -->
	<div class="row">
      <div class="col-md-12">
		<center><img style="max-width:60%;border-radius:5px;margin-top:10px;" src="images/icono/estrellaLogo.png"></center>
	  </div>
	 </div>
    <center><div class="row">
      <div class="col-md-12">
          <video id="video" controls autoplay muted>
              <source src="video/suscribete.mp4" type="video/mp4">
          </video>
      </div>
    </div></center><br>
	<center>
	<?php if(isset($_GET["joc"])){
		  echo '<a href="final'.$_GET["joc"].'"><button type="button" class="btn btn-light"><b>SALTAR VIDEO</b></button></a>';
	  }else{
		  echo '<a href="https://calafellacasa.com/escaperoom/"><button type="button" class="btn btn-light"><b>SALTAR VIDEO</b></button></a>';
	  }
	 ?>
	
	</center>
	<div class="row">
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
        <script>
          document.getElementById("video").onended = function(){
			  <?php if(isset($_GET["joc"])){
				  echo "location.href = 'final".$_GET['joc']."';";
			  }else{
				  echo 'location.href = "https://calafellacasa.com/escaperoom/";';
			  }
			 ?>
          };
		  function cargarNombreEquipo(){
			<?php
				if(isset($_GET["nombreEquipo"])){
					$nombreEquipo = $_GET["nombreEquipo"];
					echo "localStorage.setItem('nombreEquipo', '$nombreEquipo');";
				}
			?>
				if(localStorage.getItem('nombreEquipo')){
					if(localStorage.getItem('partida')){
						partida = localStorage.getItem('partida');
						partida = JSON.parse(partida);
						if(partida[0][0]["grupo"]!=<?php echo $_GET['joc'];?>){
							nombreEquipo = localStorage.getItem('nombreEquipo');
							localStorage.clear();
							localStorage.setItem('nombreEquipo',nombreEquipo);
						}
						<?php
						echo "location.href = 'final".$_GET['joc']."';";
						?>
					}
				}else{
					location.href="https://calafellacasa.com/escaperoom/";
				}
			}
    </script>
  </body>
</html>
