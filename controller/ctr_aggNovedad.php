<?php
require_once("../model/conexion.php");
require_once("../model/val_aggNovedad.php");


// --------------------------------------------------------------------
$fechaRegistro = $_POST["fechaRegistro"];
$fechaNovedad = $_POST["fechaNovedad"];
$coordinador = $_POST["coordinador"];
$novedad = $_POST["novedad"];
$trabajador = $_POST["trabajador"];
$descripcion = $_POST["descripcion"];
$idServicio = $_POST["idServicio"];
$cliente = $_POST["cliente"];
$idUsuario = 1;
$estado = 1;
// --------------------------------------------------------------------
$conexion = new Conexion();
$conMysql = $conexion->conMysql();
// --------------------------------------------------------------------

$valNovedad = new valNovedad($fechaRegistro, $fechaNovedad, $novedad, $cliente, $coordinador, $trabajador, $idServicio, $descripcion, $estado, $idUsuario, $conexion);
$valNovedad->validarNovedad();
$valNovedad->registrarNovedad();
