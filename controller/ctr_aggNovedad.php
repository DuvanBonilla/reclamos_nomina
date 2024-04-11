<?php
session_start();
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
// --------------------------------------------------------------------
// registro del estado en pendiente y id de la cuenta que registró
$estado = 1;
$id_aprobacionC = 2;
$id_aprobacionN = 2;
// --------------------------------------------------------------------
// registro de la zona en novedes_nomina
$id_zona =  $_SESSION['zona'];
$idUsuario =  $_SESSION['codigo'];
// --------------------------------------------------------------------
$conexion = new Conexion();
$conMysql = $conexion->conMysql();
// --------------------------------------------------------------------
$valNovedad = new valNovedad($fechaRegistro, $fechaNovedad, $coordinador, $novedad, $trabajador, $descripcion, $idServicio, $cliente, $idUsuario, $estado, $id_zona, $id_aprobacionC, $id_aprobacionN, $conexion);
// --------------------------------------------------------------------
var_dump("id estado $id_aprobacionC");
var_dump("id estado $id_aprobacionN");

$valNovedad->validarNovedad();
$valNovedad->registrarNovedad();
