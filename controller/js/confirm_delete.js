(function () {
    // Selecciona todos los botones con la clase 'update-delete-button'
    var buttons = document.querySelectorAll('.update-delete-button');

    // Itera sobre cada botón y agrega el evento 'click'
    buttons.forEach(function (button) {
        button.addEventListener('click', function (event) {
            // Mostrar el mensaje de confirmación
            if (!confirm('¿Realmente desea eliminar este elemento?')) {
                // Cancelar la acción por defecto del botón
                event.preventDefault();
                event.stopPropagation(); // Detener la propagación del evento
            } else {
                // Si el usuario confirma, permitir que el botón continúe con su acción por defecto
                // En este caso, no hacemos nada más ya que el botón probablemente redirija o ejecute una acción por defecto
            }
        });
    });
})();