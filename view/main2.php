<?php
session_start();
if (!isset($_SESSION['rol'])) {
    header('location: ../view/login.php');
    exit;
}
if ($_SESSION['rol'] != 2) {
    // Si no existe o su valor no es igual a 1, redirige al usuario a la página de inicio de sesión
    header('location: ../view/main.php');
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
                    <p>A fully responsive site template designed by <a href="https://html5up.net">HTML5 UP</a> and released<br />
                        for free under the <a href="https://html5up.net/license">Creative Commons</a> </p>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="#contact">Añadir novedad</a></li>
                    <li><a href="#work">Consultar</a></li>
                    <!-- <li><a href="#about">About</a></li> -->
                    <li><a href="#">otra cosa</a></li>
                    <!-- <li><a href="#elements">Elements</a></li> -->
                </ul>
            </nav>
        </header>

        <!-- Main -->
        <div id="main">
            <!-- Work -->
            <article id="work">
                <h2 class="major">Work</h2>
                <!-- <span class="image main"><img src="images/pic02.jpg" alt="" /></span> -->
                <p>Adipiscing magna sed dolor elit. Praesent eleifend dignissim arcu, at eleifend sapien imperdiet ac. Aliquam erat volutpat. Praesent urna nisi, fringila lorem et vehicula lacinia quam. Integer sollicitudin mauris nec lorem luctus ultrices.</p>
                <p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna. Maecenas laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus amet feugiat tempus.</p>
            </article>

            <!-- Contact -->
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
                                <option value="saldo faltante">Kenier</option>
                                <option value="Saldo sobrante">Pasos</option>
                                <option value="Saldo sobrante">Yessy</option>
                                <option value="Saldo sobrante">Yeison</option>
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
                                <option value="colonia">Cfs</option>
                                <option value="colonia">Banafruit</option>
                                <option value="colonia">Conserva</option>
                                <option value="colonia">Fyffes</option>
                                <option value="colonia">Smitco</option>
                                <option value="colonia">Spsm</option>
                                <option value="colonia">Simbacol</option>
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
    <script src="../controller/js/browser.min.js"></script>
    <script src="../controller/js/breakpoints.min.js"></script>
    <script src="../controller/js/util.js"></script>
    <script src="../controller/js/main.js"></script>
</body>

</html>