$(document).on("click", ".update-estado-user, .estado-user", function () {
    var codigo = $(this).data("codigo");
    var estado = $(this).data("estado");


    $.ajax({
        type: "POST",
        url: "../controller/ctr_estadoUser.php",
        data: {
            codigo: codigo,
            estado: estado
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
