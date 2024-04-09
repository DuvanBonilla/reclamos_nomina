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
// registro del estado en pendiente y de la cuenta que registro
$idUsuario = 1;
$estado = 1;
// --------------------------------------------------------------------
// registro de la zona en novedes_nomina
$zona =  $_SESSION['zona'];
$id_zona = $zona;
// --------------------------------------------------------------------
$conexion = new Conexion();
$conMysql = $conexion->conMysql();
// --------------------------------------------------------------------
$valNovedad = new valNovedad($fechaRegistro, $fechaNovedad, $coordinador, $novedad, $trabajador, $descripcion, $idServicio, $cliente, $idUsuario, $estado, $id_zona, $conexion);
// --------------------------------------------------------------------
$valNovedad->validarNovedad();
$valNovedad->registrarNovedad();
