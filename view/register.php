<?php
session_start();
if (!isset($_SESSION['rol'])) {
    // Si no existe , redirige al usuario a la página de inicio de sesión
    header('location: ../view/login.php');
    exit;
}
if ($_SESSION['rol'] != 1) {
    // Si no existe o su valor no es igual a 1, redirige al usuario a la página de inicio de sesión
    header('location: ../view/main2.php');
    exit;

    var_dump($_SESSION['rol']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="images/logo.ico.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="css/register.css" />
    <title>Login</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in">
            <form class="form" action="../controller/ctr_register.php" method="POST">
                <h1 class="textRegistro">Registro de usuarios</h1>
                <div class="social-icons">
                    <img class="logoRegis" src="images/logo.ico.ico" alt="">
                </div>
                <input type="text" id="codigo" name="codigo" placeholder="codigo" style="text-align: center;" />
                <label for="rol">Rol</label>
                <select id="rol" name="rol" name="rol">
                    <option value="1">admistrador</option>
                    <option value="2">coordinador</option>
                    <option value="3">costos</option>
                    <option value="4">nomina</option>
                </select>
                <label for="zona">Zona</label>
                <select id="zona" name="zona">
                    <option value="1">uniban</option>
                    <option value="2">zungo</option>
                    <option value="3">muelle</option>
                    <option value="4">santa marta</option>
                    <option value="5">colonia</option>
                </select>
                <button type="submit" class="enviar" name="enviar" id="enviar">Registrar usuario</button>

            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-right">
                    <h1 class="h1Welcome">Bienvenido!</h1>
                    <p class="pWelcome">
                        ¡Regístrate como nuevo usuario y únete a nosotros! Tu participación es esencial para nuestro crecimiento.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>