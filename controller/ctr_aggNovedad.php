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
$archivo = $_FILES['archivo'];
$semana = $_POST["semana"];

// --------------------------------------------------------------------
// registro del estado en pendiente y id de la cuenta que registró
$estado = 1;
$zonaEspecifica = $_POST['zonaEspecifica'];
$id_aprobacionC = 2;
$id_aprobacionN = 2;
// --------------------------------------------------------------------
// registro de la zona en novedes_nomina
$id_zona =  $_SESSION['zona'];
$idUsuario =  $_SESSION['id_usuario'];
// --------------------------------------------------------------------
$conexion = new Conexion();
$conMysql = $conexion->conMysql();
// --------------------------------------------------------------------
$valNovedad = new valNovedad($fechaRegistro, $fechaNovedad, $coordinador, $semana, $novedad, $trabajador, $descripcion, $idServicio, $idUsuario, $estado, $zonaEspecifica, $id_zona, $id_aprobacionC, $id_aprobacionN, $conexion);
// --------------------------------------------------------------------
$valNovedad->registrarNovedad();
// --------------------------------------------------------------------
// --------------------------------------------------------------------
//                          subir archivo
// --------------------------------------------------------------------
// --------------------------------------------------------------------
$valNovedad->subirArchivo($archivo, $fechaRegistro, $conexion);
