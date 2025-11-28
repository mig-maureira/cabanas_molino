$(document).ready(function () {
    console.log("DOM cargado con exito");

    $("#toggle-color").click(function () {

        // Obtener el color actual del primer li
        let colorActual = $("#mi-lista li").first().css("color");

        // Cambiar color según el valor actual
        if (colorActual === "rgb(0, 0, 0)") { // negro
            $("#mi-lista li").css("color", "red");
        } else {
            $("#mi-lista li").css("color", "black");
        }

        // Agregar o eliminar elemento dinámico
        if ($(".paraborrar").length === 0) {
            $("#mi-lista").append("<li class='list-group-item paraborrar'>Elemento 4</li>");
        } else {
            $(".paraborrar").remove();
        }

    });

    $("#toggle-btn").click(function () {

        // Si la lista está visible
        if ($("#mi-lista").is(":visible")) {
            $("#mi-lista").hide();                 // Oculta la lista
            $(this).text("Mostrar lista");        // Cambia texto del botón
        } else {
            $("#mi-lista").show();                // Muestra la lista
            $(this).text("Ocultar lista");        // Cambia texto del botón
        }
    });
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navText: ["<", ">"],// ←
        items: 1,


    });

})