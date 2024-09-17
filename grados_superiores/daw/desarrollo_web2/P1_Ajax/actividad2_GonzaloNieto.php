<!DOCTYPE html>
<html>

<head>
  <title>Act2_GonzaloNieto</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript">
      function carregar() {
        if (window.XMLHttpRequest) {
          http_xml = new XMLHttpRequest();
        }
        else if (window.ActiveXObject) {
          http_xml = new ActiveXObject("Microsoft.XMLHTTP");
        }
        http_xml.onreadystatechange = mostrar;

        var ubicacio = 'http://localhost/holamundo/hola-mundo.txt';
        http_xml.open('GET', 'http://localhost/hola-mundo.txt', true);
        http_xml.send(null);
        function mostrar() {
          console.log(http_xml.readyState);
          switch (http_xml.readyState) {
            case 0:
              alert('No se ha se inicializado');
              break;
            case 1:
              alert('conexion establecida');
              break;
            case 2:
              alert('solicitud recibida.');
              break;
            case 3:
              alert('Procesando solicitud');
              break;
            case 4:
              alert('Operacio completada');
              break;
          }
          if (http_xml.readyState == 4) {
            console.log(http_xml.status);
            if (http_xml.status == 200) {
              alert(http_xml.responseText);
            }
          }
        }
      }
      window.onload = carregar;
    </script>
  </head>
  <body>
    <center><h1>Connexió al servidor</h1>
    <?php
    $DateAndTime = date('h:i:s a', time());
      echo "Hora actual $DateAndTime.";
      phpinfo();
    ?>
    <p id="estado">Completado :)</p></center>
  </body>
</html>
