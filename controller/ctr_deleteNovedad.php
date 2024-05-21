<?php
include_once '../model/conexion.php';
include_once '../model/val_deleteNovedad.php';

// -------------------------------------------------------------------------------------------------------
// se cambia el tipo de dato
$id_novedad = intval($_POST['id_novedad']);
// -------------------------------------------------------------------------------------------------------
$conexion = new Conexion();
// -------------------------------------------------------------------------------------------------------
$deleteNovedad = new updateState($id_novedad, $conexion);
$deleteNovedad->deleteNovedad();
