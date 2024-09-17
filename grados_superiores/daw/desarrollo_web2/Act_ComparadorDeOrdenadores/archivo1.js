//Esta funcion guarda las cookies del usuario
function setCookie(cname, cvalue, exdays) {
  var d = new Date(); //La variable es de tipo fecha
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
//Esta funcion devuelve el valor de las cookies
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
//Esta funcion comprueba si los cookies estan definidos
function checkCookie() {
  var username = getCookie("username");
  if (username != "") {
    alert("Bienvenido de nuevo " + username); //si la cookie se encuentra se muestra
  } else {
    username = prompt("Introduce tu nombre:", "");
    if (username != "" && username != null) {
      setCookie("username", username, 365); //si la cookie no esta guardada preguntara por el nombre de usuario
      //y se guardara la cookie del usuario 365 llamando a la funcion setCookie();
    }
  }
}
//Esta funcion elimina las cookies
function borrarCookie() {
  return document.cookie = "username=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";

}

function actualizar() {
  location.reload();
}

function dataSave() {
  var storeds = {};
  $('.stored').each(function () {
    storeds[this.id] = this.value;
  })
  localStorage.setItem('fieldString', JSON.stringify(storeds));

  console.log(localStorage.getItem('fieldString')); // Output: {"field-01":"on","field-02":"1234"}
  console.log(JSON.parse(localStorage.getItem('fieldString'))); //Output: Object {field-01: "on", field-02: "1234"}
}

function guardarStorage() {
  /*Creamos el objeto ordenador*/
  var ordenador = new Object();
  /*Captura de datos escrito en los inputs*/
  ordenador.marca = document.getElementById("marca").value;
  ordenador.modelo = document.getElementById("modelo").value;
  ordenador.cpu = document.getElementById("cpu").value;
  ordenador.ram = document.getElementById("ram").value;
  ordenador.discoMarca = document.getElementById("discoMarca").value;
  ordenador.discoCapacidad = document.getElementById("discoCapacidad").value;
  ordenador.pantalla = document.getElementById("pantalla").value;
  /*Pasa todo el objeto a string*/
  var myJSON = JSON.stringify(ordenador);
  console.log(localStorage.length);

  localStorage.setItem("ordenador" + (localStorage.length + 1),
  myJSON); // lo primero es como lo llamamos y el segundo es el valor, ponemos el length+1 para
  //que cada vez que se guarde le sume uno al objeto ordenador.
}

function crearTabla() {

  var patata = document.createElement("tbody");

  for (var i = 1; i <= localStorage.length; i++) {
    ordenadorObj = JSON.parse(localStorage.getItem("ordenador" + i)); //convierte en objeto los strings
      console.log(ordenadorObj); fila = document.createElement("tr");

      td1 = document.createElement("td"); //creamos el elemento
      texto = document.createTextNode(ordenadorObj.marca); //almacenamos el valor
      td1.appendChild(texto); //sirve para almacenar dentro de los tags

      td2 = document.createElement("td"); texto = document.createTextNode(ordenadorObj.modelo); td2
      .appendChild(texto);

      td3 = document.createElement("td"); texto = document.createTextNode(ordenadorObj.cpu); td3
      .appendChild(texto);

      td4 = document.createElement("td"); texto = document.createTextNode(ordenadorObj.ram); td4
      .appendChild(texto);

      td5 = document.createElement("td"); texto = document.createTextNode(ordenadorObj.discoMarca); td5
      .appendChild(texto);

      td6 = document.createElement("td"); texto = document.createTextNode(ordenadorObj.discoCapacidad); td6
      .appendChild(texto);

      td7 = document.createElement("td"); texto = document.createTextNode(ordenadorObj.pantalla); td7
      .appendChild(texto);

      fila.appendChild(td1); fila.appendChild(td2); fila.appendChild(td3); fila.appendChild(td4); fila
      .appendChild(td5); fila.appendChild(td6); fila.appendChild(td7);

      patata.appendChild(fila);
    }
    document.getElementById("tablaAutomatica").appendChild(
    patata); //pillamos el id que es la tabla automatica y gurdamos fila
  }



  function borrarStorage() {
    localStorage.clear();
  }

  function guardarForm() {
    var inputMarca = document.getElementById("marca"); /*Captura de datos escrito en los inputs*/
    localStorage.setItem("marca", inputMarca.value); /*Guardando los datos en el LocalStorage*/
    document.getElementById("marca").value = ""; //Esto limpia los campos

    var inputModelo = document.getElementById("modelo"); /*Captura de datos escrito en los inputs*/
    localStorage.setItem("modelo", inputModelo.value); /*Guardando los datos en el LocalStorage*/
    document.getElementById("modelo").value = ""; //Esto limpia los campos

    var inputCpu = document.getElementById("cpu"); /*Captura de datos escrito en los inputs*/
    localStorage.setItem("cpu", inputCpu.value); /*Guardando los datos en el LocalStorage*/
    document.getElementById("cpu").value = ""; //Esto limpia los campos

    var inputRam = document.getElementById("ram"); /*Captura de datos escrito en los inputs*/
    localStorage.setItem("ram", inputRam.value); /*Guardando los datos en el LocalStorage*/
    document.getElementById("ram").value = ""; //Esto limpia los campos

    var inputDiscoMarca = document.getElementById("discoMarca"); /*Captura de datos escrito en los inputs*/
    localStorage.setItem("discoMarca", inputDiscoMarca.value); /*Guardando los datos en el LocalStorage*/
    document.getElementById("discoMarca").value = ""; //Esto limpia los campos

    var inputDiscoCapacidad = document.getElementById(
    "discoCapacidad"); /*Captura de datos escrito en los inputs*/
    localStorage.setItem("discoCapacidad", inputDiscoCapacidad.value); /*Guardando los datos en el LocalStorage*/
    document.getElementById("discoCapacidad").value = ""; //Esto limpia los campos

    var inputPantalla = document.getElementById("pantalla"); /*Captura de datos escrito en los inputs*/
    localStorage.setItem("pantalla", inputRam.value); /*Guardando los datos en el LocalStorage*/
    document.getElementById("pantalla").value = ""; //Esto limpia los campos


  }

  function mostrarStorage() {
    //Obtenemos los datos almacenados
    var marca = localStorage.getItem("marca");
    var model = localStorage.getItem("modelo");
    var cpu = localStorage.getItem("cpu");
    var ram = localStorage.getItem("ram");
    var tipus_disc = localStorage.getItem("discoMarca");
    var capacitat_disc = localStorage.getItem("discoCapacidad");
    var pantalla = localStorage.getItem("pantalla");
    //Mostrar datos
    document.getElementById("marca").innerHTML = marca;
  }

  function borrarLocal(){
    localStorage.clear();
  }
