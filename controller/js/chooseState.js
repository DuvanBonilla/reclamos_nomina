function showConfirmation(estadoActual) {
    var nuevoEstado = "";
    var popupId = "statePopup";

    document.getElementById(popupId).style.display = "flex";

    window.selectState = function (state) {
        nuevoEstado = state;
        alert("Estado cambiado a: " + nuevoEstado);
        document.getElementById(popupId).style.display = "none";
    };

    document.getElementById(popupId).addEventListener("click", function (event) {
        if (event.target === this) {
            this.style.display = "none";
        }
    });
}
