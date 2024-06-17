<?php
session_start();
if (!isset($_SESSION['rol']) || $_SESSION['estado'] == 2) {
    header('location: ../view/login.php');
    exit;
}

$zonas = array(
    1 => "Administracion",
    2 => "Costos",
    3 => "Nomina",
    4 => "Santa Marta",
    5 => "Banacol Zungo",
    6 => "Colonia",
    7 => "Uniban Zungo",
    8 => "Operaciones Marinas",
    9 => "Uniban M3",
);

$area = $zonas[$_SESSION['zona']];

$roles = array(
    1 => "Administrador",
    2 => "Coordinador",
    3 => "Costos",
    4 => "Nomina",
);
$rol = $roles[$_SESSION['rol']];
$zona = $_SESSION['zona'];

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
                    <h1 style=>Bienvenido <span style="color: #abcd43;"><?php echo $rol; ?></span> </br> de la zona <span style="color: #abcd43;"><?php echo $area; ?></span></h1>
                    <p> <strong> En esta plataforma, los coordinadores pueden reportar las novedades presentadas.<br /> ¡Gracias por tu contribución para mejorar nuestros servicios! </strong></a>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="#contact">Añadir novedad</a></li>
                    <li><a href="allNovedades.php">Consultar novedad</a></li>
                    <li><a href="register.php">Registrar usuario</a></li>
                    <li><a href="users.php">Consultar usuarios</a></li>

                </ul>
            </nav>
        </header>

        <!-- Main -->
        <div id="main">

            <!-- registrar novedad -->
            <article id="contact">
                <h2 class="major">Agregar Novedad</h2>
                <form id="miFormulario" method="POST" action="../controller/ctr_aggNovedad.php" enctype="multipart/form-data">
                    <div class="fields">

                        <div class="field half">
                            <!-- <label name="fechaRegistro" for="fechaRegistro">Fecha registro</label> -->
                            <input type="date" name="fechaRegistro" id="fechaRegistro" style="color: black;" required hidden />
                        </div>

                        <div class="field half">
                            <label name="fechaNovedad" for="fechaNovedad"><strong>Fecha de novedad</strong> </label>
                            <input type="date" name="fechaNovedad" id="fechaNovedad" style="color: black;" required />
                        </div>

                        <div class="uploadArchive">
                            <label class="labelArchivo" for="archivo"><strong>Seleccione un Archivo</strong></label>
                            <input type="file" class="form-control-file" name="archivo" id="archivo">
                        </div>

                        <div class="field half">
                            <label for="idServicio"><strong>Codigo servicio</strong></label>
                            <input type="text" name="idServicio" id="idServicio" required />
                        </div>

                        <div class="field half">
                            <label for="semana"><strong>Semana</strong></label>
                            <input type="text" name="semana" id="semana" required />
                        </div>

                        <div class="field">
                            <label for="coordinador">
                                <strong>Coordinador</strong>
                            </label>
                            <select id="coordinador" name="coordinador" required>
                                <option value="ErasmoMadarriaga">Erasmo Madarriaga</option>
                                <option value="AntonioLopez">Antonio Lopez</option>
                                <option value="HectorMarinoMosquera">Hector Marino Mosquera</option>
                                <option value="LuisDarioHerrera">Luis Dario Herrera</option>
                                <option value="AndresSierra">Andres Sierra</option>
                                <option value="LuisBallesta">Luis Ballesta</option>
                                <option value="RosalinoRodriguez">Rosalino Rodriguez</option>
                                <option value="YordiJimenez">Yordi Jimenez</option>
                                <option value="CesarRamirez">Cesar Ramirez</option>

                            </select>
                        </div>


                        <div class="field">
                            <label for="ZonaEspecifica">
                                <strong>Zona Especifica</strong>
                            </label>
                            <select id="zonaEspecifica" name="zonaEspecifica" required>
                                <?php
                                $opcionesPorZona = [
                                    1 => ["Patio Smitco", "Patio Satelite", "SPSM buque", "Cuarto Frio", "Lavado De Contenedores", "Smitco csf", "Banacol Zungo", "Banacol N1", "Banacol N2", "Uniban Colonia", "Muelle 2", "Patio Contenedores", "Zona Aduanera", "Carton Uniban", "Operaciones Marinas", "Uniban M3"],
                                    2 => ["Patio Smitco", "Patio Satelite", "SPSM buque", "Cuarto Frio", "Lavado De Contenedores", "Smitco csf", "Banacol Zungo", "Banacol N1", "Banacol N2", "Uniban Colonia", "Muelle 2", "Patio Contenedores", "Zona Aduanera", "Carton Uniban", "Operaciones Marinas", "Uniban M3"],
                                    3 => ["Patio Smitco", "Patio Satelite", "SPSM buque", "Cuarto Frio", "Lavado De Contenedores", "Smitco csf", "Banacol Zungo", "Banacol N1", "Banacol N2", "Uniban Colonia", "Muelle 2", "Patio Contenedores", "Zona Aduanera", "Carton Uniban", "Operaciones Marinas", "Uniban M3"],
                                    4 => ["Patio Smitco", "Patio Satelite", "SPSM buque", "Cuarto Frio", "Lavado De Contenedores", "Smitco csf"],
                                    5 => ["Banacol Zungo"],
                                    6 => ["Banacol N1", "Banacol N2", "Uniban Colonia"],
                                    7 => ["Muelle 2", "Patio Contenedores", "Zona Aduanera", "Carton Uniban"],
                                    8 => ["Operaciones Marinas"],
                                    9 => ["Uniban M3"]
                                ];

                                if (isset($opcionesPorZona[$zona])) {
                                    $opciones = $opcionesPorZona[$zona];
                                    foreach ($opciones as $opcion) {
                                        echo '<option>' . $opcion . '</option>';
                                    }
                                } else {
                                    echo "No hay opciones para la zona " . $zona; // Debugging
                                }

                                ?>
                            </select>
                        </div>

                        <div class="field">
                            <label for="novedad"><strong>Novedad</strong></label>
                            <select id="novedad" name="novedad" required>
                                <option value="saldo faltante">Saldo faltante</option>
                                <option value="Saldo sobrante">Saldo sobrante</option>
                            </select>
                        </div>

                        <div class="field half">
                            <label for="trabajador"><strong>Trabajador</strong></label>
                            <input type="text" name="trabajador" id="trabajador" pattern="[0-9a-zA-ZñÑ\s]+" title="Por favor ingresa solo letras, números y espacios" required />
                        </div>

                        <div class="field ">
                            <label for="descripcion"><strong>Descripcion</strong></label>
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