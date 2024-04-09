<?php
session_start();
if (!isset($_SESSION['rol'])) {
    // Si no existe, redirige al usuario a la página de inicio de sesión
    header('location: ../view/login.php');
    exit;
}
if ($_SESSION['rol'] != 1 && $_SESSION['rol'] != 3 && $_SESSION['rol'] != 4) {
    // Si no existe o su valor no es igual a 1, 2, 3 o 4, redirige al usuario a la página main2.php
    header('location: ../view/main2.php');
    exit;
}

?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Registro de novedades</title>
    <meta charset="utf-8" />
    <link rel="icon" href="images/logo.ico.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" integrity="..." crossorigin="anonymous">

    <link rel="stylesheet" href="css/main.css" />
    <noscript>
        <link rel="stylesheet" href="css/noscript.css" />
    </noscript>
</head>

<body class="is-preload">

    <nav>
        <a class="exit-link" href="../model/cerrar_session.php">
            <i class="fa fa-right-from-bracket fa-beat " style="color: #ff0000"></i>
        </a>
    </nav>

    <!-- Wrapper -->
    <div id="wrapper">
        <!-- Header -->
        <header id="header">

            <div class="logo">
                <img class="logo" src="images/logo-redondo.ico" alt="">
            </div>
            <div class="content">
                <div class="inner">
                    <h1>Registro de novedades</h1>
                    <p>Desde esta plataforma, los coordinadores pueden reportar las novedades presentadas.<br /> ¡Gracias por tu contribución para mejorar nuestros servicios!</a>
                </div>
            </div>
            <nav>
                <ul>

                    <li><a href="#contact">Añadir novedad</a></li>
                    <li><a href="allNovedades.php">Consultar novedad</a></li>
                    <!-- <li><a href="#work">Consultar novedad</a></li> -->
                    <!-- <li><a href="#about">About</a></li> -->
                    <li><a href="register.php">Registrar usuario</a></li>
                </ul>
            </nav>
        </header>

        <!-- Main -->
        <div id="main">

            <!-- registrar novedad -->
            <article id="contact">
                <h2 class="major">Contact</h2>
                <form method="POST" action="../controller/ctr_aggNovedad.php">
                    <div class="fields">

                        <div class="field half">
                            <label name="fechaRegistro" for="fechaRegistro">Fecha registro</label>
                            <input type="date" name="fechaRegistro" id="fechaRegistro" style="color: black;" required />
                        </div>
                        <div class="field half">
                            <label name="fechaNovedad" for="Fecha novedad">Fecha novedad</label>
                            <input type="date" name="fechaNovedad" id="fechaNovedad" style="color: black;" required />
                        </div>
                        <div class="field half">
                            <label for="idServicio">Id servicio</label>
                            <input type="text" name="idServicio" id="idServicio" required />
                        </div>
                        <div class="field">
                            <label for="coordinador">Coordinador</label>
                            <select id="coordinador" name="coordinador" required>
                                <option value="Kenier">Kenier</option>
                                <option value="Pasos">Pasos</option>
                                <option value="Yessy">Yessy</option>
                                <option value="Yeison">Yeison</option>
                            </select>
                        </div>
                        <!-- </div>
                        <div class="field half">
                            <label for="coordinador">Coordinador</label>
                            <input type="text" name="coordinador" id="coordinador" required />
                        </div> -->
                        <div class="field">
                            <label for="novedad">Novedad</label>
                            <select id="novedad" name="novedad" required>
                                <option value="saldo faltante">Saldo faltante</option>
                                <option value="Saldo sobrante">Saldo sobrante</option>
                            </select>
                        </div>
                        <div class="field half">
                            <label for="trabajador">Trabajador</label>
                            <input type="text" name="trabajador" id="trabajador" required />
                        </div>
                        <div class="field ">
                            <label for="cliente">Cliente</label>
                            <select id="cliente" name="cliente">
                                <option value="uniban">Uniban</option>
                                <option value="zungo">Banacol</option>
                                <option value="Cfs">Cfs</option>
                                <option value="Banafruit">Banafruit</option>
                                <option value="Conserva">Conserva</option>
                                <option value="Fyffes">Fyffes</option>
                                <option value="Smitco">Smitco</option>
                                <option value="Spsm">Spsm</option>
                                <option value="Simbacol">Simbacol</option>
                            </select>
                        </div>
                        <div class="field ">
                            <label for="descripcion">Descripcion</label>
                            <textarea name="descripcion" id="descripcion" rows="4" required></textarea>
                        </div>

                    </div>
                    <button class="primary" type="submit" class="enviar" name="enviar" id="enviar">Registrar novedad</button>
                </form>

            </article>

        </div>
        <!-- Footer -->
        <footer id="footer">
            <p class="copyright"><a href=""></a></p>
        </footer>
    </div>
    <!-- Background -->
    <div id="bg"></div>
    <!-- Scripts -->
    <script src="../controller/js/jquery.min.js"></script>
    <script src="../controller/js/searchNovedad.js"></script>

    <script src="../controller/js/browser.min.js"></script>
    <script src="../controller/js/breakpoints.min.js"></script>
    <script src="../controller/js/util.js"></script>
    <script src="../controller/js/main.js"></script>
</body>

</html>