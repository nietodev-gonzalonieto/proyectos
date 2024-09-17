//Array juegos: Nombre , Creador , Tipus joc, Stock , Preu , Vendidos
  var juegos = [
          ["Assassins Creed Valhalla", "Ubisoft", "Rol", 150, 80.0 ,0],
          ["Spider-Man: Miles Morales", "Marvel", "Accion", 0, 75.0,0],
          ["Demon's Souls", "Sony", "Rol", 80, 60.0 ,0]
        ];

var grafica;

//Esta funcion nos dice si es vendedor o comprador
  function esVendedor(){
     return document.getElementById("vendedor").checked;
  }

  function esOrdenadoNombre(){
     return document.getElementById("ordenadoNombre").checked;
  }
//Esta funcion muestra los juegos
  function mostrarJuegos(){
    var listaJuegos = document.getElementById("listaJuegos");
    var elemento;
    var index = 1;
    var posicion=0;
    //Limpiamos la lista al refrescar
      listaJuegos.innerHTML= "";
    if (esOrdenadoNombre()) {
      juegos = juegos.sort(compararNombre);
    }else {
      juegos = juegos.sort(compararStock);
    }
    for (var juego of juegos){ //se recorre la array de juegos
      if (esVendedor() || juego[3]>0) { //si tiene stock lo muestra
        elemento = document.createElement('li');
        elemento.className="juego";

        if(esVendedor()){
          elemento.appendChild(document.createTextNode('El producte nº ' + index +  ' es ' + juego[0] + ', tenim ' + juego[3] +  ' unitats i s\'han venut ' + juego[5] + ' còpies.'));
        }else{
          elemento.appendChild(document.createTextNode('El producte nº ' + index +  ' es ' + juego[0] + ', val ' + juego[4] + ' € i tenim ' + juego[3] +  ' unitats'));
        }
        elemento.setAttribute("id",posicion);
        listaJuegos.appendChild(elemento);
        index++;
      }
      posicion++;
    }
    var elementos = document.getElementsByClassName("juego");
    for (const elemento of elementos){
      elemento.onclick = function(){
        abrirVentana(elemento.getAttribute("id"));
      }
    }
  }

  function insertarJuego(){
    var nombre =   document.getElementById("nombre").value.trim();
    var creador =  document.getElementById("creador").value.trim();
    var tipo =     document.getElementById("tipo").value.trim();
    var stock =    document.getElementById("stock").value;
    var precio =   document.getElementById("precio").value;

    if(nombre!="" && creador!="" && tipo!="" && stock!="" && precio!="" ){ //Si todo esta insertado añadimos el juego
      juegos.push([nombre,creador,tipo,stock,precio,0]);
      mostrarJuegos();
    }
  }

  function incrementarStock(){
    var numero =    document.getElementById("numero").value;
    var incremento =   document.getElementById("incremento").value;
    if(numero!="" && incremento!=""){
      juegos[numero-1][3]+= parseInt(incremento);
      mostrarJuegos();
    }
  }

  function descatalogarJuego(){
    var numeroBorrar =    document.getElementById("numeroBorrar").value;
    if(numeroBorrar!=""){
      juegos.splice(numeroBorrar-1,1);
      mostrarJuegos();
    }
  }

  function comprarJuego(){
    var numeroComprar =    document.getElementById("numeroComprar").value;
    var index;
    if(numeroComprar!=""){
      //en el for contamos los elementos con stock para obtener el index real
      for(index=0;numeroComprar>0;index++){
        if (juegos[index][3]>0) {
          numeroComprar--;
        }
      }
      juegos[index-1][3]--;//reducimos el stock en 1
      juegos[index-1][5]++;//aumentamos los vendidos en 1

      mostrarJuegos();
    }
  }

  function compararNombre(a, b) {
    return (a[0] >= b[0]) ? 1 : -1;
  }
  function compararStock(a, b) {
    return (a[3] <= b[3]) ? 1 : -1;
  }

  function refrescar(){
    mostrarJuegos();
    mostrarConsolas();
    if(esVendedor()){//es vendedor
    //Juegos
      document.getElementById("insertarJuego").hidden = false;//si eres vendedor te sale para insertar
      document.getElementById("incrementarStock").hidden = false;//si eres vendedor te sale para incrementar
      document.getElementById("descatalogarJuego").hidden = false;//si eres vendedor te sale para descatalogar
      document.getElementById("comprarJuego").hidden = true;//si eres vendedor N0 te sale para comprar
    //Consolas
      document.getElementById("insertarConsola").hidden = false;//si eres vendedor te sale para insertar consola
      document.getElementById("incrementarStockConsola").hidden = false;//si eres vendedor te sale para incrementar
      document.getElementById("descatalogarConsola").hidden = false;//si eres vendedor te sale para descatalogar
      document.getElementById("comprarConsola").hidden = true;//si eres vendedor N0 te sale para comprar
      document.getElementById("grafica").hidden = false;//si eres venddedor te sale la grafica de stock
    }else {//es comprador
  //Juegos
      document.getElementById("insertarJuego").hidden = true;//si eres comprador NO te sale insertar juego
      document.getElementById("incrementarStock").hidden = true;//si eres comprador NO te sale para incrementar
      document.getElementById("descatalogarJuego").hidden = true;//si eres comprador NO te sale para descatalogar
      document.getElementById("comprarJuego").hidden = false;//si eres comprador te sale para comprar
  //Consolas
      document.getElementById("insertarConsola").hidden = true;//si eres vendedor N0 te sale para insertar consola
      document.getElementById("incrementarStockConsola").hidden = true;//si eres comprador NO te sale para incrementar
      document.getElementById("descatalogarConsola").hidden = true;//si eres comprador NO te sale para descatalogar
      document.getElementById("comprarConsola").hidden = false;//si eres comprador te sale para comprar
      document.getElementById("grafica").hidden = true;//si eres comprador NO te sale la grafica de stock
    }
  }

  function abrirVentana(id){
   var ventana = window.open("","Detalles", "width=450,height=150");
   ventana.document.write("<head><title>Detalles</title></head><body><table style='border:1px solid black;'><tr><th>Nombre</th><th>Creador</th><th>Genero</th><th>Stock</th><th>Precio</th></tr><tr><td>"+juegos[id][0]+"</td><td>"+juegos[id][1]+"</td><td>"+juegos[id][2]+"</td><td>"+juegos[id][3]+"</td><td>"+juegos[id][4]+"</td></tr></table></body>");
  }
  function abrirVentanaConsola(id){
   var ventana = window.open("","Detalles", "width=450,height=150");
   ventana.document.write("<head><title>Detalles</title></head><body><table style='border:1px solid black;'><tr><th>Nombre</th><th>GPU</th><th>CPU</th><th>RAM</th><th>SSD</th><th>Stock</th><th>Precio</th></tr><tr><td>"+consolas[id].nombreConsola+"</td><td>"+consolas[id].gpu+"</td><td>"+consolas[id].cpu+"</td><td>"+consolas[id].ram+"</td><td>"+consolas[id].ssd+"</td><td>"+consolas[id].stockConsola+"</td><td>"+consolas[id].precioConsola+"</td></tr></table></body>");
  }


