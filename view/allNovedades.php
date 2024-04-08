<?php
session_start();
if (!isset($_SESSION['rol'])) {
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
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="images/logo.ico.ico" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Consultar novedades</title>
    <link rel="stylesheet" type="text/css" href="css/allNovedades.css" />
</head>

<body>
    <main class="table" id="customers_table">

        <section class="table__header">
            <a class="exit-link" href="../model/cerrar_session.php">
                <i class="fa fa-right-from-bracket fa-beat" style="color: #ff0000"></i>
            </a>
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
                    <label for="export-file" id="toPDF">PDF <img src="images/pdf.png" alt="" /></label>
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
                        <th>Estado <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Costos <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Nomina <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php require_once("../model/val_allNovedad.php"); ?>

                </tbody>
            </table>
        </section>
    </main>

    <!-- <div class="popup" id="statePopup" style="display: none;">
        <form class="popup-content" id="stateForm" method="POST" action="../controller/ctr_updateState.php">
            <div class="popup-content">
                <p>Selecciona un estado:</p>
                <button type="submit" class="state-button" data-state="proceso" name="estado" value="proceso">Proceso</button>
                <button type="submit" class="state-button" data-state="terminado" name="estado" value="terminado">Terminado</button>
            </div>
        </form>
    </div> -->

    <div class="popup" id="statePopup" style="display: none;">
        <form class="popup-content" id="stateForm" method="POST" action="../controller/ctr_updateState.php">
            <div class="popup-content">
                <p>Selecciona un estado:</p>
                <!-- Campos ocultos para almacenar los datos -->
                <input type="hidden" id="estadoInput" name="estado" value="">
                <input type="hidden" id="fechaRegistroInput" name="fechaRegistro" value="">
                <input type="hidden" id="fechaNovedadInput" name="fechaNovedad" value="">
                <input type="hidden" id="trabajadorInput" name="trabajador" value="">

                <!-- Botones que envían el estado -->
                <button type="button" class="state-button" data-state="proceso" onclick="capturarDatos('proceso')">Proceso</button>
                <button type="button" class="state-button" data-state="terminado" onclick="capturarDatos('terminado')">Terminado</button>
            </div>
        </form>
    </div>


    <script src="../controller/js/capturarDatos.js"></script>
    <script src="../controller/js/chooseState.js"></script>
    <script src="../controller/js/allNovedades.js"></script>
</body>

</html>