<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['estado'] == 2) {
    header('location: ../view/login.php');
    exit;
}
if ($_SESSION['rol'] == 1 && $_SESSION['rol'] == 3 && $_SESSION['rol'] == 4) {
    header('location: ../view/main2.php');
    exit;
}
$zonas = array(
    1 => "Uniban Zungo",
    2 => "Uniban M3",
    3 => "Uniban Colonia",
    4 => "Banacol Zungo",
    5 => "Banacol Colonia",
    6 => "Operaciones Marinas",
    7 => "Santa Marta",
    8 => "Zona Aduanera",
    9 => "Administracion",
);
$zona = $zonas[$_SESSION['zona']];

$roles = array(
    1 => "Administrador",
    2 => "Coordinador",
    3 => "Costos",
    4 => "Nomina",
);
$rol = $roles[$_SESSION['rol']];
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>Registro de novedades</title>
    <meta charset="utf-8" />
    <link rel="icon" href="images/logo-redondo.ico" type="image/x-icon" />
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
                <img class="logo" src="images/logo-blanco.png" alt="">
            </div>
            <div class="content">
                <div class="inner">
                    <!-- <h1>Registro de novedades</h1 -->
                    <h1 style=>Bienvenido <span style="color: #abcd43;"><?php echo $rol; ?></span> </br> de la zona <span style="color: #abcd43;"><?php echo $zona; ?></span></h1>
                    <p> <strong> En esta plataforma, los coordinadores pueden reportar las novedades presentadas.<br /> ¡Gracias por tu contribución para mejorar nuestros servicios! </strong></a>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="#contact">Añadir novedad</a></li>
                    <li><a href="allNovedades2.php">Consultar novedad</a></li>
                </ul>
            </nav>
        </header>

        <!-- Main -->
        <div id="main">
            <!-- Work -->
            <article id="work">
                <h2 class="major">Work</h2>
                <p>Adipiscing magna sed dolor elit. Praesent eleifend dignissim arcu, at eleifend sapien imperdiet ac. Aliquam erat volutpat. Praesent urna nisi, fringila lorem et vehicula lacinia quam. Integer sollicitudin mauris nec lorem luctus ultrices.</p>
                <p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna. Maecenas laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus amet feugiat tempus.</p>
            </article>

            <!-- Contact -->
            <article id="contact">
                <h2 class="major">Agregar Novedad</h2>
                <form id="miFormulario" method="POST" action="../controller/ctr_aggNovedad.php" enctype="multipart/form-data">
                    <div class="fields">
                        <div class="field half">
                            <!-- <label name="fechaRegistro" for="fechaRegistro">Fecha registro</label> -->
                            <input type="date" name="fechaRegistro" id="fechaRegistro" style="color: black;" required hidden />
                        </div>
                        <div class="field half">
                            <label name="fechaNovedad" for="fechaNovedad">Fecha novedad</label>
                            <input type="date" name="fechaNovedad" id="fechaNovedad" style="color: black;" required />
                        </div>

                        <div class="uploadArchive">
                            <label class="labelArchivo" for="archivo">Seleccione un Archivo</label>
                            <input type="file" class="form-control-file" name="archivo" id="archivo">
                        </div>

                        <div class="field half">
                            <label for="idServicio">Codigo servicio</label>
                            <input type="text" name="idServicio" id="idServicio" required />
                        </div>
                        <div class="field">
                            <label for="coordinador">Coordinador</label>
                            <select id="coordinador" name="coordinador" required>
                                <option value="ErasmoMadarriaga">Erasmo Madarriaga</option>
                                <option value="AntonioLopez">Antonio Lopez</option>
                                <option value="HectorMarinoMosquera">Hector Marino Mosquera</option>
                                <option value="LuisDarioHerrera">Luis Dario Herrera</option>
                                <option value="AndresSierra">Andres Sierra</option>
                                <option value="LuisBallesta">Luis Ballesta</option>
                                <option value="RosalinoRodriguez">Rosalino Rodriguez</option>
                                <option value="YordiJimenez">Yordi Jimenez</option>
                            </select>
                        </div>
                        <div class="field">
                            <label for="novedad">Novedad</label>
                            <select id="novedad" name="novedad" required>
                                <option value="saldo faltante">Saldo faltante</option>
                                <option value="Saldo sobrante">Saldo sobrante</option>
                            </select>
                        </div>
                        <div class="field half">
                            <label for="trabajador">Trabajador</label>
                            <input type="text" name="trabajador" id="trabajador" pattern="[A-Za-z ]+" title="Por favor ingresa solo letras y espacios" required />
                        </div>
                        <div class="field " required>
                            <label for="cliente">Cliente</label>
                            <select id="cliente" name="cliente">
                                <option value="uniban">Uniban</option>
                                <option value="zungo">Banacol</option>
                                <option value="cfs">Cfs</option>
                                <option value="banafruit">Banafrut</option>
                                <option value="conserva">Conserba</option>
                                <option value="fyffes">Fyffes</option>
                                <option value="smitco">Smitco</option>
                                <option value="spsm">Spsm</option>
                                <option value="simbacol">Simbacol</option>
                            </select>
                        </div>

                        <div class="field ">
                            <label for="descripcion">Descripcion</label>
                            <textarea name="descripcion" id="descripcion" rows="4" required></textarea>
                        </div>
                    </div>


                    <button class="primary" type="submit" class="enviar" name="enviar" id="enviar">Registrar novedad</button>
                    <button class="clearForm" type="button" onclick="limpiarCampos()">Limpiar Campos</button>
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
    <script src="../controller/js/setDate.js"></script>
    <script src="../controller/js/clear_form.js"></script>
    <script src="../controller/js/jquery.min.js"></script>
    <script src="../controller/js/browser.min.js"></script>
    <script src="../controller/js/breakpoints.min.js"></script>
    <script src="../controller/js/util.js"></script>
    <script src="../controller/js/main.js"></script>
</body>

</html>