<?php
include_once '../model/conexion.php';
include_once '../model/val_estadoUser.php';

// -------------------------------------------------------------------------------------------------------
// se cambia el tipo de dato
$codigo_user = $_POST['codigo'];
$estado = $_POST['estado'];

// -------------------------------------------------------------------------------------------------------
// var_dump("epaaaaaaaaaaaaaaa: $codigo_user");
// -------------------------------------------------------------------------------------------------------
$conexion = new Conexion();
// -------------------------------------------------------------------------------------------------------
$delete = new deleteUser($codigo_user, $estado, $conexion);
$delete->updateEstadoUser();
