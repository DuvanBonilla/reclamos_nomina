$(document).on("click", ".update-user-button, .user-button", function () {
    var codigo = $(this).data("codigo");

    $.ajax({
        type: "POST",
        url: "../view/updateUsers.php",
        data: {
            codigo: codigo,
        },
        success: function (response) {

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
