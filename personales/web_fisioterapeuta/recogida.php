  <?php
    include "connect.php";

      //Voy a recopilar los datos del formulario
        $parrafo1 = $_REQUEST['parrafo1'];
        $parrafo2 = $_REQUEST['parrafo2'];
        $parrafo3 = $_REQUEST['parrafo3'];
        $parrafo4 = $_REQUEST['parrafo4'];
        $parrafo5 = $_REQUEST['parrafo5'];
        $imagenPrincipal = $_FILES['imagenPrincipal']['name'];
        $imagen2 = $_FILES['imagen2']['name'];
        $imagen3 = $_FILES['imagen3']['name'];
        $imagen4 = $_FILES['imagen4']['name'];
        $imagen5 = $_FILES['imagen5']['name'];
        $tituloParrafo1 = $_REQUEST['tituloParrafo1'];
        $tituloParrafo2 = $_REQUEST['tituloParrafo2'];
        $tituloParrafo3 = $_REQUEST['tituloParrafo3'];
        $tituloParrafo4 = $_REQUEST['tituloParrafo4'];
        $tituloParrafo5 = $_REQUEST['tituloParrafo5'];

        $mensajeLargo = $_REQUEST['mensajeLargo'];
        $mensajeCorto = $_REQUEST['mensajeCorto'];

        $enviar = $_REQUEST['enviar'];
        $error = false;

        $sql = "INSERT INTO  articulos (parrafo1, parrafo2, parrafo3, parrafo4, parrafo5,imagenPrincipal, imagen2, imagen3, imagen4, imagen5, tituloParrafo1, tituloParrafo2, tituloParrafo3, tituloParrafo4, tituloParrafo5) VALUES " .
                       "('$parrafo1', '$parrafo2', '$parrafo3','$parrafo4', '$parrafo5',
                       '$imagenPrincipal', '$imagen2', '$imagen3', '$imagen4', '$imagen5', '$tituloParrafo1', '$tituloParrafo2',
                       '$tituloParrafo3', '$tituloParrafo4', '$tituloParrafo5')";
        mysqli_query($enlace,$sql);

        $fecha = date('Y-m-d');
        $id=mysqli_insert_id($enlace);

        

              //Subir Fotos
              for ($i=1; $i < 5; $i++) {
                $nombreImagen = "";
                if($i == 1){
                  $nombreImagen = 'imagenPrincipal';
                }else{
                  $nombreImagen = 'imagen'.$i;
                }
                if(isset($nombreImagen)){
                  if (is_uploaded_file ($_FILES[$nombreImagen]['tmp_name'])){

                     $directorioRuta = "images/blog/";
                     $nombreFichero = $_FILES[$nombreImagen]['name'];
                     $copiarFichero = true;
                     $nombreCompleto = $directorioRuta . $nombreFichero;
                     move_uploaded_file($_FILES[$nombreImagen]['tmp_name'],$nombreCompleto);

                     if (is_file($nombreCompleto)){
                       echo "he enrtado";
                        $idUnico = time();
                        $nombreFichero = $idUnico . "-" . $nombreFichero;
                     }
                  } else if ($_FILES[$nombreImagen]['error'] == UPLOAD_ERR_FORM_SIZE){ //Esto pasará si el fichero es demasiado grande
                     $maxsize = $_REQUEST['MAX_FILE_SIZE'];
                     $errores[$nombreImagen] = "Demasiado grande el archivo , $maxsize bytes";
                     $error = true;
                  } else if ($_FILES[$nombreImagen]['name'] == ""){
                     $nombreFichero = '';
                   }else{                                                //Esto pasará cuando el fichero no se pueda subir
                     $errores[$nombreImagen] = "No se puede subir el fichero";
                     $error = true;
                  }
               }
             }
        $sql = "INSERT INTO  escapastic (descripcion_larga, descripcion, id_articulo, url, imagen, titulo, fecha) VALUES " .
                               "('$mensajeLargo', '$mensajeCorto', '$id','https://www.fisioterapiavendrell.com/articulos?num=$id', '$imagenPrincipal', '$tituloParrafo1', '$fecha')";
                mysqli_query($enlace,$sql);
        header('Location: https://www.fisioterapiavendrell.com/articulos?num='.$id);
  ?>
