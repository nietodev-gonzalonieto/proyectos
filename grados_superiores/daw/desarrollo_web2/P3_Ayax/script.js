var restoDeLocalidades = new Array();
var indice;

function obtenerProvincia(){
  return $("#provincia").val();
};

function obtenerLocalidad(){
   return $("#localidad").val();
};

function processarResposta(dades) {
 var imatges = dades.items;
 if (imatges.length==0) {
   $('#fotos').append("<p>No hay imagenes que mostrar para esta localidad</p>");
 }
 for (var i = 0; i < imatges.length; i++) {
    var img = $('<img>');
    img.attr('src', imatges[i].media.m);
    img.attr('title', imatges[i].title);
    img.attr('alt', imatges[i].title);
    $('#fotos').append(img);
    $('#fotos').append("<br>");
  }
};

function mostrarLocalidad(localidad){
  $("#fotos").append("<h2>"+localidad+"</h2>");
  if (localidad!="") {
      $.ajax({
        async: false,
        url: 'http://api.flickr.com/services/feeds/photos_public.gne',
        success: processarResposta,
        dataType: "jsonp",
        jsonp: "jsoncallback",
        data: {
          tags: localidad,
          format: 'json'
        }
       });
  }
}

function seleccionarLocalidad(){
  var localidad = obtenerLocalidad();
  $("#fotos").empty();
  mostrarLocalidad(localidad);
};

function cargarProvincias(){
  $.get("provinciasypoblaciones.xml", function(xml){
    $(xml).find("provincia").each(function (){
      var nombre = $(this).find("nombre").text();
      $("#provincia").append("<option value='"+nombre+"'>"+nombre+"</option>");
    })
  });
};

function cargarLocalidades(){
  var provincia=obtenerProvincia();
  $("#localidad").empty();
  $("#localidad").append("<option value='' selected>Elegir Localidad</option>");
  if (provincia!="") {
    $.get("provinciasypoblaciones.xml", function(xml){
      $(xml).find("provincia").each(function (){
        var nombre = $(this).find("nombre").text();
        if (nombre==obtenerProvincia()) {
          $(this).find("localidades").find("localidad").each(function (){
            var localidad = $(this).text();
            restoDeLocalidades.push(localidad);
            $("#localidad").append("<option value='"+localidad+"'>"+localidad+"</option>");
          })
        }
      })
    });
    restoDeLocalidades = restoDeLocalidades.sort((a, b) => 0.5 - Math.random());
    indice=0;
    $("#labelLocalidad").attr("hidden",false);
    $("#localidad").attr("hidden",false);
  }else{
    $("#labelLocalidad").attr("hidden",true);
    $("#localidad").attr("hidden",true);
    $("#fotos").empty();
  }
};

window.onload = function() {
  cargarProvincias();
  $("#provincia").change(function() {
  cargarLocalidades();
  });
  $("#localidad").change(function() {
  seleccionarLocalidad();
  });

  $(window).scroll(function(){
      var scrollHeight = $(document).height();
      var scrollPosition = $(window).height() + $(window).scrollTop();
      if (($(window).innerHeight() + $(window).scrollTop()) >= $(document).height()) {
        var localidad=restoDeLocalidades[indice];
        indice=(indice+1)%restoDeLocalidades.length;
        if(localidad != obtenerLocalidad()){
          mostrarLocalidad(localidad);
        }
      }
  });
};
