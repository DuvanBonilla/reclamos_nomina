$(document).ready(function () {
    // Asegúrate de que solo se asocie una vez
    $(document).off("click", ".edit-novedad-button, .novedad-button").on("click", ".edit-novedad-button, .novedad-button", function () {
        var id_novedad = $(this).data("id");
        var novedad = $(this).data("tipo_novedad");
        var trabajador_name = $(this).data("trabajador");
        var descripcion = $(this).data("descripcion");
        var id_servicio = $(this).data("id_servicio");
        var id_zona_especifica = $(this).data("id_zona_especifica");

        if (id_novedad) {
            $.ajax({
                type: "POST",
                url: 'http://localhost/reclamos_nomina/view/editNovedad.php',
                data: {
                    id: id_novedad,
                    novedad: novedad,
                    trabajador: trabajador_name,
                    descripcion: descripcion,
                    id_servicio: id_servicio,
                    id_zona_especifica: id_zona_especifica,
                },
                success: function (response) {

                    // Mostrar el modal
                    var modal = document.getElementById("myModal");
                    modal.style.display = "block";

                    // Colocar el contenido recibido en el modal
                    document.getElementById("modalContent").innerHTML = response;

                    // Cerrar el modal cuando se hace clic fuera de él
                    window.onclick = function (event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    };

                    // Cerrar el modal cuando se hace clic en el botón de cerrar (X)
                    var closeButton = document.getElementsByClassName("close")[0];
                    if (closeButton) {
                        closeButton.onclick = function () {
                            modal.style.display = "none";
                        };
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error en la solicitud AJAX:", error);
                }
            });
        } else {
            console.error("No se encontró el id_novedad.");
        }
    });
});
