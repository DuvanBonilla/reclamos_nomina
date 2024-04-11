
$(document).on("click", ".update-approvedC-button, .approvedC-button", function () {
    var id_aprobacionC = $(this).attr("data-id_aprobacionC");
    var id_novedad = $(this).data("id");

    // console.log("Datos antes de la solicitud AJAX:");
    // console.log("id_aprobacionC:", id_aprobacionC);
    // console.log("id:", id_novedad);
    $.ajax({
        type: "POST",
        url: "../controller/ctr_approvedCostos.php",
        data: {
            id_aprobacionC: id_aprobacionC,
            id_novedad: id_novedad,
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
