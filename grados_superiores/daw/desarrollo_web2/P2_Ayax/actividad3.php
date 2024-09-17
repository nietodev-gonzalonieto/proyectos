<?php
  sleep(3);
  $texto = "Sus datos han sido enviados sr/a ".$_POST['nombre'].",te llamaremos al numero: ".$_POST['telefono']." por la ".$_POST['horario'];

  $variable = new StdClass;
  $variable->message = $texto;
  $variable->nombre = $_POST['nombre'];
  $variable->apellidos = $_POST['apellidos'];
  $variable->telefono = $_POST['telefono'];
  $variable->dni = $_POST['dni'];
  $variable->horario = $_POST['horario'];

  echo json_encode($variable);

?>
