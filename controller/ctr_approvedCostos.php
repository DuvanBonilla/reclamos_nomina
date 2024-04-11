<?php
include_once '../model/conexion.php';
include_once '../model/val_approvedCostos.php';

// -------------------------------------------------------------------------------------------------------
// se cambia el tipo de dato
$id_aprobacionC = intval($_POST['id_aprobacionC']);
$id_novedad = intval($_POST['id_novedad']);
// -------------------------------------------------------------------------------------------------------
$conexion = new Conexion();
// -------------------------------------------------------------------------------------------------------
$updateApprovedC = new updateApprovedC($id_novedad, $id_aprobacionC, $conexion);
$updateApprovedC->actualizar();
