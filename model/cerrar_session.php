<?php
session_start();
// Destruir la sesión
session_destroy();
// Establecer el tiempo de expiración de la cookie de sesión en el pasado
setcookie(session_name(), '', time() - 600, '/');
// Redirigir o mostrar un mensaje al usuario
// Ejemplo de redirección a una página de inicio
header('Location: ../view/login.php');
exit();
