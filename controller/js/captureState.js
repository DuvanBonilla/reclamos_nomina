$(document).on("click", ".update-state-button, .state-button", function () {
    var id_novedad = $(this).data("id");
    var estado = $(this).data("estado");
    if (estado === "pendiente") {
        estado = 1;
    } else if (estado === "proceso") {
        estado = 2;
    } else if (estado === "terminado") {
        estado = 3;
    }
    // console.log("Datos antes de la solicitud AJAX:");
    // console.log("id_novedad:", id_novedad);
    // console.log("estado:", estado);
    $.ajax({
        type: "POST",
        url: "../controller/ctr_updateState.php",
        data: {
            id_novedad: id_novedad,
            estado: estado
        },
        success: function (response) {
            console.log("Respuesta del servidor:", response);
            // Recargar la página después de completar la solicitud AJAX
            location.reload();
        },
        error: function (xhr, status, error) {
            console.error("Error en la solicitud AJAX:", error);
            // Manejar el error si es necesario
        }
    });
});
