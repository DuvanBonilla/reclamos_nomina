
$(document).on("click", ".update-approvedC-button, .approvedC-button", function () {
    var id_aprobacionC = $(this).attr("data-id_aprobacionC");
    var id_novedad = $(this).data("id");
    var estado = $(this).data("estado");
    if (estado === "pendiente") {
        estado = 1;
    } else if (estado === "proceso") {
        estado = 2;
    } else if (estado === "terminado") {
        estado = 3;
    }
    $.ajax({
        type: "POST",
        url: "../controller/ctr_approvedCostos.php",
        data: {
            id_aprobacionC: id_aprobacionC,
            id_novedad: id_novedad,
            estado: estado,
        },
        success: function (response) {
            // Recargar la página después de completar la solicitud AJAX
            location.reload();

        },
        error: function (xhr, status, error) {
            console.error("Error en la solicitud AJAX:", error);
            // Manejar el error si es necesario
        }
    });
});
