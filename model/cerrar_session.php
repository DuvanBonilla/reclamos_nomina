<?php
session_start(); // Inicia la sesión

// Destruye todas las variables de sesión
session_unset();
session_destroy();

// Establece el tiempo de expiración de la cookie de sesión en el pasado
setcookie(session_name(), '', time() - 3600, '/');

// Redirige al usuario a la página de login
header('Location: ../view/login.php');
exit;
