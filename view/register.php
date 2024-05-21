<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: ../view/login.php');
    exit;
}
if ($_SESSION['rol'] != 1 && $_SESSION['rol'] != 3 && $_SESSION['rol'] != 4) {
    header('location: ../view/main2.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="images/logo-redondo.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="css/register.css" />
    <title>Registro usuarios</title>
</head>

<body>
    <nav>
        <a class="exit-link" href="../view/main.php">
            <i class="fa fa-right-from-bracket fa-beat " style="color: #ff0000"></i>
        </a>
    </nav>
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
                    <option value="2">Coordinador</option>
                    <option value="4">Nomina</option>
                    <option value="3">Costos</option>
                    <option value="1">Administrador</option>
                </select>
                <label for="zona">Zona</label>
                <select id="zona" name="zona">
                    <option value="1">Administracion</option>
                    <option value="2">Costos</option>
                    <option value="3">Nomina</option>
                    <option value="4">Santa Marta</option>
                    <option value="5">Banacol Zungo</option>
                    <option value="6">Colonia</option>
                    <option value="7">Uniban Zungo</option>
                    <option value="8">Operaciones Marinas</option>
                    <option value="9">Uniban M3</option>
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