//CONSOLAS**********************************+*

  var consolas = [];

  //Esta funcion muestra los juegos
    function mostrarConsolas(){
      var listaConsolas = document.getElementById("listaConsolas");
      var elemento;
      var index = 1;
      var posicion=0;
      //Limpiamos la lista al refrescar
        listaConsolas.innerHTML= "";
      if (esOrdenadoNombreConsola()) {
        consolas = consolas.sort(compararNombreConsolas);
      }else {
        consolas = consolas.sort(compararStockConsolas);
      }
      for (var consola of consolas){ //se recorre la array de juegos
        if (esVendedor() || consola.stockConsola>0) { //si tiene stock lo muestra
          elemento = document.createElement('li');
          elemento.className="consola";
          if(esVendedor()){
            elemento.appendChild(document.createTextNode(consola.descripcio()+" i hem venut un total de: "+consola.consolasVendidas));
          }else{
            elemento.appendChild(document.createTextNode(consola.descripcio()));
          }
          elemento.setAttribute("id",posicion);
          listaConsolas.appendChild(elemento);
          index++;
        }
        posicion++;
      }
      var elementos = document.getElementsByClassName("consola");
      for (const elemento of elementos){
        elemento.onclick = function(){
          abrirVentanaConsola(elemento.getAttribute("id"));
        }
      }
    }
    function insertarConsola(){
      var nombreConsola =   document.getElementById("nombreConsola").value.trim();
      var gpu =  document.getElementById("gpu").value;
      var cpu =     document.getElementById("cpu").value;
      var ram =   document.getElementById("ram").value;
      var ssd =  document.getElementById("ssd").value;
      var stockConsola =     document.getElementById("stockConsola").value;
      var precioConsola =    document.getElementById("precioConsola").value;
      var color = document.getElementById("color").value;

      if(nombreConsola!="" && gpu!="" && cpu!="" && ram!="" && ssd!="" && stockConsola!="" && precioConsola!="" && color!=""){ //Si todo esta insertado añadimos la consola
        consolas.push(new Consola(nombreConsola, gpu, cpu, ram, ssd, stockConsola, precioConsola , color));
        mostrarConsolas();
        grafica.dibujar(consolas);
      }
    }

    function incrementarStockConsola(){
      var numeroConsola = document.getElementById("numeroConsola").value;
      var incrementoConsola = document.getElementById("incrementoConsola").value;

      if(numeroConsola!="" && incrementoConsola!=""){ //Si todo esta insertado incrementamos consola
        consolas[numeroConsola-1].stockConsola+=parseInt(incrementoConsola);
        mostrarConsolas();
        grafica.dibujar(consolas);
      }
    }

    function descatalogarConsola(){
      var numeroBorrarConsola =    document.getElementById("numeroBorrarConsola").value;
      if(numeroBorrarConsola!=""){
        consolas.splice(numeroBorrarConsola-1,1);
        mostrarConsolas();
        grafica.dibujar(consolas);
      }
    }

    function comprarConsola(){
      var numeroComprarConsola =    document.getElementById("numeroComprarConsola").value;
      var index;
      if(numeroComprarConsola!=""){
        //en el for contamos los elementos con stock para obtener el index real
        for(index=0;numeroComprarConsola>0;index++){
          if (consolas[index].stockConsola>0) {
            numeroComprarConsola--;
          }
        }
        consolas[index-1].stockConsola--;//reducimos el stock en 1
        consolas[index-1].consolasVendidas++;//aumentamos los vendidos en 1

        mostrarConsolas();
        grafica.dibujar(consolas);
      }
    }

    function esOrdenadoNombreConsola(){
       return document.getElementById("ordenadoNombreConsola").checked;
    }

    function compararNombreConsolas(a, b) {
      return (a.nombreConsola >= b.nombreConsola) ? 1 : -1;
    }
    function compararStockConsolas(a, b) {
      return (a.stockConsola <= b.stockConsola) ? 1 : -1;
    }

  window.onload = function(){
      document.getElementById("comprador").onclick = refrescar;
      document.getElementById("vendedor").onclick = refrescar;
    //Juegos
      document.getElementById("insertar").onclick = insertarJuego;
      document.getElementById("incrementar").onclick = incrementarStock;
      document.getElementById("descatalogar").onclick = descatalogarJuego;
      document.getElementById("comprar").onclick = comprarJuego;
    //Consolas
      document.getElementById("insertarConsolaBoton").onclick = insertarConsola;
      document.getElementById("incrementarConsola").onclick = incrementarStockConsola;
      document.getElementById("descatalogarConsolaBoton").onclick = descatalogarConsola;
      document.getElementById("comprarConsolaBoton").onclick = comprarConsola;

      document.getElementById("ordenadoNombre").onclick = refrescar ;
      document.getElementById("ordenadoStock").onclick = refrescar;
      document.getElementById("ordenadoNombreConsola").onclick = refrescar ;
      document.getElementById("ordenadoStockConsola").onclick = refrescar;
      grafica = new Grafica("Stock Consolas","canvas");
      grafica.dibujarTitulo();
      refrescar();
  };
