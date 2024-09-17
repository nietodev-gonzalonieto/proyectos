$("#boton").click(function () {
    $.ajax({
        type: "post",
        url: "actividad2.php",
        data: {
            n1: $("#numero1").val(),
            app: $("#opciones").val(),
            n2: $("#numero2").val(),
            res: $("#resultado").val()
        },
        beforeSend: function () {
            $("#resultado").val("cargando...");
        },
        success: function (resul) {
            $("#resultado").val(resul);
        }
    })
});
