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
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <link rel="icon" href="images/logo.ico.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Registro</title>
    <link rel="stylesheet" href="css/register.css" />
</head>

<body>
    <nav>
        <nav>
            <a class="exit-link" href="../view/main.php">
                <i class="fa fa-right-from-bracket fa-beat " style="color: #ff0000"></i>
            </a>
        </nav>
    </nav>
    <div class="login-box">
        <img src="images/logo2.png" class="avatar" alt="Avatar Image" />

        <!-- form -->
        <form class="form" action="../controller/ctr_register.php" method="POST">
            <label for="codigo">Codigo</label>
            <input type="text" id="codigo" name="codigo" placeholder="ingrese codigo" />
            <!-- <input type="text" id="rol" name="rol" placeholder="ingrese rol" /> -->
            <label for="rol">Rol</label>
            <select id="rol" name="rol" name="rol">
                <option value="1">admistrador</option>
                <option value="2">coordinador</option>
            </select>
            <!-- <input type="text" id="zona" name="zona" placeholder="ingrese zona" /> -->
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
        <!-- form -->
    </div>
</body>

</html>