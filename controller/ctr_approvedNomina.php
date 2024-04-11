<?php
include_once '../model/conexion.php';
include_once '../model/val_approvedNomina.php';

// -------------------------------------------------------------------------------------------------------
// se cambia el tipo de dato
$id_aprobacionN = intval($_POST['id_aprobacionN']);
$id_novedad = intval($_POST['id_novedad']);
// -------------------------------------------------------------------------------------------------------
$conexion = new Conexion();
// -------------------------------------------------------------------------------------------------------
$updateApprovedN = new updateApprovedN($id_novedad, $id_aprobacionN, $conexion);
$updateApprovedN->actualizar();
