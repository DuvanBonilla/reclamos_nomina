$(document).on("click", ".update-novedadNumber-button, .novedadNumber-button", function () {
    var novedad = $(this).data("novedad");
    console.log("id:", novedad);

    $.ajax({
        type: "POST",
        url: "../model/popUp_novedades.php",
        data: {
            novedad: novedad,
        },
        success: function (response) {
            console.log("Respuesta del servidor:", response);

            // Mostrar el modal
            var modal = document.getElementById("myModal");
            modal.style.display = "block";

            // Colocar el contenido recibido en el modal
            document.getElementById("modalContent").innerHTML = response;

            // Cerrar el modal cuando se hace clic fuera de él
            window.onclick = function (event) {
                var modal = document.getElementById("myModal");
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            };

            // Cerrar el modal cuando se hace clic en el botón de cerrar (X)
            var closeButton = document.getElementsByClassName("close")[0];
            closeButton.onclick = function () {
                modal.style.display = "none";
            };
        },
        error: function (xhr, status, error) {
            console.error("Error en la solicitud AJAX:", error);
            // Manejar el error si es necesario
        }
    });
});
