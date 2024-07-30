
$(document).on("click", ".update-approvedN-button, .approvedN-button", function () {
    var id_aprobacionN = $(this).attr("data-id_aprobacionN");
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
    // console.log("id_aprobacionC:", id_aprobacionC);
    // console.log("id:", id_novedad);
    $.ajax({
        type: "POST",
        url: "../controller/ctr_approvedNomina.php",
        data: {
            id_aprobacionN: id_aprobacionN,
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
