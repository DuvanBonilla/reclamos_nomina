<?php
include_once '../model/conexion.php';
include_once '../model/val_updateState.php';

// -------------------------------------------------------------------------------------------------------
// se cambia el tipo de dato
$estado = intval($_POST['estado']);
$id_novedad = intval($_POST['id_novedad']);
// -------------------------------------------------------------------------------------------------------
$conexion = new Conexion();
// -------------------------------------------------------------------------------------------------------
$updateState = new updateState($estado, $id_novedad, $conexion);
$updateState->actualizar();
