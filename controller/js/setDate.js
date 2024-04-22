document.addEventListener("DOMContentLoaded", function () {
    // Obtener la fecha actual
    var fechaActual = new Date();

    // Formatear la fecha como "YYYY-MM-DD"
    var formattedDate = fechaActual.getFullYear() + "-"
        + ('0' + (fechaActual.getMonth() + 1)).slice(-2) + "-"
        + ('0' + fechaActual.getDate()).slice(-2);

    // Asignar la fecha al campo de entrada
    document.getElementById("fechaRegistro").value = formattedDate;
})
