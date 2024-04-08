<?php
include_once '../model/conexion.php';
include_once '../model/val_updateState.php';

// -------------------------------------------------------------------------------------------------------
$estado = intval($_POST['estado']);
$id_novedad = intval($_POST['id_novedad']);

// var_dump($_POST);
// echo "<br>";
var_dump("estado $estado");
var_dump("id estado $id_novedad");


// echo "Tipo de dato de estado: " . gettype($estado);
// echo "<br>";
// echo "Tipo de dato de id_novedad: " . gettype($id_novedad);

// echo "<br>";
// echo "$estado";
// echo "<br>";
// echo "$id_novedad";
// echo "<br>";

// -------------------------------------------------------------------------------------------------------
$conexion = new Conexion();
// -------------------------------------------------------------------------------------------------------
$updateState = new updateState($estado, $id_novedad, $conexion);
$updateState->actualizar();

// $updateState->obtenerTodos();
// echo "<pre>";
// print_r($updateState);
// echo "</pre>";
