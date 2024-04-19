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
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Consultar novedades</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" integrity="..." crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/allNovedades.css" />

</head>

<body>
    <a class="exit-link" href="../view/main.php">
        <i class="fa fa-right-from-bracket fa-beat" style="color: #ff0000"></i>
    </a>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Novedades</h1>
            <div class="input-group">
                <input id="search" type="search" placeholder="Buscar novedad" />
                <img src="images/search.png" alt="" />
            </div>
            <div class="export__file">
                <label for="export-file" class="export__file-btn" title="Export File"></label>
                <input type="checkbox" id="export-file" />
                <div class="export__file-options">
                    <label>Export As &nbsp; &#10140;</label>
                    <label for="export-file" id="toEXCEL">EXCEL <img src="images/excel.png" alt="" /></label>
                </div>
            </div>
        </section>

        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Fecha registro <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Fecha novedad <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Coordinador <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Novedad <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Trabajador <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Descripcion <span class="icon-arrow">&UpArrow;</span></th>
                        <th>ID servicio <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Cliente <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Costos <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Nomina <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Estado <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Eliminar <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php require_once("../model/val_allNovedad.php"); ?>
                </tbody>
            </table>
        </section>

        <!-- Modal -->
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div id="modalContent"></div>
                <!-- contenido del modal -->
            </div>
        </div>


    </main>
    <!-- ------------------- url para el ajax -------- -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- --------------- popUp de ver novedad en celular -------- -->
    <script src="../controller/js/popUp_novedades.js"></script>
    <!-- ------ capturar id para la consulta individual del popUp -------- -->
    <script src="../controller/js/captureIdPopUpNovedad.js"></script>
    <!-- ------------------------ costos -------- -->
    <script src="../controller/js/captureApprovedCostos.js"></script>
    <!-- --------------------- nomina -------- -->
    <script src="../controller/js/captureApprovedNomina.js"></script>
    <!-- -------------------- eliminar -------- -->
    <script src="../controller/js/capureDelete.js"></script>
    <!-- -------------------- js de la tabla -------- -->
    <script src="../controller/js/allNovedades.js"></script>
</body>

</html>