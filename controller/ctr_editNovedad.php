<?php
// session_start();
require_once('../model/conexion.php');
require_once('../model/val_editNovedad.php');


$id = $_POST['id'];
$novedad = $_POST['novedad'];
$trabajador = $_POST['trabajador'] ;
$idservicio = $_POST['idservicio'] ;
$zonaespecifica = $_POST['zonaespecifica'] ;
$descripcion = $_POST['descripcion'] ;

$conexion = new Conexion();

$updateNovedad = new updateNovedad($id, $novedad, $trabajador, $idservicio, $zonaespecifica, $descripcion, $conexion);
$updateNovedad->verificarNovedad();
$updateNovedad->updateNovedad();

