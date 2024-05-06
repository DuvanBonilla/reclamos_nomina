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
    <title>Consultar usuario</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.2/css/all.css" integrity="..." crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/allUsers.css" />

</head>

<body>
    <a class="exit-link" href="../view/main.php">
        <i class="fa fa-right-from-bracket fa-beat" style="color: #ff0000"></i>
    </a>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Usuarios registrados</h1>
            <div class="input-group">
                <input id="search" type="search" placeholder="Buscar usuario" />
                <img src="images/search.png" alt="" />
            </div>

        </section>

        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Codigo <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Rol <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Zona <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Actualizar <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Estado <span class="icon-arrow">&UpArrow;</span></th>

                    </tr>
                </thead>
                <tbody>
                    <?php require_once("../model/val_show_users.php"); ?>
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

    <script src="../controller/js/captureCodigoUserEstado.js"></script>
    <!-- ------------------- popUp-------- -->
    <script src="../controller/js/updateUsersPopUp.js"></script>
    <!-- ------------------- buscar y sorting de la tabla-------- -->
    <script src="../controller/js/tableUsers.js"></script>
</body>

</html>