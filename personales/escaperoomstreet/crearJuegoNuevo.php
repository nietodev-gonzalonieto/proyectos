<?php
//Juego con 6 tiendas
include "connect.php";
if(isset($_POST["grupo"])){
	$grupo=$_POST["grupo"];
	$limite = 6;
	//$grupo = 2;

	$sqlLugar="Select * from lugar where grupo = $grupo order by rand() limit $limite";   //Obtengo todas las tiendas
	$resultado = mysqli_query($enlace,$sqlLugar);
	$listaPruebas = [];
	$listaClave = [];
	$sqlPruebas="Select * from pruebas where id in (";					//Obtengo todas las pruebas de cada tienda (VALORAR SI HACE FALTA FILTRAR DE ESTA MANERA, YA QUE PARECE QUE CADA TIENDA TIENE SU PROPIA PRUEBA!!!!)
	$sqlClave="Select * from clave where id in (";					//Obtengo los ID's de los sitios clave intermedios
	$sqlRutasIni = "Select DISTINCT * from ruta where id_origen in(";
	$sqlRutasFin = "OR id_destino in(";
	$arrayLugar = [];
	$arrayPruebas = [];
	$arrayClave = [];
	$arrayRutas = [];
	$arrayLadron = [];
	while ($fila = $resultado->fetch_assoc()) {
		$lugar = new stdClass();
		$comprobarPrueba = true;
		$comprobarClave = true;
		for($i=0;$i<count($listaPruebas);$i++){
			if($fila["id_prueba"] == $listaPruebas[$i]){
				$comprobarPrueba = false;
			}
		}
		for($i=0;$i<count($listaClave);$i++){
			if($fila["id_clave"] == $listaClave[$i]){
				$comprobarClave = false;
			}
			//array_push($sqlRutas,"Select * from ruta where id_origen =".$fila["id_clave"]);
			//array_push($sqlRutas,"Select * from ruta where id_destino =".$fila["id_clave"]);
		}
		if($comprobarPrueba){
			array_push($listaPruebas,$fila["id_prueba"]);
			$sqlPruebas=$sqlPruebas.$fila["id_prueba"].",";
		}
		if($comprobarClave){
			array_push($listaClave,$fila["id_clave"]);
			$sqlClave=$sqlClave.$fila["id_clave"].",";
			$sqlRutasIni=$sqlRutasIni.$fila["id_clave"].",";
			$sqlRutasFin = $sqlRutasFin.$fila["id_clave"].",";
		}
		$lugar->id = $fila["id"];
		$lugar->nombre = $fila["nombre"];
		$lugar->direccion = $fila["direccion"];
		$lugar->longitud = $fila["longitud"];
		$lugar->latitud = $fila["latitud"];
		$lugar->grupo = $fila["grupo"];
		$lugar->id_prueba = $fila["id_prueba"];
		$lugar->id_clave = $fila["id_clave"];
		$lugar->goClave = $fila["goClave"];
		$lugar->fromClave = $fila["fromClave"];
		$lugar->foto = $fila["foto"];
		array_push($arrayLugar,$lugar);
	}
	$sqlPruebas = substr($sqlPruebas, 0, -1);
	$sqlPruebas = $sqlPruebas.")";
	$sqlClave = substr($sqlClave, 0, -1);
	$sqlClave = $sqlClave.")";
	$sqlRutasIni = substr($sqlRutasIni, 0, -1);
	$sqlRutasIni = $sqlRutasIni.") ";
	$sqlRutasFin = substr($sqlRutasFin, 0, -1);
	$sqlRutasFin = $sqlRutasFin.")";
	$sqlRutas=$sqlRutasIni.$sqlRutasFin;
	$resultado = mysqli_query($enlace,$sqlPruebas);
	while ($fila = $resultado->fetch_assoc()) {
		$pruebas = new stdClass();
		$pruebas->id = $fila["id"];
		$pruebas->tipo = $fila["tipo"];
		$pruebas->pista1 = $fila["pista1"];
		$pruebas->pista2 = $fila["pista2"];
		$pruebas->pista3 = $fila["pista3"];
		$pruebas->resultado	 = $fila["resultado"];
		array_push($arrayPruebas,$pruebas);
	}
	$resultado = mysqli_query($enlace,$sqlClave);
	while ($fila = $resultado->fetch_assoc()) {
		$clave = new stdClass();
		$clave->id = $fila["id"];
		$clave->nombre = $fila["nombre"];
		$clave->direccion = $fila["direccion"];
		$clave->foto = $fila["foto"];
		array_push($arrayClave,$clave);
	}
	$resultado = mysqli_query($enlace,$sqlRutas);
	while ($fila = $resultado->fetch_assoc()) {
		$ruta = new stdClass();
		$ruta->id = $fila["id"];
		$ruta->id_origen = $fila["id_origen"];
		$ruta->id_destino = $fila["id_destino"];
		$ruta->instrucciones = $fila["instrucciones"];
		array_push($arrayRutas,$ruta);
		
	}
	$arrayGlobal = [];
	$sqlLadron="Select * from sospechosos where numsospechoso<31 order by rand() LIMIT 1";
	$resultado = mysqli_query($enlace,$sqlLadron);
	$ladron = new stdClass();
	while ($fila = $resultado->fetch_assoc()) {
		$ladron = new stdClass();
		$ladron->pista0 = $fila["pista0"];
		$ladron->pista1 = $fila["pista1"];
		$ladron->pista2 = $fila["pista2"];
		$ladron->pista3 = $fila["pista3"];
		$ladron->pista4 = $fila["pista4"];
		$ladron->pista5 = $fila["pista5"];
		$ladron->numSospechoso = $fila["numsospechoso"];
		array_push($arrayLadron,$ladron);
	}
	array_push($arrayGlobal,$arrayLugar);
	array_push($arrayGlobal,$arrayPruebas);
	array_push($arrayGlobal,$arrayClave);
	array_push($arrayGlobal,$arrayRutas);
	array_push($arrayGlobal,$arrayLadron);
	$myJSON = json_encode($arrayGlobal);
	echo $myJSON;
}

?>